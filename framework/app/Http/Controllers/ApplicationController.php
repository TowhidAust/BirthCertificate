<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Auth as Login;
use App\Rules\UniqueMobile;
use App\Model\User;
use App\Model\UserData;
use Validator;
class ApplicationController extends Controller {
	public function application(Request $request) {
		 // dd($request->all());
		// applicant info
		$number = $request->get('number');
		$bangla_name=$request->get('bangla_name');
		DB::table('applican_informations')
						->insert(
						['applican_name' => $request->get('applican_name'),
						 'ward_name' => $request->get('ward_name'),
						 'bangla_name' => $bangla_name,
						 'english_name' => $request->get('english_name'),
						 'birth_date' => $request->get('birth_date'),
						 'number' => $number,
						 'gender' =>$request->get('gender'),
						 'sons_position' => $request->get('sons_position'), ]
						);
		$applicant_id=DB::getPdo()->lastInsertId();
		// parents info
		DB::table('parents')
						->insert(
						['applicant_id' => $applicant_id,
						'father_name_bn' => $request->get('father_name_bn'),
						 'father_name_en' => $request->get('father_name_en'),
						 'father_birth_id' => $request->get('father_birth_id'),
						 'father_nid' => $request->get('father_nid'),
						 'father_passport' =>$request->get('father_passport'),
						 'father_nationality' => $request->get('father_nationality'),
						 'mother_name_bn' =>$request->get('mother_name_bn'),
						 'mother_name_en' =>$request->get('mother_name_en'),
						 'mother_birth_id' =>$request->get('mother_birth_id'),
						 'mother_nid' =>$request->get('mother_nid'),
						 'mother_passport' =>$request->get('mother_passport'),
						 'mother_nationality' =>$request->get('mother_nationality'), ]
						);
				// present address
			DB::table('present_address_bn')
						->insert(
						['applicant_id' => $applicant_id,
						'house_no' => $request->get('p_house_no_bn'),
						 'village' => $request->get('p_village_bn'),
						 'ward' => $request->get('p_union_bn'),
						 'post_office' => $request->get('p_postoffice_bn'),
						 'post_code' =>$request->get('p_post_code_bn'),
						 'upozila' => $request->get('p_police_station_bn'),
						 'district' =>$request->get('p_district_bn'),]
						);
			DB::table('present_address_en')
						->insert(
						['applicant_id' => $applicant_id,
						'house_no' => $request->get('p_house_no_en'),
						 'village' => $request->get('p_village_en'),
						 'ward' => $request->get('p_union_en'),
						'post_office' => $request->get('p_postoffice_en'),
						 'post_code' =>$request->get('p_post_code_en'),
						 'upozila' => $request->get('p_police_station_en'),
						 'district' =>$request->get('p_district_en'),]
						);
		// permanent addrss
			DB::table('permanent_address_bn')
						->insert(
						['applicant_id' => $applicant_id,
						'house_no' => $request->get('per_house_no_bn'),
						 'village' => $request->get('per_village_bn'),
						 'ward' => $request->get('per_union_bn'),
						 'post_office' => $request->get('per_postoffice_bn'),
						 'post_code' =>$request->get('per_post_code_en'),
						 'upozila' => $request->get('per_police_station_bn'),
						 'district' =>$request->get('per_district_bn'),]
						);
			DB::table('permanent_address_en')
						->insert(
						['applicant_id' => $applicant_id,
						'house_no' => $request->get('per_house_no_en'),
						 'village' => $request->get('per_village_en'),
						 'ward' => $request->get('per_union_en'),
						 'post_office' => $request->get('per_postoffice_en'),
						 'post_code' =>$request->get('per_post_code_en'),
						 'upozila' => $request->get('per_police_station_en'),
						 'district' =>$request->get('per_district_en'),]
						);
		// birth addrss
			DB::table('birth_address_bn')
						->insert(
						['applicant_id' => $applicant_id,
						'house_no' => $request->get('b_house_no_bn'),
						 'village' => $request->get('b_village_bn'),
						 'ward' => $request->get('b_union_bn'),
						 'post_office' => $request->get('b_postoffice_bn'),
						 'post_code' =>$request->get('b_post_code_en'),
						 'upozila' => $request->get('b_police_station_bn'),
						 'district' =>$request->get('b_district_bn'),]
						);
			DB::table('birth_address_en')
						->insert(
						['applicant_id' => $applicant_id,
						'house_no' => $request->get('b_house_no_en'),
						 'village' => $request->get('b_village_en'),
						 'ward' => $request->get('b_union_en'),
						 'post_office' => $request->get('b_postoffice_en'),
						 'post_code' =>$request->get('b_post_code_en'),
						 'upozila' => $request->get('b_police_station_en'),
						 'district' =>$request->get('b_district_en'),]
						);
			// documents
   	 	$father_nid = "uploads/father_nid/".$applicant_id."_";
 	  	$mother_nid = "uploads/mother_nid/".$applicant_id."_";
 		  $card= "uploads/card/".$applicant_id."_";
 	  	$others= "uploads/others/".$applicant_id."_";
 		  $father_nid = $father_nid .basename($_FILES["father_nid_file"]["name"]);
 		  $mother_nid = $mother_nid .basename($_FILES["mother_nid_file"]["name"]);
 		  $card_nid =  $card.basename($_FILES["card"]["name"]);
 		  $others_nid = $others.basename($_FILES["others"]["name"]);
 		  $response = array();
 		  // Check if image file is an actual image or fake image
 		  if (isset($_FILES["father_nid_file"]))
 		  {
 		    move_uploaded_file($_FILES["father_nid_file"]["tmp_name"], $father_nid);
 		    move_uploaded_file($_FILES["mother_nid_file"]["tmp_name"], $mother_nid);
 		    move_uploaded_file($_FILES["card"]["tmp_name"], $card_nid);
 		    move_uploaded_file($_FILES["others"]["tmp_name"], $others_nid);
 		  }
 			DB::table('documents')
 							->insert(
 							['applicant_id' =>$applicant_id,
 							 'father_nid' => $father_nid,
 							 'mother_nid' => $mother_nid,
 							 'card' => $card_nid,
 							 'others' => $others_nid,]
 							);
			// approval
			DB::table('approvals')
							->insert(
							['applicant_id' =>$applicant_id]
							);

			$payment_file = "uploads/payment/".$applicant_id."_";
 		  $payment_file = $payment_file .basename($_FILES["payment_file"]["name"]);
			$response = array();
 		  // Check if image file is an actual image or fake image
 		  if (isset($_FILES["payment_file"]))
 		  {
 		    move_uploaded_file($_FILES["payment_file"]["tmp_name"], $payment_file);
 		  }
			// payment infomation
			DB::table('payments')
							->insert(
							['applicant_id' =>$applicant_id,
							 'file' => $payment_file,
							 'bank_name' => $request->get('bank_name'),
							 'branch' => $request->get('branch'),
							 'transaction_id' => $request->get('transaction_id'),]
							);

			DB::table('applicant')
							->insert(
							['applicant_id' =>$applicant_id,
							 'name' => $request->get('name'),
							 'address' => $request->get('address'),
							 'relation' => $request->get('relation'),]
							);

			DB::table('application_status')
							->insert(
							['applicant_id' =>$applicant_id]
							);
		// $this->sendSMS($number,$applicant_id,$bangla_name);
		return view('frontend.index');
	}
	private function sendSMS($number,$applicant_id,$bangla_name){
		// start sms code by saif
         $url = "http://66.45.237.70/api.php";
         $text='Dear '.$bangla_name.' your enrollment ID : '.$applicant_id.'Thank You';
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
 public function checkStatus(){
	 $index['data'] ='';

	 	return view('frontend.check_status',$index);
 }
 public function contact(){
	// $index['data'] ='';
	return view('frontend.contact');
}
public function sidebarDetails(){
	// $index['data'] ='';
	return view('frontend.sidebarDetails');
}
 public function verify(Request $request) {
	$application_info= DB::table('applican_informations')
					->join('application_status','application_status.applicant_id','applican_informations.id')
					->join('status_lists','status_lists.id','application_status.status_id')
					->where('applican_informations.id',$request->get('application_id'))
					->where('applican_informations.birth_date',$request->get('birth_date'))
					->orwhere('applican_informations.birth_id',$request->get('application_id'))
					->select('applican_informations.*','status_lists.status as application_status')
					->first();
// dd($application_info);
	if(!empty($application_info)){

		$index['data'] =$application_info;
		 return view('frontend.check_status',$index);

	}else{
		 Session::flash('error', 'Sorry! Enrollment id or birthday Incorrect.');
		$index['data'] ='';
		 return view('frontend.check_status',$index);
	}
 }
}
