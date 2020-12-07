<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Mail\DriverBooked;
use App\Mail\VehicleBooked;
use App\Model\BookingIncome;
use App\Model\BookingPaymentsModel;
use App\Model\Bookings;
use App\Model\Hyvikk;
use App\Model\IncCats;
use App\Model\IncomeModel;
use App\Model\ServiceReminderModel;
use App\Model\User;
use App\Model\VehicleModel;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;
use PushNotification;

class BookingsController extends Controller
{
public function index()
    {
        if (Auth::user()->user_type == "C") {
            $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        } elseif (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
            $data['data'] = Bookings::orderBy('id', 'desc')->get();
        } else {
            $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
            $data['data'] = Bookings::whereIn('vehicle_id', $vehicle_ids)->orderBy('id', 'desc')->get();
        }

        $data['types'] = IncCats::get();
        $data['applican_info'] = DB::table('applican_informations')->get();
        // dd($data);
        return view("bookings.index", $data);
    }


    public function receipt($id)
    {
        $data['id'] = $id;
        $data['i'] = $book = BookingIncome::whereBooking_id($id)->first();
        // $data['info'] = IncomeModel::whereId($book['income_id'])->first();
        $data['booking'] = Bookings::find($id);
        return view("bookings.receipt", $data);
    }

    function print($id) {
        $data['i'] = $book = BookingIncome::whereBooking_id($id)->first();
        // $data['info'] = IncomeModel::whereId($book['income_id'])->first();
        $data['booking'] = Bookings::whereId($id)->get()->first();
        return view("bookings.print", $data);
    }

    public function payment($id)
    {
        $booking = Bookings::find($id);
        $booking->payment = 1;
        $booking->payment_method = "cash";
        $booking->save();
        BookingPaymentsModel::create(['method' => 'cash', 'booking_id' => $id, 'amount' => $booking->tax_total, 'payment_details' => null, 'transaction_id' => null, 'payment_status' => "succeeded"]);
        return redirect()->route('bookings.index');
    }

    public function complete_post(Request $request)
    {
        // dd($request->all());
        $booking = Bookings::find($request->get("booking_id"));

        $booking->setMeta([
            'customerId' => $request->get('customerId'),
            'vehicleId' => $request->get('vehicleId'),
            'day' => $request->get('day'),
            'mileage' => $request->get('mileage'),
            'waiting_time' => $request->get('waiting_time'),
            'date' => $request->get('date'),
            'total' => $request->get('total'),
            'total_kms' => $request->get('mileage'),
            // 'ride_status' => 'Completed',
            'tax_total' => $request->get('tax_total'),
            'total_tax_percent' => $request->get('total_tax_charge'),
            'total_tax_charge_rs' => $request->total_tax_charge_rs,
        ]);
        $booking->save();

        $id = IncomeModel::create([
            "vehicle_id" => $request->get("vehicleId"),
            // "amount" => $request->get('total'),
            "amount" => $request->get('tax_total'),
            "user_id" => $request->get("customerId"),
            "date" => $request->get('date'),
            "mileage" => $request->get("mileage"),
            "income_cat" => $request->get("income_type"),
            "income_id" => $booking->id,
            "tax_percent" => $request->get('total_tax_charge'),
            "tax_charge_rs" => $request->total_tax_charge_rs,
        ])->id;

        BookingIncome::create(['booking_id' => $request->get("booking_id"), "income_id" => $id]);
        $xx = Bookings::whereId($request->get("booking_id"))->first();
        // $xx->status = 1;
        $xx->receipt = 1;
        $xx->save();

        return redirect()->route("bookings.index");

    }

    public function complete($id)
    {

        $xx = Bookings::find($id);
        $xx->status = 1;
        $xx->ride_status = "Completed";
        $xx->save();
        return redirect()->route("bookings.index");
    }

    public function get_driver(Request $request)
    {

        $from_date = $request->get("from_date");
        $to_date = $request->get("to_date");
        $req_type = $request->get("req");
        if ($req_type == "new") {
            $q = "select id,name as text from users where user_type='D' and deleted_at is null and id not in (select driver_id from bookings where  deleted_at is null   and ((dropoff between '" . $from_date . "' and '" . $to_date . "' or pickup between '" . $from_date . "' and '" . $to_date . "') or (DATE_ADD(dropoff, INTERVAL 10 MINUTE)>='" . $from_date . "' and DATE_SUB(pickup, INTERVAL 10 MINUTE)<='" . $to_date . "')))";

            $d = collect(DB::select(DB::raw($q)));

            $r['data'] = $d;
        } else {
            $id = $request->get("id");
            $current = Bookings::find($id);
            $q = "select id,name as text from users where user_type='D' and id not in (select driver_id from bookings where  id!=" . $id . " and deleted_at is null  and ((dropoff between '" . $from_date . "' and '" . $to_date . "' or pickup between '" . $from_date . "' and '" . $to_date . "') or (DATE_ADD(dropoff, INTERVAL 10 MINUTE)>='" . $from_date . "' and DATE_SUB(pickup, INTERVAL 10 MINUTE)<='" . $to_date . "')))";
            $d = collect(DB::select(DB::raw($q)));

            $chk = $d->where('id', $current->driver_id);
            $r['show_error'] = "yes";
            if (count($chk) > 0) {
                $r['show_error'] = "no";
            }
            $new = array();

            foreach ($d as $ro) {
                if ($ro->id === $current->driver_id) {
                    array_push($new, array("id" => $ro->id, "text" => $ro->text, 'selected' => true));
                } else {
                    array_push($new, array("id" => $ro->id, "text" => $ro->text));
                }

            }

            $r['data'] = $new;
        }

        return $r;

    }

    public function fare(Request $request)
    {
        $fare_id = $request->get("fare_id");
      $fare= DB::table('intercity_fare')
                  ->join('thana', 'intercity_fare.from_thana_id', '=', 'thana.id')
                  ->join('district', 'thana.city_id', '=', 'district.city_id')
                  ->join('vehicle_types', 'intercity_fare.vehicle_type_id', '=', 'vehicle_types.id')
                  ->select('*','intercity_fare.id as intercity_fare_id','district.city_name as district_name')
                  ->where('intercity_fare.id',$fare_id)
                  ->orderBy('intercity_fare.id','desc')
                  ->first();
        $r = array('fare' => $fare->fare,'return_fare'=>$fare->return_extra_fare);
                  return $r;
    }
    public function get_vehicle(Request $request)
    {

        $from_date = $request->get("from_date");
        $to_date = $request->get("to_date");
        $req_type = $request->get("req");

        if ($req_type == "new") {
            $xy = array();
            if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
                $q = "select id,concat(make,' - ',model,' - ',license_plate) as text from vehicles where in_service=1 and deleted_at is null  and  id not in(select vehicle_id from bookings where  deleted_at is null  and ((dropoff between '" . $from_date . "' and '" . $to_date . "' or pickup between '" . $from_date . "' and '" . $to_date . "') or (DATE_ADD(dropoff, INTERVAL 10 MINUTE)>='" . $from_date . "' and DATE_SUB(pickup, INTERVAL 10 MINUTE)<='" . $to_date . "')))";
            } else {
                $q = "select id,concat(make,' - ',model,' - ',license_plate) as text from vehicles where in_service=1 and deleted_at is null and group_id=" . Auth::user()->group_id . " and  id not in(select vehicle_id from bookings where  deleted_at is null  and ((dropoff between '" . $from_date . "' and '" . $to_date . "' or pickup between '" . $from_date . "' and '" . $to_date . "') or (DATE_ADD(dropoff, INTERVAL 10 MINUTE)>='" . $from_date . "' and DATE_SUB(pickup, INTERVAL 10 MINUTE)<='" . $to_date . "')))";
            }

            $d = collect(DB::select(DB::raw($q)));

            $new = array();
            foreach ($d as $ro) {

                array_push($new, array("id" => $ro->id, "text" => $ro->text));

            }

            $r['data'] = $new;
            return $r;

        } else {
            $id = $request->get("id");
            $current = Bookings::find($id);
            if ($current->vehicle_typeid != null) {
                $condition = " and type_id = '" . $current->vehicle_typeid . "'";

            } else {
                $condition = "";
            }

            if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
                $q = "select id,concat(make,' - ',model,' - ',license_plate) as text from vehicles where in_service=1 " . $condition . " and id not in (select vehicle_id from bookings where id!=$id and  deleted_at is null  and ((dropoff between '" . $from_date . "' and '" . $to_date . "' or pickup between '" . $from_date . "' and '" . $to_date . "') or (DATE_ADD(dropoff, INTERVAL 10 MINUTE)>='" . $from_date . "' and DATE_SUB(pickup, INTERVAL 10 MINUTE)<='" . $to_date . "')))";
            } else {
                $q = "select id,concat(make,' - ',model,' - ',license_plate) as text from vehicles where in_service=1 " . $condition . " and group_id=" . Auth::user()->group_id . " and id not in (select vehicle_id from bookings where id!=$id and  deleted_at is null  and ((dropoff between '" . $from_date . "' and '" . $to_date . "' or pickup between '" . $from_date . "' and '" . $to_date . "') or (DATE_ADD(dropoff, INTERVAL 10 MINUTE)>='" . $from_date . "' and DATE_SUB(pickup, INTERVAL 10 MINUTE)<='" . $to_date . "')))";
            }

            $d = collect(DB::select(DB::raw($q)));
            $chk = $d->where('id', $current->vehicle_id);
            $r['show_error'] = "yes";
            if (count($chk) > 0) {
                $r['show_error'] = "no";
            }

            $new = array();
            foreach ($d as $ro) {
                if ($ro->id === $current->vehicle_id) {
                    array_push($new, array("id" => $ro->id, "text" => $ro->text, "selected" => true));
                } else {
                    array_push($new, array("id" => $ro->id, "text" => $ro->text));
                }
            }
            $r['data'] = $new;
            return $r;
        }

    }

    public function calendar_event($id)
    {
        $data['booking'] = Bookings::find($id);
        return view("bookings.event", $data);

    }
    public function calendar_view()
    {
        $booking = Bookings::where('user_id', Auth::user()->id)->exists();
        return view("bookings.calendar", compact('booking'));
    }

    public function service_view($id)
    {
        $data['service'] = ServiceReminderModel::find($id);
        return view("bookings.service_event", $data);
    }

    public function calendar(Request $request)
    {
        $data = array();
        $start = $request->get("start");
        $end = $request->get("end");
        if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
            $b = Bookings::where("pickup", ">=", $start)->where("dropoff", "<=", $end)->get();
        } else {
            $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
            $b = Bookings::whereIn('vehicle_id', $vehicle_ids)->where("pickup", ">=", $start)->where("dropoff", "<=", $end)->get();
        }

        foreach ($b as $booking) {
            $x['start'] = $booking->pickup;
            $x['end'] = $booking->dropoff;
            if ($booking->status == 1) {
                $color = "grey";
            } else {
                $color = "red";
            }
            $x['backgroundColor'] = $color;
            $x['title'] = $booking->customer->name;
            $x['id'] = $booking->id;
            $x['type'] = 'calendar';

            array_push($data, $x);
        }

        $reminders = ServiceReminderModel::get();
        foreach ($reminders as $r) {
            $interval = substr($r->services->overdue_unit, 0, -3);
            $int = $r->services->overdue_time . $interval;
            $date = date('Y-m-d', strtotime($int, strtotime(date('Y-m-d'))));
            if ($r->last_date != 'N/D') {
                $date = date('Y-m-d', strtotime($int, strtotime($r->last_date)));
            }

            $x['start'] = $date;
            $x['end'] = $date;

            $color = "green";

            $x['backgroundColor'] = $color;
            $x['title'] = $r->services->description;
            $x['id'] = $r->id;
            $x['type'] = 'service';
            array_push($data, $x);
        }
        return $data;
    }

    public function create()
    {
        $user = Auth::user()->group_id;
        $data['customers'] = User::where('user_type', 'C')->get();
        $data['drivers'] = User::whereUser_type("D")->get();
        if ($user == null) {
            $data['vehicles'] = VehicleModel::whereIn_service("1")->get();
        } else {
            $data['vehicles'] = VehicleModel::where([['group_id', $user], ['in_service', '1']])->get();}
       $data['fare']= DB::table('intercity_fare')
                    ->join('thana', 'intercity_fare.from_thana_id', '=', 'thana.id')
                    ->join('district', 'thana.city_id', '=', 'district.city_id')
                    ->join('vehicle_types', 'intercity_fare.vehicle_type_id', '=', 'vehicle_types.id')
                    ->select('*','intercity_fare.id as intercity_fare_id','district.city_name as district_name')
                    ->orderBy('intercity_fare.id','desc')
                    ->get();
        return view("bookings.create", $data);
    }

    public function edit($id)
    {
        $booking = Bookings::whereId($id)->get()->first();
        // dd($booking->vehicle_typeid);
        if ($booking->vehicle_typeid != null) {
            $condition = " and type_id = '" . $booking->vehicle_typeid . "'";
        } else {
            $condition = "";
        }
        $q = "select id,name,deleted_at from users where user_type='D' and deleted_at is null and id not in (select user_id from bookings where status=0 and  id!=" . $id . " and deleted_at is null and  (DATE_SUB(pickup, INTERVAL 15 MINUTE) between '" . $booking->pickup . "' and '" . $booking->dropoff . "' or DATE_ADD(dropoff, INTERVAL 15 MINUTE) between '" . $booking->pickup . "' and '" . $booking->dropoff . "' or dropoff between '" . $booking->pickup . "' and '" . $booking->dropoff . "'))";
        // $drivers = collect(DB::select(DB::raw($q)));
        if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
            $q1 = "select * from vehicles where in_service=1" . $condition . " and deleted_at is null and id not in (select vehicle_id from bookings where status=0 and  id!=" . $id . " and deleted_at is null and  (DATE_SUB(pickup, INTERVAL 15 MINUTE) between '" . $booking->pickup . "' and '" . $booking->dropoff . "' or DATE_ADD(dropoff, INTERVAL 15 MINUTE) between '" . $booking->pickup . "' and '" . $booking->dropoff . "'  or dropoff between '" . $booking->pickup . "' and '" . $booking->dropoff . "'))";
        } else {
            $q1 = "select * from vehicles where in_service=1" . $condition . " and deleted_at is null and group_id=" . Auth::user()->group_id . " and id not in (select vehicle_id from bookings where status=0 and  id!=" . $id . " and deleted_at is null and  (DATE_SUB(pickup, INTERVAL 15 MINUTE) between '" . $booking->pickup . "' and '" . $booking->dropoff . "' or DATE_ADD(dropoff, INTERVAL 15 MINUTE) between '" . $booking->pickup . "' and '" . $booking->dropoff . "'  or dropoff between '" . $booking->pickup . "' and '" . $booking->dropoff . "'))";
        }
        $vehicles = collect(DB::select(DB::raw($q1)));

        $index['drivers'] = User::whereUser_type("D")->get();
        $index['vehicles'] = $vehicles;
        $index['data'] = $booking;
        $index['fare']= DB::table('intercity_fare')
                     ->join('thana', 'intercity_fare.from_thana_id', '=', 'thana.id')
                     ->join('district', 'thana.city_id', '=', 'district.city_id')
                     ->join('vehicle_types', 'intercity_fare.vehicle_type_id', '=', 'vehicle_types.id')
                     ->select('*','intercity_fare.id as intercity_fare_id','district.city_name as district_name')
                     ->orderBy('intercity_fare.id','desc')
                     ->get();
        $index['fare_selected']= DB::table('intercity_fare')
                     ->join('thana', 'intercity_fare.from_thana_id', '=', 'thana.id')
                     ->join('district', 'thana.city_id', '=', 'district.city_id')
                     ->join('vehicle_types', 'intercity_fare.vehicle_type_id', '=', 'vehicle_types.id')
                     ->select('*','intercity_fare.id as intercity_fare_id','district.city_name as district_name')
                     ->where('intercity_fare.id',$booking->fare_id)
                     ->orderBy('intercity_fare.id','desc')
                     ->get();
        $index['udfs'] = unserialize($booking->getMeta('udf'));

        return view("bookings.edit", $index);
    }

    public function destroy(Request $request)
    {
        // dd($request->get('id'));
        Bookings::find($request->get('id'))->delete();
        IncomeModel::where('income_id', $request->get('id'))->where('income_cat', 1)->delete();

        return redirect()->route('bookings.index');
    }

    protected function check_booking($pickup, $dropoff, $vehicle)
    {

        $chk = DB::table("bookings")
            ->where("status", 0)
            ->where("vehicle_id", $vehicle)
            ->whereNull("deleted_at")
            ->where("pickup", ">=", $pickup)
            ->where("dropoff", "<=", $dropoff)
            ->get();

        if (count($chk) > 0) {
            return false;
        } else {
            return true;
        }

    }

    public function store(BookingRequest $request)
    {
        // return $request->all();
        $xx = $this->check_booking($request->get("pickup"), $request->get("dropoff"), $request->get("vehicle_id"));
        if ($xx) {
            $id = Bookings::create($request->all())->id;


            $booking = Bookings::find($id);
            $booking->user_id = $request->get("user_id");
            $booking->driver_id = $request->get('driver_id');
            $booking->car = $request->get('car');
            $booking->fare_id = $request->get('fare_id');
            $booking->trip_fare = $request->get('trip_fare');
            $booking->return_status = $request->get('return_status');
            $booking->return_amount = $request->get('return_amount');
            $dropoff = Carbon::parse($booking->dropoff);
            $pickup = Carbon::parse($booking->pickup);
            $diff = $pickup->diffInMinutes($dropoff);
            $booking->note = $request->get('note');
            $booking->duration = $diff;
            $booking->udf = serialize($request->get('udf'));
            $booking->accept_status = 1; //0=yet to accept, 1= accept
            $booking->ride_status = "Upcoming";
            $booking->booking_type = 1;
            $booking->journey_date = date('d-m-Y', strtotime($booking->pickup));
            $booking->journey_time = date('H:i:s', strtotime($booking->pickup));
            $booking->save();
            $mail = Bookings::find($id);
            $this->booking_notification($booking->id);
            // browser notification
            // $this->push_notification($booking->id);
            if (Hyvikk::email_msg('email') == 1) {
                Mail::to($mail->customer->email)->send(new VehicleBooked($booking));
                Mail::to($mail->driver->email)->send(new DriverBooked($booking));

            }
            return redirect()->route("bookings.index");
        } else {
            return redirect()->route("bookings.create")->withErrors(["error" => "Selected Vehicle is not Available in Given Timeframe"])->withInput();
        }

    }

    public function push_notification($id)
    {
        $booking = Bookings::find($id);
        $auth = array(
            'VAPID' => array(
                'subject' => 'Alert about new post',
                'publicKey' => 'BKt+swntut+5W32Psaggm4PVQanqOxsD5PRRt93p+/0c+7AzbWl87hFF184AXo/KlZMazD5eNb1oQVNbK1ti46Y=',
                'privateKey' => 'NaMmQJIvddPfwT1rkIMTlgydF+smNzNXIouzRMzc29c=', // in the real world, this would be in a secret file
            ),
        );

        $select1 = DB::table('push_notification')->select('*')->whereIn('user_id', [$booking->user_id])->get()->toArray();

        $webPush = new WebPush($auth);

        foreach ($select1 as $fetch) {
            $sub = Subscription::create([
                'endpoint' => $fetch->endpoint, // Firefox 43+,
                'publicKey' => $fetch->publickey, // base 64 encoded, should be 88 chars
                'authToken' => $fetch->authtoken, // base 64 encoded, should be 24 chars
                'contentEncoding' => $fetch->contentencoding,
            ]);
            $user = User::find($fetch->user_id);

            $title = __('fleet.new_booking');
            $body = __('fleet.customer') . ": " . $booking->customer->name . ", " . __('fleet.pickup') . ": " . date(Hyvikk::get('date_format') . ' g:i A', strtotime($booking->pickup)) . ", " . __('fleet.pickup_addr') . ": " . $booking->pickup_addr . ", " . __('fleet.dropoff_addr') . ": " . $booking->dest_addr;
            $url = url('admin/bookings');

            $array = array(
                'title' => $title ?? "",
                'body' => $body ?? "",
                'img' => url('assets/images/' . Hyvikk::get('icon_img')),
                'url' => $url ?? url('admin/'),
            );
            $object = json_encode($array);

            if ($fetch->user_id == $user->id) {
                $test = $webPush->sendNotification($sub, $object);
            }
            foreach ($webPush->flush() as $report) {

                $endpoint = $report->getRequest()->getUri()->__toString();

            }

        }

    }
    public function update(Request $request)
    {

        $booking = Bookings::whereId($request->get("id"))->first();

        $booking->vehicle_id = $request->get("vehicle_id");
        $booking->user_id = $request->get("user_id");
        $booking->driver_id = $request->get('driver_id');
        $booking->travellers = $request->get("travellers");
        $booking->pickup = $request->get("pickup");
        $booking->dropoff = $request->get("dropoff");
        $booking->pickup_addr = $request->get("pickup_addr");
        $booking->dest_addr = $request->get("dest_addr");
        $booking->car = $request->get("car");
        $booking->fare_id = $request->get("fare_id");
        $booking->trip_fare = $request->get("trip_fare");
        if ($booking->ride_status == null) {
            $booking->ride_status = "Upcoming";
        }

        $dropoff = Carbon::parse($request->get("dropoff"));
        $pickup = Carbon::parse($request->get("pickup"));
        $booking->note = $request->get('note');
        $diff = $pickup->diffInMinutes($dropoff);
        $booking->duration = $diff;
        $booking->journey_date = date('d-m-Y', strtotime($request->get("pickup")));
        $booking->journey_time = date('H:i:s', strtotime($request->get("pickup")));
        $booking->udf = serialize($request->get('udf'));
        $booking->save();

        $driver = User::find($request->get('driver_id'));
        $user = User::find($booking->customer_id);
        $vehicle = VehicleModel::find($request->get('vehicle_id'));
        $token=DB::table('users_meta')->where('user_id',$booking->customer_id)->where('key','=','device_token')->first();
        $device_token= $token->value;
        $footer='Thank You '.$user->first_name.' '.$user->last_name;
    	$message_body='Your assigned driver  name : '.$driver->first_name.''.$driver->last_name.' Phone Number : '.$driver->phone.' vehicle No :'.$vehicle->license_plate.' Color : '.$vehicle->color;
        $body='You trip driver and vehicle has been assigned successfully!';
       $this->sendPushNotification($message_body,$footer,$device_token,$body);
        return redirect()->route('bookings.index');

    }

    public function prev_address(Request $request)
    {
        $booking = Bookings::where('customer_id', $request->get('id'))->orderBy('id', 'desc')->first();
        if ($booking != null) {
            $r = array('pickup_addr' => $booking->pickup_addr, 'dest_addr' => $booking->dest_addr);
        } else {
            $r = array('pickup_addr' => "", 'dest_addr' => "");
        }

        return $r;
    }
    public function bookingInfo($id)
    {
      $data['id'] = $id;
      $data['booking'] = Bookings::find($id);
      $data['guest_car'] = DB::table('guest_car as gc')
  			-> join('car_slot as cs', 'gc.car_slot_id', '=', 'cs.id')
  			-> join('time_slot as ts', 'cs.t_slot_id', '=', 'ts.id')
  			-> join('vehicle_types as vt', 'cs.v_type_id', '=', 'vt.id')
        ->select('vt.displayname as car_name','cs.rent as rent','ts.time','gc.car as number_of_car','vt.icon as image')
        ->where('gc.booking_id', $id)
        ->get();
        // echo '<pre>';
        // print_r($data['guest_car']);
        // exit;
        return view('bookings.booking_info', $data);

    }

    public function print_bookings()
    {
        if (Auth::user()->user_type == "C") {
            $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        } else {
            $data['data'] = Bookings::orderBy('id', 'desc')->get();
        }

        return view('bookings.print_bookings', $data);
    }

    public function booking_notification($id)
    {

        $booking = Bookings::find($id);
        $data['success'] = 1;
        $data['key'] = "upcoming_ride_notification";
        $data['message'] = 'New Ride has been Assigned to you.';
        $data['title'] = "New Upcoming Ride for you !";
        $data['description'] = $booking->pickup_addr . " - " . $booking->dest_addr . " on " . date('d-m-Y', strtotime($booking->pickup));
        $data['timestamp'] = date('Y-m-d H:i:s');
        $data['data'] = array('rideinfo' => array(

            'booking_id' => $booking->id,
            'source_address' => $booking->pickup_addr,
            'dest_address' => $booking->dest_addr,
            'book_timestamp' => date('Y-m-d H:i:s', strtotime($booking->created_at)),
            'ridestart_timestamp' => null,
            'journey_date' => date('d-m-Y', strtotime($booking->pickup)),
            'journey_time' => date('H:i:s', strtotime($booking->pickup)),
            'ride_status' => "Upcoming"),
            'user_details' => array('user_id' => $booking->customer_id, 'user_name' => $booking->customer->name, 'mobno' => $booking->customer->getMeta('mobno'), 'profile_pic' => $booking->customer->getMeta('profile_pic')),
        );
        // dd($data);
        $driver = User::find($booking->driver_id);

        if ($driver->getMeta('fcm_id') != null && $driver->getMeta('is_available') == 1) {
            PushNotification::app('appNameAndroid')
                ->to($driver->getMeta('fcm_id'))
                ->send($data);
        }

    }

    public function bulk_delete(Request $request)
    {
        Bookings::whereIn('id', $request->ids)->delete();
        IncomeModel::whereIn('income_id', $request->ids)->where('income_cat', 1)->delete();
        return back();
    }

    public function cancel_booking(Request $request)
    {
        $booking = Bookings::find($request->cancel_id);
        $booking->ride_status = "Cancelled";
        $booking->reason = $request->reason;
          $booking->save();
        // if booking->status != 1 then delete income record
         IncomeModel::where('income_id', $request->cancel_id)->where('income_cat', 1)->delete();
         $user = User::find($booking->customer_id);
		$token=DB::table('users_meta')->where('user_id',$booking->customer_id)->where('key','=','device_token')->first();
        $device_token= $token->value;
        $footer='Thank You '.$user->first_name.' '.$user->last_name;
        $message_body='Your has beed cancelled successfully!';
        $body='Your has beed cancelled successfully!';
       $this->sendPushNotification($message_body,$footer,$device_token,$body);
        return back()->with(['msg' => 'Booking cancelled successfully!']);
    }
        private function sendPushNotification($message_body,$footer,$device_token,$body) {
		$header='Welcome To Highway360';
  	$fields = array(
				 'to' => $device_token,
				 'notification' =>$notification = array('body' => $body,'title'=>'highway360' ),
				 'data' => $data = array('header'=>$header,'content' => $message_body,'footer'=>$footer ),
		 );
       //firebase server url to send the curl request
       $url = 'https://fcm.googleapis.com/fcm/send';

       //building headers for the request
       $headers = array(
           'Authorization: key=AAAAtm-S3lw:APA91bEFYPjUcmWTOptP-3tYWUEOI-XrUcei8kMGbfEJRQmYHa-MxOXEPt_B53BZ8ri1p7WOWBy4ao5hxRU1T8Iyy3Ly3_5Skr_w9h63bmzTNsQoQJB7JlQwRABcRFJ34M8lmyxDzrrX',
           'Content-Type: application/json'
       );

       //Initializing curl to open a connection
       $ch = curl_init();

       //Setting the curl url
       curl_setopt($ch, CURLOPT_URL, $url);

       //setting the method as post
       curl_setopt($ch, CURLOPT_POST, true);

       //adding headers
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

       //disabling ssl support
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

       //adding the fields in json format
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

       //finally executing the curl request
       $result = curl_exec($ch);
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }

       //Now close the connection
       curl_close($ch);

       //and return the result
       return $result;
   }
}
