<?php

namespace App\Http\Controllers;
use App\Model\VehicleTypeModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Auth as Login;
use App\Model\Bookings;
use App\Rules\UniqueMobile;
use App\Model\User;
use App\Model\UserData;
use Validator;
class FrontendController extends Controller {
	public function index() {

		return view('frontend.index');
	}
	public function applicationForm() {

		return view('frontend.application_form');
	}

}
