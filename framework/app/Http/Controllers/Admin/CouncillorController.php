<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Requests\ImportRequest;
use App\Model\User;
use App\Rules\UniqueContractNumber;
use App\Rules\UniqueEId;
use App\Rules\UniqueLicenceNumber;
use Auth;
use DB;
use Firebase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Importer;
use Redirect;

class CouncillorController extends Controller {
	public function index() {
		$index['data'] = User::whereUser_type("D")->orderBy('id', 'desc')->get();
		return view("councillors.index", $index);
	}

	// public function destroy(Request $request) {
	// 	$driver = User::find($request->id);
	// 	if ($driver->vehicle_id) {
	// 		$vehicle = VehicleModel::find($driver->vehicle_id);
	// 		if ($vehicle != null) {
	// 			$vehicle->driver_id = null;
	// 			$vehicle->save();
	// 		}
	//
	// 	}
	// 	User::find($request->get('id'))->user_data()->delete();
	// 	User::find($request->get('id'))->delete();
	//
	// 	return redirect()->route('drivers.index');
	// }


	// public function create() {
	//
	// 	// dd($exclude);
	// 	$data['vehicles'] = VehicleModel::whereNotIn('id', $exclude)->get();
	// 	$data['phone_code'] = array('+93' => '+93',
	// 		'+358' => '+358',
	// 		'+1 340' => '+1 340',
	// 		'+681' => '+681',
	// 		'+967' => '+967',
	// 		'+260' => '+260',
	// 		'+263' => '+263');
	// 	return view("drivers.create", $data);
	// }
	//
	//
	// public function edit(User $driver) {
	// 	if ($driver->user_type != "D") {
	// 		return redirect("admin/drivers");
	// 	}
	//
	// 	if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
	// 		$vehicles = VehicleModel::whereNotIn('id', $exclude)->get();
	// 	} else {
	// 		$vehicles = VehicleModel::where('group_id', Auth::user()->group_id)->whereNotIn('id', $exclude)->orWhere('id', $driver->vehicle_id)->get();
	// 	}
	// 	$phone_code = array('+93' => '+93',
	// 		'+358' => '+358',
	// 		'+681' => '+681',
	// 		'+967' => '+967',
	// 		'+260' => '+260',
	// 		'+263' => '+263');
	// 	return view("drivers.edit", compact("driver", "phone_code", 'vehicles'));
	// }
	//
	// private function upload_file($file, $field, $id) {
	// 	$destinationPath = './uploads'; // upload path
	// 	$extension = $file->getClientOriginalExtension();
	//
	// 	$fileName1 = Str::uuid() . '.' . $extension;
	//
	// 	$file->move($destinationPath, $fileName1);
	// 	$user = User::find($id);
	// 	$user->setMeta([$field => $fileName1]);
	// 	$user->save();
	//
	// }
	//
	// public function update(DriverRequest $request) {
	// 	$id = $request->get('id');
	// 	$user = User::find($id);
	//
	// 	if ($request->file('driver_image') && $request->file('driver_image')->isValid()) {
	// 		$this->upload_file($request->file('driver_image'), "driver_image", $id);
	// 	}
	//
	// 	if ($request->file('license_image') && $request->file('license_image')->isValid()) {
	// 		$this->upload_file($request->file('license_image'), "license_image", $id);
	// 		$user->id_proof_type = "License";
	// 		$user->save();
	// 	}
	// 	if ($request->file('documents')) {
	// 		$this->upload_file($request->file('documents'), "documents", $id);
	//
	// 	}
	// 	// dd($request->all());
	//
	// 	$user->name = $request->get("first_name") . " " . $request->get("last_name");
	// 	$user->email = $request->get('email');
	// 	$user->save();
	// 	// $user->driver_image = $request->get('driver_image');
	// 	$form_data = $request->all();
	// 	unset($form_data['driver_image']);
	// 	unset($form_data['documents']);
	// 	unset($form_data['license_image']);
	//
	// 	$user->setMeta($form_data);
	// 	$user->save();
	//
	// 	return redirect()->route("drivers.index");
	// }
	//
	// public function store(Request $request) {
	// 	// dd($request->all());
	// 	$request->validate([
	// 		'emp_id' => ['required', new UniqueEId],
	// 		'license_number' => ['required', new UniqueLicenceNumber],
	// 		'contract_number' => ['required', new UniqueContractNumber],
	// 		'first_name' => 'required',
	// 		'last_name' => 'required',
	// 		'address' => 'required',
	// 		'phone' => 'required|numeric',
	// 		'email' => 'required|email|unique:users,email,' . \Request::get("id"),
	// 		'exp_date' => 'required|date|date_format:Y-m-d|after:tomorrow',
	// 		'start_date' => 'date|date_format:Y-m-d',
	// 		'issue_date' => 'date|date_format:Y-m-d',
	// 		'end_date' => 'nullable|date|date_format:Y-m-d',
	// 		'driver_image' => 'nullable|image|mimes:jpg,png,jpeg',
	// 		'license_image' => 'nullable|image|mimes:jpg,png,jpeg',
	// 		'documents.*' => 'nullable|mimes:jpg,png,jpeg,pdf,doc,docx',
	// 	]);
	//
	// 	$id = User::create([
	// 		"name" => $request->get("first_name") . " " . $request->get("last_name"),
	// 		"email" => $request->get("email"),
	// 		"password" => bcrypt($request->get("password")),
	// 		"user_type" => "D",
	// 		'api_token' => str_random(60),
	// 	])->id;
	// 	$user = User::find($id);
	//
	// 	if ($request->file('driver_image') && $request->file('driver_image')->isValid()) {
	//
	// 		$this->upload_file($request->file('driver_image'), "driver_image", $id);
	// 	}
	//
	// 	if ($request->file('license_image') && $request->file('license_image')->isValid()) {
	// 		$this->upload_file($request->file('license_image'), "license_image", $id);
	// 		$user->id_proof_type = "License";
	// 		$user->save();
	// 	}
	// 	if ($request->file('documents')) {
	// 		$this->upload_file($request->file('documents'), "documents", $id);
	//
	// 	}
	//
	// 	$form_data = $request->all();
	// 	unset($form_data['driver_image']);
	// 	unset($form_data['documents']);
	// 	unset($form_data['license_image']);
	// 	$user->setMeta($form_data);
	// 	$user->save();
	//
	//
	// 	DriverVehicleModel::updateOrCreate(['vehicle_id' => $request->get('vehicle_id')], ['vehicle_id' => $request->get('vehicle_id'), 'driver_id' => $user->id]);
	// 	return redirect()->route("drivers.index");
	//
	// }

	// public function enable($id) {
	// 	// $driver = UserMeta::whereUser_id($id)->first();
	// 	$driver = User::find($id);
	// 	$driver->is_active = 1;
	// 	$driver->save();
	// 	return redirect()->route("drivers.index");
	//
	// }
  // 	public function unbook($id) {
	// 	// $driver = UserMeta::whereUser_id($id)->first();
	// 	$driver = User::find($id);
	// 	$driver->available_status = 0;
	// 	$driver->save();
	// 	return redirect()->route("drivers.index");
	//
	// }
	// public function disable($id) {
	// 	// $driver = UserMeta::whereUser_id($id)->first();
	// 	$driver = User::find($id);
	// 	$driver->is_active = 0;
	// 	$driver->save();
	// 	return redirect()->route("drivers.index");
	//
	// }




}
