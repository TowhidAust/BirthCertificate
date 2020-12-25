<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class ReportsController extends Controller {

		public function application() {

			return view("reports.application",);
		}

}
