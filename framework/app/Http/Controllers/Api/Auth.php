<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bookings;
use App\Model\Hyvikk;
use App\Model\MessageModel;
use App\Model\ReviewModel;
use App\Model\User;
use App\Model\VehicleModel;
use App\Rules\UniqueMobile;
use Illuminate\Support\Facades\Auth as Login;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use PushNotification;
use Validator;

class Auth extends Controller {
	public function login(Request $request) {
		$email = $request->get("email");
		$password = $request->get("password");
		$res['status'] = "success";
		if (Login::attempt(['email' => $email, 'password' => $password])) {

			$res['api_token'] = Login::user()->api_token;

		} else {

			$res['status'] = "failed";
		}
		return response()->json($res);
	}


public function user_login(Request $request) {
	$email = $request->get("username");
	$password = $request->get("password");

	if (Login::attempt(['email' => $email, 'password' => $password])) {
		$user = Login::user();
		$user->fcm_id = $request->get('fcm_id');
		$user->login_status = 1;

		$user->device_token = $request->get('device_token');
		$user->save();
		$data['success'] = 1;
		$data['message'] = "You have Signed in Successfully!";
		if ($user->user_type == "C") {
			$data['data'] = ['userinfo' => array("user_id" => $user->id,
				"api_token" => $user->api_token,
				"fcm_id" => $user->getMeta('fcm_id'),
				"device_token" => $user->getMeta('device_token'),
				"socialmedia_uid" => $user->getMeta('socialmedia_uid'),
				"user_name" => $user->name,
				"user_type" => $user->user_type,
				"mobno" => $user->getMeta('mobno'),
				"phone_code" => $user->getMeta('phone_code'),
				"emailid" => $user->email,
				"gender" => $user->getMeta('gender'),
				"password" => $user->password,
				"profile_pic" => $user->getMeta('profile_pic'),
				"status" => $user->getMeta('login_status'),
				"timestamp" => date('Y-m-d H:i:s', strtotime($user->created_at)))];
		}
	}
}
}
