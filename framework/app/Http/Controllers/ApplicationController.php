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
		$english_name=$request->get('english_name');
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
 	  	$app_file= "uploads/others/".$applicant_id."_";
 		  $father_nid = $father_nid .basename($_FILES["father_nid_file"]["name"]);
 		  $mother_nid = $mother_nid .basename($_FILES["mother_nid_file"]["name"]);
 		  $card_nid =  $card.basename($_FILES["card"]["name"]);
 		  $others_nid = $others.basename($_FILES["others"]["name"]);
 		  $app_files = $app_file.basename($_FILES["app_file"]["name"]);
 		  $response = array();
 		  // Check if image file is an actual image or fake image
 		  if (isset($_FILES["father_nid_file"]))
 		  {
 		    move_uploaded_file($_FILES["father_nid_file"]["tmp_name"], $father_nid);
 		    move_uploaded_file($_FILES["mother_nid_file"]["tmp_name"], $mother_nid);
 		    move_uploaded_file($_FILES["card"]["tmp_name"], $card_nid);
 		    move_uploaded_file($_FILES["others"]["tmp_name"], $others_nid);
 		    move_uploaded_file($_FILES["others"]["tmp_name"], $app_files);
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
							 'bid' => $request->get('app_bid'),
							 'nid' => $request->get('app_nid'),
							 'sign' => $app_files,
							 'relation' => $request->get('relation'),]
							);

			DB::table('application_status')
							->insert(
							['applicant_id' =>$applicant_id]
							);
			$image = "uploads/profile/".$applicant_id."_";
 		  $image = $image.basename($_FILES["image"]["name"]);
			$response = array();
 		  // Check if image file is an actual image or fake image
 		  if (isset($_FILES["image"]))
 		  {
 		    move_uploaded_file($_FILES["image"]["tmp_name"], $image);
 		  }
			DB::table('applican_informations')
			       ->where('id',$applicant_id)
							->update(
							['image' => $image]
							);

	   Session::put(['id' => $applicant_id]);
		  $this->sendSMS($number,$applicant_id,$english_name);
		 return redirect()->route('application_update');
	}
	public function application_update(){
		 $id=Session::get('id');

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
									->where('applican_informations.id',$id)
									->select('applican_informations.id as applicant_id',
									'applican_informations.birth_id',
									'applican_informations.status',
									'applican_informations.applican_name',
									'wards.name as ward_name',
									'wards.id as ward_id',
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
		$data['id']=$id;
		$data['correction_id']=$id;
	 return view('frontend.application_form_update',$data);
	}
	public function application_complete(Request $request){
		date_default_timezone_set('Asia/Dhaka');
   $datatime  = date( 'Y-m-d G:i:s', time () );
		DB::table('applican_informations')
						->where('id',$request->get('applicant_id'))
						->update(
						['bangla_name' =>$request->get('bangla_name'),
						 'ward_name' => $request->get('ward_name'),
						 'english_name' => $request->get('english_name'),
						 'birth_date' => $request->get('birth_date'),
						 'number' =>$request->get('number'),
						 'gender' =>$request->get('gender'),
						 'created_at' =>$datatime,
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

							Session::flash('message', 'Your application has been completed');
		return view('frontend.index');
	}
	// public function application_update(Request $request){
	// 	return $request->all();
	// }
	private function sendSMS($number,$applicant_id,$english_name){
		// start sms code by saif
         $url = "http://66.45.237.70/api.php";
				 $text='Dear '.$english_name.'Your application has successfully submitted.
Your enrollment ID:'.$applicant_id.'
Thank You
Barishal City Corporation';
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

 public function bid_use(){
 	// $index['data'] ='';
 	return view('frontend.use_of_BID');
 }
 public function process_of_apply(){
 	// $index['data'] ='';
 	return view('frontend.process_of_apply');
 }
 public function faq(){
 	// $index['data'] ='';
 	return view('frontend.faq');
 }
 public function information_supplier(){
 	// $index['data'] ='';
 	return view('frontend.information_supplier');
 }
 public function b_d_registration_center(){
 	// $index['data'] ='';
 	return view('frontend.b_d_registration_center');
 }
 public function list_of_center(){
 	// $index['data'] ='';
 	return view('frontend.list_of_center');
 }
 public function mrittuki(){
 	// $index['data'] ='';
 	return view('frontend.mrittuki');
 }
 public function mrittuneed(){
 	// $index['data'] ='';
 	return view('frontend.mrittuneed');
 }
 public function mrittuapp(){
 	// $index['data'] ='';
 	return view('frontend.mrittuapp');
 }
 public function mrittuinf(){
 	// $index['data'] ='';
 	return view('frontend.mrittuinf');
 }
 public function gaget(){
 	// $index['data'] ='';
 	return view('frontend.gaget');
 }
 public function press(){
 	// $index['data'] ='';
 	return view('frontend.press');
 }
 public function birthki(){
 	// $index['data'] ='';
 	return view('frontend.birthki');
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
