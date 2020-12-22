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
          $data['pending_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','1')
                                          ->where('correction_approvals.accountant','0')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
                                           // dd($data['pending_applican_info']);
          $data['approved_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','1')
                                          ->where('correction_approvals.accountant','1')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
          $data['rejected_applican_info'] =  DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.councillor','1')
                                          ->where('correction_approvals.accountant','2')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
        }elseif (Auth::user()->user_type == "O") {
          $data['pending_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.accountant','1')
                                          ->where('correction_approvals.officer','0')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
                                           // dd($data['pending_applican_info']);
          $data['approved_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.accountant','1')
                                          ->where('correction_approvals.officer','1')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
          $data['rejected_applican_info'] =  DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.accountant','1')
                                          ->where('correction_approvals.officer','2')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
        }elseif (Auth::user()->user_type == "OP") {
          $data['pending_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.officer','1')
                                          ->where('correction_approvals.operator','0')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
                                           // dd($data['pending_applican_info']);
          $data['approved_applican_info'] = DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.officer','1')
                                          ->where('correction_approvals.operator','1')
                                          ->select('correction_applications.*','wards.name as ward_name')
                                          ->get();
          $data['rejected_applican_info'] =  DB::table('correction_applications')
                                          ->join('wards','wards.id','=','correction_applications.ward_id')
                                          ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                          ->orderBy('correction_applications.id','desc')
                                          ->where('correction_approvals.officer','1')
                                          ->where('correction_approvals.operator','2')
                                          ->select('correction_applications.*','wards.name as ward_name')
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
                                          // dd($data['pending_applican_info']);
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
           ->update(['accountant'=> 1]);
        DB::table('correction_payments')
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
     $info=DB::table('correction_applications')
          ->join('applican_informations','applican_informations.birth_id','correction_applications.birth_id')
            ->where('correction_applications.id',$request->get('id'))
            ->select('applican_informations.number')
            ->first();
   $this->sendSMS($info->number,$request->get('reason'));
 }elseif(Auth::user()->user_type=="O"){
         DB::table('approvals')
            ->where('applicant_id',$request->get('applicant_id'))
           ->update(['officer' => 2,'reason'=>$request->get('reason')]);
     $info=DB::table('correction_applications')
          ->join('applican_informations','applican_informations.birth_id','correction_applications.birth_id')
            ->where('correction_applications.id',$request->get('id'))
            ->select('applican_informations.number')
            ->first();
   $this->sendSMS($info->number,$request->get('reason'));
 }elseif(Auth::user()->user_type=="OP"){
   DB::table('correction_approvals')
      ->where('correction_id',$request->get('id'))
      ->update(['operator' => 2,'reason'=>$request->get('reason')]);
$info=DB::table('correction_applications')
     ->join('applican_informations','applican_informations.birth_id','correction_applications.birth_id')
       ->where('correction_applications.id',$request->get('id'))
       ->select('applican_informations.number')
       ->first();

$this->sendSMS($info->number,$request->get('reason'));
    }
      Session::flash('reject', 'Reject successfully!');
      return back();
    }
    public function complete($id){
      $info=DB::table('correction_applications')
           ->join('applican_informations','applican_informations.birth_id','correction_applications.birth_id')
             ->where('correction_applications.id',$id)
             ->select('applican_informations.id')
             ->first();

      $data['id'] = $info->id;
      $data['correction_id'] = $id;
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
                    ->join('payments','payments.applicant_id','=','applican_informations.id')
                    ->where('applican_informations.id','20210122')
                    ->select('applican_informations.id as applicant_id',
                    'applican_informations.birth_id',
                    'applican_informations.status',
                    'applican_informations.applican_name',
                    'wards.name as ward_name',
                    'applican_informations.bangla_name',
                    'applican_informations.image',
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
                    'documents.*',
                    'payments.bank_name',
                    'payments.transaction_id',
                    'payments.branch',
                    'payments.file',
                    'payments.status as payment_status'
                    )
                    ->first();
        // dd($data);

      $data['wards'] = DB::table('wards')->get();
      return view("correction.update",$data);
    }
  public function correction_update(Request $request){
    DB::table('applican_informations')
            ->where('id',$request->get('applicant_id'))
            ->update(
            ['bangla_name' =>$request->get('bangla_name'),
             'ward_name' => $request->get('ward_name'),
             'english_name' => $request->get('english_name'),
             'birth_date' => $request->get('birth_date'),
             'number' =>$request->get('number'),
             'gender' =>$request->get('gender'),
             'sons_position' => $request->get('sons_position')]
            );
            DB::table('parents')
                    ->where('applicant_id',$request->get('applicant_id'))
        						->insert(
        						['father_name_bn' => $request->get('father_name_bn'),
        						 'father_name_en' => $request->get('father_name_en'),
        						 'father_birth_id' => $request->get('father_birth_id'),
        						 'father_nid' => $request->get('father_nid_no'),
        						 'father_passport' =>$request->get('father_passport'),
        						 'father_nationality' => $request->get('father_nationality'),
        						 'mother_name_bn' =>$request->get('mother_name_bn'),
        						 'mother_name_en' =>$request->get('mother_name_en'),
        						 'mother_birth_id' =>$request->get('mother_birth_id'),
        						 'mother_nid' =>$request->get('mother_nid_no'),
        						 'mother_passport' =>$request->get('mother_passport'),
        						 'mother_nationality' =>$request->get('mother_nationality'), ]
        						);
          DB::table('present_address_bn')
                  ->where('applicant_id',$request->get('applicant_id'))
    						->insert(
    						['house_no' => $request->get('p_house_no_bn'),
    						 'village' => $request->get('p_village_bn'),
    						 'ward' => $request->get('p_union_bn'),
    						 'post_office' => $request->get('p_post_office_bn'),
    						 'post_code' =>$request->get('p_post_code_bn'),
    						 'upozila' => $request->get('p_police_station_bn'),
    						 'district' =>$request->get('p_district_bn'),]
    						);
    			DB::table('present_address_en')
                  ->where('applicant_id',$request->get('applicant_id'))
    						->insert(
    						['house_no' => $request->get('p_house_no_en'),
    						 'village' => $request->get('p_village_en'),
    						 'ward' => $request->get('p_union_en'),
    						'post_office' => $request->get('p_post_office_en'),
    						 'post_code' =>$request->get('p_post_code_en'),
    						 'upozila' => $request->get('p_police_station_en'),
    						 'district' =>$request->get('p_district_en'),]
    						);
    		// permanent addrss
    			DB::table('permanent_address_bn')
                  ->where('applicant_id',$request->get('applicant_id'))
    						->insert(
    						['house_no' => $request->get('per_house_no_bn'),
    						 'village' => $request->get('per_village_bn'),
    						 'ward' => $request->get('per_union_bn'),
    						 'post_office' => $request->get('per_post_office_bn'),
    						 'post_code' =>$request->get('per_post_code_bn'),
    						 'upozila' => $request->get('per_police_station_bn'),
    						 'district' =>$request->get('per_district_bn'),]
    						);
    			DB::table('permanent_address_en')
                  ->where('applicant_id',$request->get('applicant_id'))
    						->insert(
    						[	'house_no' => $request->get('per_house_no_en'),
    						 'village' => $request->get('per_village_en'),
    						 'ward' => $request->get('per_union_en'),
    						 'post_office' => $request->get('per_post_office_en'),
    						 'post_code' =>$request->get('per_post_code_en'),
    						 'upozila' => $request->get('per_police_station_en'),
    						 'district' =>$request->get('per_district_en'),]
    						);
    		// birth addrss
    			DB::table('birth_address_bn')
                  ->where('applicant_id',$request->get('applicant_id'))
    						->insert(
    						['house_no' => $request->get('b_house_no_bn'),
    						 'village' => $request->get('b_village_bn'),
    						 'ward' => $request->get('b_union_bn'),
    						 'post_office' => $request->get('b_post_office_bn'),
    						 'post_code' =>$request->get('b_post_code_bn'),
    						 'upozila' => $request->get('b_police_station_bn'),
    						 'district' =>$request->get('b_district_bn'),]
    						);
    			DB::table('birth_address_en')
                  ->where('applicant_id',$request->get('applicant_id'))
    						->insert(
    						[	'house_no' => $request->get('b_house_no_en'),
    						 'village' => $request->get('b_village_en'),
    						 'ward' => $request->get('b_union_en'),
    						 'post_office' => $request->get('b_post_office_en'),
    						 'post_code' =>$request->get('b_post_code_en'),
    						 'upozila' => $request->get('b_police_station_en'),
    						 'district' =>$request->get('b_district_en'),]
    						);

                DB::table('correction_approvals')
                   ->where('correction_id',$request->get('correction_id'))
                   ->update(['operator' => 1]);

              Session::flash('message', 'Update successfully!');
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
