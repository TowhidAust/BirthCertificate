<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Model\Bookings;
use App\Model\Hyvikk;
use App\Model\IncCats;
use App\Model\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;
use PushNotification;

class CorrectionController extends Controller
{
public function index()
    {
        if (Auth::user()->user_type == "C") {
            $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        } elseif (Auth::user()->user_type == "S") {

          $data['pending_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_applications.status','Pending')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
                                          // dd($data['pending_applican_info']);
          $data['approved_applican_info'] =  DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_applications.status','Completed')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
          $data['rejected_applican_info'] =   DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_applications.status','Rejected')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
        }elseif(Auth::user()->user_type == "D"){
          $data['pending_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                    			->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','0')
                                          ->where('correction_applications.ward_id',Auth::user()->ward_id)
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
                                          // dd($data['pending_applican_info']);
          $data['approved_applican_info'] =  DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','1')
                                          ->where('correction_applications.ward_id',Auth::user()->ward_id)
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
          $data['rejected_applican_info'] =   DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','2')
                                          ->where('correction_applications.ward_id',Auth::user()->ward_id)
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
        }elseif (Auth::user()->user_type == "A") {
          $data['pending_applican_info'] = DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.councillor','1')
    																			->where('approvals.accountant','0')
    																			->get();
    	  	$data['approved_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.councillor','1')
    																			->where('approvals.accountant','1')
    																			->get();
    	  	$data['rejected_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.councillor','1')
    																			->where('approvals.accountant','2')
    																			->get();
        }elseif (Auth::user()->user_type == "O") {
          $data['pending_applican_info'] = DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.accountant','1')
    																			->where('approvals.officer','0')
    																			->get();
    	  	$data['approved_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.accountant','1')
    																			->where('approvals.officer','1')
    																			->get();
    	  	$data['rejected_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.accountant','1')
    																			->where('approvals.officer','2')
    																			->get();
        }elseif (Auth::user()->user_type == "OP") {
          $data['pending_applican_info'] = DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.officer','1')
    																			->where('approvals.operator','0')
    																			->get();
    	  	$data['approved_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.officer','1')
    																			->where('approvals.operator','1')
    																			->get();
    	  	$data['rejected_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->where('approvals.officer','1')
    																			->where('approvals.operator','2')
    																			->get();
        }
        // dd($data);
        return view("correction.index", $data);
    }
public function today_correction()
    {
       $data;
        if (Auth::user()->user_type == "C") {
            $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        } elseif (Auth::user()->user_type == "S") {
          $data['pending_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_applications.status','Pending')
    																			->whereDate('created_at', Carbon::today())
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
                                          // dd($data['pending_applican_info']);
          $data['approved_applican_info'] =  DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_applications.status','Completed')
    																			->whereDate('created_at', Carbon::today())
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
          $data['rejected_applican_info'] =   DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_applications.status','Rejected')
    																			->whereDate('created_at', Carbon::today())
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
        } elseif (Auth::user()->user_type == "D") {
          $data['pending_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','0')
    																			->whereDate('created_at', Carbon::today())
                                          ->where('correction_applications.ward_id',Auth::user()->ward_id)
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
                                          // dd($data['pending_applican_info']);
          $data['approved_applican_info'] =  DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','1')
    																			->whereDate('created_at', Carbon::today())
                                          ->where('correction_applications.ward_id',Auth::user()->ward_id)
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
          $data['rejected_applican_info'] =   DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','2')
    																			->whereDate('created_at', Carbon::today())
                                          ->where('correction_applications.ward_id',Auth::user()->ward_id)
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
        } elseif (Auth::user()->user_type == "A") {
          $data['pending_applican_info'] = DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.councillor','1')
    																			->where('approvals.accountant','0')
    																			->get();
    	  	$data['approved_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.councillor','1')
    																			->where('approvals.accountant','1')
    																			->get();
    	  	$data['rejected_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.councillor','1')
    																			->where('approvals.accountant','2')
    																			->get();
        }elseif (Auth::user()->user_type == "O") {
          $data['pending_applican_info'] = DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.accountant','1')
    																			->where('approvals.officer','0')
    																			->get();
    	  	$data['approved_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.accountant','1')
    																			->where('approvals.officer','1')
    																			->get();
    	  	$data['rejected_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.accountant','1')
    																			->where('approvals.officer','2')
    																			->get();

        }elseif (Auth::user()->user_type == "OP") {
          $data['pending_applican_info'] = DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.officer','1')
    																			->where('approvals.operator','0')
    																			->get();
    	  	$data['approved_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.officer','1')
    																			->where('approvals.operator','1')
    																			->get();
    	  	$data['rejected_applican_info'] =  DB::table('applican_informations')
    																			->join('approvals','approvals.applicant_id','=','applican_informations.id')
    																			->orderBy('applican_informations.id','desc')
    																			->where('applican_informations.status','Pending')
    																			->whereDate('created_at', Carbon::today())
    																			->where('approvals.officer','1')
    																			->where('approvals.operator','2')
    																			->get();
        } else {
            $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
            $data['data'] = Bookings::whereIn('vehicle_id', $vehicle_ids)->orderBy('id', 'desc')->get();
        }


        $data['types'] = IncCats::get();
$data['data'] = Bookings::orderBy('id', 'desc')->get();

        return view("correction.today_application", $data);
    }



    function approve($id) {
      if (Auth::user()->user_type == "D") {
         DB::table('correction_approvals')
            ->where('correction_id',$id)
            ->update(['councillor' => 1]);
      }elseif(Auth::user()->user_type == "A"){
        DB::table('correction_approvals')
           ->where('correction_id',$id)
           ->update(['accountant' => 1]);
        DB::table('payments')
           ->where('correction_id',$id)
           ->update(['status' => 1]);
      }elseif(Auth::user()->user_type == "O"){
        DB::table('correction_approvals')
           ->where('correction_id',$id)
           ->update(['officer' => 1]);
      }
      Session::flash('message', 'Approved successfully!');
     return back();
    }
    public function reject(Request $request) {
      if (Auth::user()->user_type == "D") {
        DB::table('correction_approvals')
           ->where('correction_id',$request->get('id'))
           ->update(['councillor' => 2,'reason'=>$request->get('reason')]);
  $info=DB::table('correction_applications')
          ->join('applican_informations','applican_informations.birth_id','correction_applications.birth_id')
            ->where('correction_applications.id',$request->get('id'))
            ->select('applican_informations.number')
            ->first();

  $this->sendSMS($info->number,$request->get('reason'));
    }elseif(Auth::user()->user_type=="A"){
         DB::table('approvals')
            ->where('applicant_id',$request->get('applicant_id'))
           ->update(['accountant' => 2,'reason'=>$request->get('reason')]);
   $info=DB::table('applican_informations')
             ->where('id',$request->get('applicant_id'))
             ->select('number')
             ->first();
   $this->sendSMS($info->number,$request->get('reason'));
 }elseif(Auth::user()->user_type=="O"){
         DB::table('approvals')
            ->where('applicant_id',$request->get('applicant_id'))
           ->update(['officer' => 2,'reason'=>$request->get('reason')]);
   $info=DB::table('applican_informations')
             ->where('id',$request->get('applicant_id'))
             ->select('number')
             ->first();
   $this->sendSMS($info->number,$request->get('reason'));
 }elseif(Auth::user()->user_type=="OP"){
            DB::table('approvals')
               ->where('applicant_id',$request->get('applicant_id'))
               ->update(['operator' => 2,'reason'=>$request->get('reason')]);
      $info=DB::table('applican_informations')
                ->where('id',$request->get('applicant_id'))
                ->select('number')
                ->first();
      $this->sendSMS($info->number,$request->get('reason'));
    }
      Session::flash('reject', 'Reject successfully!');
      return back();
    }
    public function complete(Request $request){
      DB::table('approvals')
         ->where('applicant_id',$request->get('applicant_id'))
         ->update(['operator' => 1]);

       DB::table('application_status')
          ->where('applicant_id',$request->get('applicant_id'))
          ->update(['status_id' => 2]);

      DB::table('applican_informations')
         ->where('id',$request->get('applicant_id'))
         ->update(['birth_id' =>$request->get('birth_id'),'status'=>'Completed']);

         $info=DB::table('applican_informations')
                   ->where('id',$request->get('applicant_id'))
                   ->select('number','english_name')
                   ->first();
         $message='Dear '.$info->english_name.' Your application has been completed. Your birth certificate ID : '.$request->get('birth_id').'Thank You';
         $this->sendSMS($info->number,$message);
         Session::flash('complete', 'Application has Completed successfully!');
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


        public function view_correction($id)
        {

            $data['id'] = $id;
            $data['data']=DB::table('correction_applications')
                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                          ->join('correction_payments','correction_payments.correction_id','=','correction_applications.id')
                          ->where('correction_applications.id',$id)
                          ->select('correction_applications.*',
                          'correction_approvals.*',
                          'correction_payments.*',
                          'correction_payments.status as payment_status',
                          'correction_applications.id as id',
                          'correction_applications.status as status')
                          ->first();
            $data['documents']=DB::table('correction_documents')
                          ->where('correction_id',$id)
                          ->get();
            $data['corrections']=DB::table('correction_infos')
                          ->where('correction_id',$id)
                          ->get();
          $data['approve']=DB::table('correction_approvals')->where('correction_id',$id)->select('*','councillor')->first();

              // echo '<pre>';
              // print_r($data['approve']->councillor);
              // exit;
            return view("correction.view",$data);
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
