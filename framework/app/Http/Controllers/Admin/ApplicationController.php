<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Session;
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

class ApplicationController extends Controller
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
        $data['applican_info'] = DB::table('applican_informations')->orderBy('id','desc')->where('status','Completed')->get();
        // dd($data);
        return view("application.index", $data);
    }
public function today_application()
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
        $data['applican_info'] = DB::table('applican_informations')->orderBy('id','desc')->whereDate('created_at', Carbon::today())->get();
        // dd($data);
        return view("application.today_application", $data);
    }
public function pending()  {
        if (Auth::user()->user_type == "O") {
          $data['applican_info'] = DB::table('applican_informations')
                                         ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                         ->orderBy('applican_informations.id','desc')
                                         ->where('approvals.councillor','1')
                                         ->get();
        } elseif (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
          $data['applican_info'] = DB::table('applican_informations')->orderBy('id','desc')->where('status','Pending')->get();
        } else {
            $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
            $data['data'] = Bookings::whereIn('vehicle_id', $vehicle_ids)->orderBy('id', 'desc')->get();
        }


        $data['types'] = IncCats::get();
        // dd($data);
        return view("application.pending_application", $data);
    }


    public function view_application($id)
    {

        $data['id'] = $id;
        $data['data']=DB::table('applican_informations')
                      ->join('wards','wards.id','=','applican_informations.ward_name')
                      ->join('birth_address_bn','birth_address_bn.applicant_id','=','applican_informations.id')
                      ->join('birth_address_en','birth_address_en.applicant_id','=','applican_informations.id')
                      ->join('present_address_bn','present_address_bn.applicant_id','=','applican_informations.id')
                      ->join('present_address_en','present_address_en.applicant_id','=','applican_informations.id')
                      ->join('permanent_address_bn','permanent_address_bn.applicant_id','=','applican_informations.id')
                      ->join('permanent_address_en','permanent_address_en.applicant_id','=','applican_informations.id')
                      ->join('parents','parents.applicant_id','=','applican_informations.id')
                      ->join('documents','documents.applicant_id','=','applican_informations.id')
                      ->where('applican_informations.id',$id)
                      ->select('applican_informations.id as applicant_id',
                      'applican_informations.birth_id',
                      'applican_informations.status',
                      'applican_informations.applican_name',
                      'wards.name as ward_name',
                      'applican_informations.bangla_name',
                      'applican_informations.english_name',
                      'applican_informations.number',
                      'applican_informations.birth_date',
                      'applican_informations.gender',
                      'applican_informations.sons_position',
                      'parents.father_name_bn',
                      'parents.father_name_en',
                      'parents.father_birth_id',
                      'parents.father_nid as father_nid_no',
                      'parents.father_passport',
                      'parents.father_nationality',
                      'parents.mother_name_bn',
                      'parents.mother_name_en',
                      'parents.mother_birth_id',
                      'parents.mother_nid as mother_nid_no',
                      'parents.mother_passport',
                      'parents.mother_nationality',
                      'birth_address_bn.house_no as b_house_no_bn',
                      'birth_address_bn.village as b_village_bn',
                      'birth_address_bn.post_office as b_post_office_bn',
                      'birth_address_bn.post_code as b_post_code_bn',
                      'birth_address_bn.upozila as b_police_station_bn',
                      'birth_address_bn.district as b_district_bn',
                      'birth_address_bn.ward as b_union_bn',
                      'birth_address_en.house_no as b_house_no_en',
                      'birth_address_en.village as b_village_en',
                      'birth_address_en.post_office as b_post_office_en',
                      'birth_address_en.post_code as b_post_code_en',
                      'birth_address_en.upozila as b_police_station_en',
                      'birth_address_en.district as b_district_en',
                      'birth_address_en.ward as b_union_en',
                      'present_address_bn.house_no as p_house_no_bn',
                      'present_address_bn.village as p_village_bn',
                      'present_address_bn.post_office as p_post_office_bn',
                      'present_address_bn.post_code as p_post_code_bn',
                      'present_address_bn.upozila as p_police_station_bn',
                      'present_address_bn.district as p_district_bn',
                      'present_address_bn.ward as p_union_bn',
                      'present_address_en.house_no as p_house_no_en',
                      'present_address_en.village as p_village_en',
                      'present_address_en.post_office as p_post_office_en',
                      'present_address_en.post_code as p_post_code_en',
                      'present_address_en.upozila as p_police_station_en',
                      'present_address_en.district as p_district_en',
                      'present_address_en.ward as p_union_en',
                      'permanent_address_bn.house_no as per_house_no_bn',
                      'permanent_address_bn.village as per_village_bn',
                      'permanent_address_bn.post_office as per_post_office_bn',
                      'permanent_address_bn.post_code as per_post_code_bn',
                      'permanent_address_bn.upozila as per_police_station_bn',
                      'permanent_address_bn.district as per_district_bn',
                      'permanent_address_bn.ward as per_union_bn',
                      'permanent_address_en.house_no as per_house_no_en',
                      'permanent_address_en.village as per_village_en',
                      'permanent_address_en.post_office as per_post_office_en',
                      'permanent_address_en.post_code as per_post_code_en',
                      'permanent_address_en.upozila as per_police_station_en',
                      'permanent_address_en.district as per_district_en',
                      'permanent_address_en.ward as per_union_en',
                      'documents.*'
                      )
                      ->first();
          // echo '<pre>';
          // print_r($applican_info);
          // exit;
        return view("application.view",$data);
    }

    function councillor_approve($id) {
      if (Auth::user()->user_type == "D") {
         DB::table('approvals')
            ->where('applicant_id',$id)
            ->update(['councillor' => 1]);
      }
      Session::flash('message', 'Approved successfully!');
     return back();
    }
    public function councillor_reject(Request $request) {

      if (Auth::user()->user_type == "D") {
         DB::table('approvals')
            ->where('applicant_id',$request->get('applicant_id'))
            ->update(['councillor' => 2,'reason'=>$request->get('reason')]);
      $info=DB::table('applican_informations')
                ->where('id',$request->get('applicant_id'))
                ->select('number')
                ->first();
      $this->sendSMS($info->number,$request->get('reason'));
      }
      Session::flash('reject', 'Reject successfully!');
      return back();
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


    public function complete($id)
    {

        $xx = Bookings::find($id);
        $xx->status = 1;
        $xx->ride_status = "Completed";
        $xx->save();
        return redirect()->route("bookings.index");
    }


    private function sendSMS($number,$text){
      // start sms code by saif
           $url = "http://66.45.237.70/api.php";
           $data= array(
           'username'=>"01712874257",
           'password'=>"rioleafbd",
           'number'=>"$number",
           'message'=>"$text"
           );
           $ch = curl_init(); // Initialize cURL
           curl_setopt($ch, CURLOPT_URL,$url);
           curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           $smsresult = curl_exec($ch);
           $p = explode("|",$smsresult);
           $sendstatus = $p[0];

    // end sms code
    }
}
