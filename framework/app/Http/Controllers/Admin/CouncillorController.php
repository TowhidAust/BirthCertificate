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
		$index['data'] = User::join('wards','wards.id','users.ward_id')
		                ->whereUser_type("D")->orderBy('users.id', 'desc')
										->select('users.*','wards.name as ward_name')
										->get();
    // dd($index);
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


	public function create() {
		$data['wards'] = DB::table('wards')->get();
		return view("councillors.create",$data);
	}


	public function edit(User $driver) {

		return view("councillors.edit", compact("driver"));
	}

	private function upload_file($file, $field, $id) {
		$destinationPath = './uploads'; // upload path
		$extension = $file->getClientOriginalExtension();

		$fileName1 = Str::uuid() . '.' . $extension;

		$file->move($destinationPath, $fileName1);
		$user = User::find($id);
		$user->setMeta([$field => $fileName1]);
		$user->save();

	}

	public function update(DriverRequest $request) {
		$id = $request->get('id');
		$user = User::find($id);

		if ($request->file('driver_image') && $request->file('driver_image')->isValid()) {
			$this->upload_file($request->file('driver_image'), "driver_image", $id);
		}

		if ($request->file('license_image') && $request->file('license_image')->isValid()) {
			$this->upload_file($request->file('license_image'), "license_image", $id);
			$user->id_proof_type = "License";
			$user->save();
		}
		if ($request->file('documents')) {
			$this->upload_file($request->file('documents'), "documents", $id);

		}
		// dd($request->all());

		$user->name = $request->get("first_name") . " " . $request->get("last_name");
		$user->email = $request->get('email');
		$user->save();
		// $user->driver_image = $request->get('driver_image');
		$form_data = $request->all();
		unset($form_data['driver_image']);
		unset($form_data['documents']);
		unset($form_data['license_image']);

		$user->setMeta($form_data);
		$user->save();

		return redirect()->route("drivers.index");
	}

	public function store(Request $request) {
		 // dd($request->all());
		$request->validate([
			'contract_number' => ['required', new UniqueContractNumber],
			'first_name' => 'required',
			'ward' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'email' => 'required|email|unique:users,email,' . \Request::get("id"),
			'end_date' => 'nullable|date|date_format:Y-m-d',
			'driver_image' => 'nullable|image|mimes:jpg,png,jpeg',
		]);
// echo  $request->get("ward");
// exit;
		$id = User::create([
			"name" => $request->get("first_name") . " " . $request->get("last_name"),
			"email" => $request->get("email"),
			"ward_id" => $request->get("ward"),
			"password" => bcrypt($request->get("password")),
			"user_type" => "D",
			'api_token' => str_random(60),
		])->id;
		$user = User::find($id);

		if ($request->file('driver_image') && $request->file('driver_image')->isValid()) {

			$this->upload_file($request->file('driver_image'), "driver_image", $id);
		}
		$form_data = $request->all();
		unset($form_data['driver_image']);
		$user->setMeta($form_data);
		$user->save();
	return redirect()->route("councillor");

	}

	public function enable($id) {
		// $driver = UserMeta::whereUser_id($id)->first();
		$driver = User::find($id);
		$driver->is_active = 1;
		$driver->save();
		return redirect()->route("councillor");

	}
  	public function unbook($id) {
		// $driver = UserMeta::whereUser_id($id)->first();
		$driver = User::find($id);
		$driver->available_status = 0;
		$driver->save();
		return redirect()->route("councillor");

	}
	public function disable($id) {
		// $driver = UserMeta::whereUser_id($id)->first();
		$driver = User::find($id);
		$driver->is_active = 0;
		$driver->save();
		return redirect()->route("councillor");

	}



}
