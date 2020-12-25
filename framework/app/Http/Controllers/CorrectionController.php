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
class CorrectionController extends Controller {
	public function correction(Request $request) {
// 		$request->validate(
//     ['birth_id' => 'required'],
//     ['birth_id.required' => 'জন্ম/মৃত্যু নিবন্ধন নম্বর আবশ্যক']
// );
// 		$request->validate(
//     ['name' => 'required'],
//     ['name.required' => 'নিবন্ধিত ব্যক্তির নাম আবশ্যক']
// );
		$request->validate([
			'birth_id' => 'required',
			'birth_date' => 'required',
			'application_date' => 'required',
			'name' => 'required',
			'ward_id' => 'required',
			'applicant_name' => 'required',
			'reason' => 'required',
			'correction' => 'required',
			'present' => 'required',
			'relation' => 'required',
			'document' => 'required',
		]);
		// $birth_id = Request::old('birth_id');
		// $name = Request::old('name');
		// $birth_date = Request::old('birth_date');
		// $application_date = Request::old('application_date');
		// $applicant_name = Request::old('applicant_name');
		// $relation = Request::old('relation');
		// $ward_id = Request::old('ward_id');
	 // dd($request->all());
		// applicant info
		DB::table('correction_applications')
						->insert(
						['birth_id' => $request->get('birth_id'),
						 'birth_app_date' => $request->get('application_date'),
						 'name' => $request->get('name'),
						 'ward_id' => $request->get('ward_id'),
						 'applicant_name' => $request->get('applicant_name'),
						 'relation' => $request->get('relation'),
						 'sign' => $request->get('sign'),
						 'birth_date' => $request->get('birth_date')]
						);

					$correction_id=DB::getPdo()->lastInsertId();
 					// correction
						$present=$request->get('present');
						$correction=$request->get('correction');
						$reason=$request->get('reason');
		         foreach ($present as $key => $n) {
		          DB::table('correction_infos')->insert(
		              ['present' => $n,
									'correction' =>$correction[$key],
									'reason' =>$reason[$key],
									 'correction_id' =>$correction_id]
		          );
		         }

						 $images=$request->file('document');
			     if ($images) {
			       foreach($images as $image)  {
			       $image_name = $correction_id."_".$image->getClientOriginalName();
			       $upload_path = 'uploads/correction_file/';
			       $image->move($upload_path, $image_name);
			       $image_url = $upload_path.$image_name;
			       DB::table('correction_documents')
			            ->insert([
			              'file' => $image_url,
			              'correction_id' => $correction_id
			            ]);
			     }

			     }
			// approval
			DB::table('correction_approvals')
							->insert(
							['correction_id' =>$correction_id]
							);

			$payment_file = "uploads/correction_payment/".$correction_id."_";
 		  $payment_file = $payment_file .basename($_FILES["payment_file"]["name"]);
			$response = array();
 		  // Check if image file is an actual image or fake image
 		  if (isset($_FILES["payment_file"]))
 		  {
 		    move_uploaded_file($_FILES["payment_file"]["tmp_name"], $payment_file);
 		  }
			// payment infomation
			DB::table('correction_payments')
							->insert(
							['correction_id' =>$correction_id,
							 'file' => $payment_file,
							 'bank_name' => $request->get('bank_name'),
							 'branch' => $request->get('branch'),
							 'transaction_id' => $request->get('transaction_id'),]
							);

			// DB::table('applicant')
			// 				->insert(
			// 				['applicant_id' =>$correction_id,
			// 				 'name' => $request->get('name'),
			// 				 'address' => $request->get('address'),
			// 				 'relation' => $request->get('relation'),]
			// 				);

			// DB::table('application_status')
			// 				->insert(
			// 				['applicant_id' =>$correction_id]
			// 				);
		// $this->sendSMS($number,$correction_id,$bangla_name);
		Session::flash('message', 'Your application send successfully!');
		return back();
	}
	private function sendSMS($number,$correction_id,$bangla_name){
		// start sms code by saif
         $url = "http://66.45.237.70/api.php";
         $text='Dear '.$bangla_name.' your enrollment ID : '.$correction_id.'Thank You';
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
