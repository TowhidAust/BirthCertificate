<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Requests\ImportRequest;
use App\Model\Bookings;
use App\Model\DriverLogsModel;
use App\Model\ExpCats;
use App\Model\Expense;
use App\Model\IncCats;
use App\Model\IncomeModel;
use App\Model\ServiceItemsModel;
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

class DriversController extends Controller {

	public function importDrivers(ImportRequest $request) {
		$file = $request->excel;
		$destinationPath = './assets/samples/'; // upload path
		$extension = $file->getClientOriginalExtension();
		$fileName = Str::uuid() . '.' . $extension;
		$file->move($destinationPath, $fileName);

		$excel = Importer::make('Excel');
		$excel->load('assets/samples/' . $fileName);
		$collection = $excel->getCollection()->toArray();
		array_shift($collection);
		// dd($collection);
		foreach ($collection as $driver) {
			if ($driver[4] != null) {
				$id = User::create([
					"name" => $driver[0] . " " . $driver[2],
					"email" => $driver[4],
					"password" => bcrypt($driver[15]),
					"user_type" => "D",
					'api_token' => str_random(60),
				])->id;
				$user = User::find($id);

				$user->is_active = 1;
				$user->is_available = 0;
				$user->first_name = $driver[0];
				$user->middle_name = $driver[1];
				$user->last_name = $driver[2];
				$user->address = $driver[3];
				$user->phone = $driver[5];
				$user->phone_code = "+" . $driver[6];
				$user->emp_id = $driver[7];
				$user->contract_number = $driver[8];
				$user->license_number = $driver[9];
				if ($driver[10] != null) {
					$user->issue_date = date('Y-m-d', strtotime($driver[10]));
				}

				if ($driver[11] != null) {
					$user->exp_date = date('Y-m-d', strtotime($driver[11]));
				}

				if ($driver[12] != null) {
					$user->start_date = date('Y-m-d', strtotime($driver[12]));
				}

				if ($driver[13] != null) {
					$user->end_date = date('Y-m-d', strtotime($driver[13]));
				}

				$user->gender = (($driver[14] == 'female') ? 0 : 1);
				$user->econtact = $driver[15];
				$user->save();
			}
		}

		return back();
	}

	public function index() {
		$index['data'] = User::whereUser_type("D")->orderBy('id', 'desc')->get();
		return view("councillors.index", $index);
	}

	public function destroy(Request $request) {
		$driver = User::find($request->id);
		if ($driver->vehicle_id) {
			$vehicle = VehicleModel::find($driver->vehicle_id);
			if ($vehicle != null) {
				$vehicle->driver_id = null;
				$vehicle->save();
			}

		}
		User::find($request->get('id'))->user_data()->delete();
		User::find($request->get('id'))->delete();

		return redirect()->route('drivers.index');
	}

	public function bulk_delete(Request $request) {
		$drivers = User::whereIn('id', $request->ids)->get();
		foreach ($drivers as $driver) {
			if ($driver->vehicle_id) {
				$vehicle = VehicleModel::find($driver->vehicle_id);
				if ($vehicle != null) {
					$vehicle->driver_id = null;
					$vehicle->save();
				}
			}
		}

		User::whereIn('id', $request->ids)->delete();
		// return redirect('admin/customers');
		return back();
	}

	public function create() {

		// dd($exclude);
		$data['vehicles'] = VehicleModel::whereNotIn('id', $exclude)->get();
		$data['phone_code'] = array('+93' => '+93',
			'+358' => '+358',
			'+1 340' => '+1 340',
			'+681' => '+681',
			'+967' => '+967',
			'+260' => '+260',
			'+263' => '+263');
		return view("drivers.create", $data);
	}

	public function edit(User $driver) {
		if ($driver->user_type != "D") {
			return redirect("admin/drivers");
		}

		if (Auth::user()->group_id == null || Auth::user()->user_type == "S") {
			$vehicles = VehicleModel::whereNotIn('id', $exclude)->get();
		} else {
			$vehicles = VehicleModel::where('group_id', Auth::user()->group_id)->whereNotIn('id', $exclude)->orWhere('id', $driver->vehicle_id)->get();
		}
		$phone_code = array('+93' => '+93',
			'+358' => '+358',
			'+681' => '+681',
			'+967' => '+967',
			'+260' => '+260',
			'+263' => '+263');
		return view("drivers.edit", compact("driver", "phone_code", 'vehicles'));
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
			'emp_id' => ['required', new UniqueEId],
			'license_number' => ['required', new UniqueLicenceNumber],
			'contract_number' => ['required', new UniqueContractNumber],
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'phone' => 'required|numeric',
			'email' => 'required|email|unique:users,email,' . \Request::get("id"),
			'exp_date' => 'required|date|date_format:Y-m-d|after:tomorrow',
			'start_date' => 'date|date_format:Y-m-d',
			'issue_date' => 'date|date_format:Y-m-d',
			'end_date' => 'nullable|date|date_format:Y-m-d',
			'driver_image' => 'nullable|image|mimes:jpg,png,jpeg',
			'license_image' => 'nullable|image|mimes:jpg,png,jpeg',
			'documents.*' => 'nullable|mimes:jpg,png,jpeg,pdf,doc,docx',
		]);

		$id = User::create([
			"name" => $request->get("first_name") . " " . $request->get("last_name"),
			"email" => $request->get("email"),
			"password" => bcrypt($request->get("password")),
			"user_type" => "D",
			'api_token' => str_random(60),
		])->id;
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

		$form_data = $request->all();
		unset($form_data['driver_image']);
		unset($form_data['documents']);
		unset($form_data['license_image']);
		$user->setMeta($form_data);
		$user->save();


		DriverVehicleModel::updateOrCreate(['vehicle_id' => $request->get('vehicle_id')], ['vehicle_id' => $request->get('vehicle_id'), 'driver_id' => $user->id]);
		return redirect()->route("drivers.index");

	}

	public function enable($id) {
		// $driver = UserMeta::whereUser_id($id)->first();
		$driver = User::find($id);
		$driver->is_active = 1;
		$driver->save();
		return redirect()->route("drivers.index");

	}
  	public function unbook($id) {
		// $driver = UserMeta::whereUser_id($id)->first();
		$driver = User::find($id);
		$driver->available_status = 0;
		$driver->save();
		return redirect()->route("drivers.index");

	}
	public function disable($id) {
		// $driver = UserMeta::whereUser_id($id)->first();
		$driver = User::find($id);
		$driver->is_active = 0;
		$driver->save();
		return redirect()->route("drivers.index");

	}

	public function my_bookings() {
		$data['data'] = Bookings::orderBy('id', 'desc')->whereDriver_id(Auth::user()->id)->get();
		// dd($data['data']);
		return view('councillors.my_bookings', $data);
	}

	public function yearly() {
		$d_id = Auth::user()->id;
		$bookings = Bookings::where('driver_id', $d_id)->get();
		$v_id = array('0');
		foreach ($bookings as $key) {
			if ($key->vehicle_id != null) {
				$v_id[] = $key->vehicle_id;
			}

		}

		$years = DB::select(DB::raw("select distinct year(date) as years from income  union select distinct year(date) as years from expense order by years desc"));
		$y = array();
		foreach ($years as $year) {
			$y[$year->years] = $year->years;
		}

		if ($years == null) {

			$y[date('Y')] = date('Y');

		}
		$data['vehicles'] = VehicleModel::whereIn('id', $v_id)->get();

		$data['year_select'] = date("Y");

		$data['vehicle_select'] = null;
		$data['years'] = $y;
		$in = join(",", $v_id);
		$data['income'] = IncomeModel::select(DB::raw("sum(amount) as income"))->whereYear('date', date('Y'))->whereIn('vehicle_id', $v_id)->get();
		$data['expenses'] = Expense::select(DB::raw('sum(amount) as expense'))->whereYear('date', date('Y'))->whereIn('vehicle_id', $v_id)->get();
		$data['expense_by_cat'] = Expense::select('type', 'expense_type', DB::raw('sum(amount) as expense'))->whereYear('date', date('Y'))->whereIn('vehicle_id', $v_id)->groupBy(['expense_type', 'type'])->get();

		$ss = ServiceItemsModel::get();
		foreach ($ss as $s) {
			$c[$s->id] = $s->description;
		}

		$kk = ExpCats::get();

		foreach ($kk as $k) {
			$b[$k->id] = $k->name;

		}
		$hh = IncCats::get();

		foreach ($hh as $k) {
			$i[$k->id] = $k->name;

		}

		$data['service'] = $c;
		$data['expense_cats'] = $b;
		$data['income_cats'] = $i;
		$data['result'] = "";
		$data['yearly_income'] = $this->yearly_income();
		$data['yearly_expense'] = $this->yearly_expense();
		return view('drivers.yearly', $data);

	}

	public function yearly_post(Request $request) {
		$d_id = Auth::user()->id;
		$bookings = Bookings::where('driver_id', $d_id)->get();
		$v_id = array();
		foreach ($bookings as $key) {
			$v_id[] = $key->vehicle_id;
		}
		$years = DB::select(DB::raw("select distinct year(date) as years from income  union select distinct year(date) as years from expense order by years desc"));
		$y = array();
		$b = array();
		$i = array();
		foreach ($years as $year) {
			$y[$year->years] = $year->years;
		}
		if ($years == null) {
			$y[date('Y')] = date('Y');
		}
		$data['vehicles'] = VehicleModel::whereIn('id', $v_id)->get();
		$data['year_select'] = $request->get("year");
		$data['vehicle_select'] = $request->get("vehicle_id");
		$data['yearly_income'] = $this->yearly_income();
		$data['yearly_expense'] = $this->yearly_expense();

		$income1 = IncomeModel::select(DB::raw("sum(amount) as income"))->whereYear('date', $data['year_select']);
		$expense1 = Expense::select(DB::raw("sum(amount) as expense"))->whereYear('date', $data['year_select']);
		$expense2 = Expense::select('type', 'expense_type', DB::raw("sum(amount) as expense"))->whereYear('date', $data['year_select'])->groupBy(['expense_type', 'type']);
		if ($data['vehicle_select'] != "") {
			$data['income'] = $income1->where('vehicle_id', $data['vehicle_select'])->get();
			$data['expenses'] = $expense1->where('vehicle_id', $data['vehicle_select'])->get();
			$data['expense_by_cat'] = $expense2->where('vehicle_id', $data['vehicle_select'])->get();
		} else {
			$data['income'] = $income1->whereIn('vehicle_id', $v_id)->get();
			$data['expenses'] = $expense1->whereIn('vehicle_id', $v_id)->get();
			$data['expense_by_cat'] = $expense2->whereIn('vehicle_id', $v_id)->get();
		}

		$ss = ServiceItemsModel::get();
		foreach ($ss as $s) {
			$c[$s->id] = $s->description;
		}

		$kk = ExpCats::get();

		foreach ($kk as $k) {
			$b[$k->id] = $k->name;

		}
		$hh = IncCats::get();

		foreach ($hh as $k) {
			$i[$k->id] = $k->name;

		}

		$data['service'] = $c;
		$data['expense_cats'] = $b;
		$data['income_cats'] = $i;

		$data['years'] = $y;
		$data['result'] = "";
		return view('drivers.yearly', $data);
	}

	public function monthly() {
		$d_id = Auth::user()->id;
		$bookings = Bookings::where('driver_id', $d_id)->get();
		$v_id = array('0');
		foreach ($bookings as $key) {
			if ($key->vehicle_id != null) {
				$v_id[] = $key->vehicle_id;
			}

		}

		$years = DB::select(DB::raw("select distinct year(date) as years from income  union select distinct year(date) as years from expense order by years desc"));
		$y = array();
		foreach ($years as $year) {
			$y[$year->years] = $year->years;
		}

		if ($years == null) {

			$y[date('Y')] = date('Y');

		}
		$data['vehicles'] = VehicleModel::whereIn('id', $v_id)->get();

		$data['year_select'] = date("Y");
		$data['month_select'] = date("n");
		$data['vehicle_select'] = null;
		$data['years'] = $y;
		$data['yearly_income'] = $this->yearly_income();
		$data['yearly_expense'] = $this->yearly_expense();
		$in = join(",", $v_id);

		$data['income'] = IncomeModel::select(DB::raw('sum(amount) as income'))->whereYear('date', date('Y'))->whereMonth('date', date('n'))->whereIn('vehicle_id', $v_id)->get();

		$data['expenses'] = Expense::select(DB::raw('sum(amount) as expense'))->whereYear('date', date('Y'))->whereMonth('date', date('n'))->whereIn('vehicle_id', $v_id)->get();
		$data['expense_by_cat'] = DB::select(DB::raw("select type,expense_type,sum(amount) as expense from expense where deleted_at is null and year(date)=" . date("Y") . " and month(date)=" . date("n") . " and vehicle_id in(" . $in . ") group by expense_type,type"));

		$ss = ServiceItemsModel::get();
		foreach ($ss as $s) {
			$c[$s->id] = $s->description;
		}

		$kk = ExpCats::get();

		foreach ($kk as $k) {
			$b[$k->id] = $k->name;

		}
		$hh = IncCats::get();

		foreach ($hh as $k) {
			$i[$k->id] = $k->name;

		}

		$data['service'] = $c;
		$data['expense_cats'] = $b;
		$data['income_cats'] = $i;
		$data['result'] = "";

		return view("drivers.monthly", $data);
	}

	public function monthly_post(Request $request) {
		$d_id = Auth::user()->id;
		$bookings = Bookings::where('driver_id', $d_id)->get();
		$v_id = array('0');
		foreach ($bookings as $key) {
			if ($key->vehicle_id != null) {
				$v_id[] = $key->vehicle_id;
			}

		}
		$years = DB::select(DB::raw("select distinct year(date) as years from income  union select distinct year(date) as years from expense order by years desc"));
		$y = array();
		$b = array();
		$i = array();
		$c = array();
		foreach ($years as $year) {
			$y[$year->years] = $year->years;
		}
		if ($years == null) {
			$y[date('Y')] = date('Y');
		}
		$data['vehicles'] = VehicleModel::whereIn('id', $v_id)->get();
		$data['year_select'] = $request->get("year");
		$data['month_select'] = $request->get("month");
		$data['vehicle_select'] = $request->get("vehicle_id");
		$data['yearly_income'] = $this->yearly_income();
		$data['yearly_expense'] = $this->yearly_expense();

		$income1 = IncomeModel::select(DB::raw('sum(amount) as income'))->whereYear('date', $data['year_select'])->whereMonth('date', $data['month_select']);
		$expense1 = Expense::select(DB::raw('sum(amount) as expense'))->whereYear('date', $data['year_select'])->whereMonth('date', $data['month_select']);
		$expense2 = Expense::select('type', 'expense_type', DB::raw('sum(amount) as expense'))->whereYear('date', $data['year_select'])->whereMonth('date', $data['month_select'])->groupBy(['expense_type', 'type']);
		if ($data['vehicle_select'] != "") {
			$data['income'] = $income1->where('vehicle_id', $data['vehicle_select'])->get();
			$data['expenses'] = $expense1->where('vehicle_id', $data['vehicle_select'])->get();
			$data['expense_by_cat'] = $expense2->where('vehicle_id', $data['vehicle_select'])->get();
		} else {
			$data['income'] = $income1->whereIn('vehicle_id', $v_id)->get();
			$data['expenses'] = $expense1->whereIn('vehicle_id', $v_id)->get();
			$data['expense_by_cat'] = $expense2->whereIn('vehicle_id', $v_id)->get();
		}

		$ss = ServiceItemsModel::get();
		foreach ($ss as $s) {
			$c[$s->id] = $s->description;
		}

		$kk = ExpCats::get();

		foreach ($kk as $k) {
			$b[$k->id] = $k->name;

		}
		$hh = IncCats::get();

		foreach ($hh as $k) {
			$i[$k->id] = $k->name;

		}

		$data['service'] = $c;
		$data['expense_cats'] = $b;
		$data['income_cats'] = $i;

		$data['years'] = $y;
		$data['result'] = "";
		return view("drivers.monthly", $data);
	}

	private function yearly_income() {

		$d_id = Auth::user()->id;
		$bookings = Bookings::where('driver_id', $d_id)->get();
		$v_id = array('0');
		foreach ($bookings as $key) {
			if ($key->vehicle_id != null) {
				$v_id[] = $key->vehicle_id;
			}

		}

		$in = join(",", $v_id);
		$incomes = DB::select('select monthname(date) as mnth,sum(amount) as tot from income where year(date)=? and  deleted_at is null and vehicle_id in(' . $in . ') group by month(date)', [date("Y")]);
		$months = ["January" => 0, "February" => 0, "March" => 0, "April" => 0, "May" => 0, "June" => 0, "July" => 0, "August" => 0, "September" => 0, "October" => 0, "November" => 0, "December" => 0];
		$income2 = array();

		foreach ($incomes as $income) {

			$income2[$income->mnth] = $income->tot;

		}
		$yr = array_merge($months, $income2);
		return implode(",", $yr);
	}
	private function yearly_expense() {
		$d_id = Auth::user()->id;
		$bookings = Bookings::where('driver_id', $d_id)->get();
		$v_id = array('0');
		foreach ($bookings as $key) {
			if ($key->vehicle_id != null) {
				$v_id[] = $key->vehicle_id;
			}

		}

		$in = join(",", $v_id);
		$incomes = DB::select('select monthname(date) as mnth,sum(amount) as tot from expense where year(date)=? and  deleted_at is null and vehicle_id in(' . $in . ') group by month(date)', [date("Y")]);
		$months = ["January" => 0, "February" => 0, "March" => 0, "April" => 0, "May" => 0, "June" => 0, "July" => 0, "August" => 0, "September" => 0, "October" => 0, "November" => 0, "December" => 0];
		$income2 = array();

		foreach ($incomes as $income) {

			$income2[$income->mnth] = $income->tot;

		}
		$yr = array_merge($months, $income2);
		return implode(",", $yr);

	}

	// driver records from firebase
	public function firebase() {

		$data = Firebase::get('/User_Locations/', ["orderBy" => '"user_type"', "equalTo" => '"D"']);

		// $data = Firebase::get('/User_Locations/');

		// dd($data);
		$details = json_decode($data, true);

		dd($details);
		$markers = array();
		foreach ($details as $d) {
			// echo $d['user_name'] . "</br>";
			if ($d['user_type'] == "D") {

				$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude'], 'av' => $d['availability']],
				);
			}
		}
		// dd($markers);
	}

	public function driver_maps() {
		$data = Firebase::get('/User_Locations/', ["orderBy" => '"user_type"', "equalTo" => '"D"']);

		$all_data = json_decode($data, true);
		$drivers = array();
		foreach ($all_data as $d) {
			if (isset($d['latitude']) && isset($d['longitude'])) {
				if ($d['latitude'] != null || $d['longitude'] != null) {
					$drivers[] = array('user_name' => $d['user_name'], 'availability' => $d['availability'],
						'user_id' => $d['user_id'],
					);
				}
			}

		}
		$index['details'] = $drivers;
		// dd($drivers);
		return view('driver_maps', $index);
	}

	public function markers() {
		// $data = Firebase::get('/User_Locations/');

		$data = Firebase::get('/User_Locations/', ["orderBy" => '"user_type"', "equalTo" => '"D"']);

		$details = json_decode($data, true);

		// dd($details);
		$markers = array();
		foreach ($details as $d) {
			if (isset($d['latitude']) && isset($d['longitude'])) {
				if ($d['latitude'] != null || $d['longitude'] != null) {
					if ($d['availability'] == "1") {
						$icon = "online.png";
						$status = "Online";
					} else {
						$icon = "offline.png";
						$status = "Offline";
					}

					$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
				}
			}

		}
		return json_encode($markers);

	}

	//temp
	public function markers_filter($id) {
		// $data = Firebase::get('/User_Locations/');

		$data = Firebase::get('/User_Locations/', ["orderBy" => '"user_type"', "equalTo" => '"D"']);

		$details = json_decode($data, true);

		// dd($details);
		$markers = array();
		foreach ($details as $d) {
			if (isset($d['latitude']) && isset($d['longitude'])) {
				if ($d['latitude'] != null || $d['longitude'] != null) {
					if ($d['availability'] == "1") {
						$icon = "online.png";
						$status = "Online";
					} else {
						$icon = "offline.png";
						$status = "Offline";
					}
					if ($id == 1) {
						if ($d['availability'] == "1") {
							$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
						}

					}if ($id == 0) {
						if ($d['availability'] == "0") {
							$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
						}

					}if ($id == 2) {
						$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
					}

				}
			}
		}
		return json_encode($markers);

	}

	// marker with status selection in dropdown
	public function track_markers($id) {
		$data = Firebase::get('/User_Locations/', ["orderBy" => '"user_type"', "equalTo" => '"D"']);

		$details = json_decode($data, true);

		// dd($details);
		$markers = array();
		foreach ($details as $d) {
			if (isset($d['latitude']) && isset($d['longitude'])) {
				if ($d['latitude'] != null || $d['longitude'] != null) {
					if ($d['availability'] == "1") {
						$icon = "online.png";
						$status = "Online";
					} else {
						$icon = "offline.png";
						$status = "Offline";
					}
					if ($id == 1) {
						if ($d['availability'] == "1") {
							$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
						}

					}if ($id == 0) {
						if ($d['availability'] == "0") {
							$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
						}

					}if ($id == 2) {
						$markers[] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
					}
					// //appending $new in our array
					// array_unshift($arr, $new);
					// //now make it unique.
					// $final = array_unique($arr);

				}
			}
		}
		return json_encode($markers);
	}

	// view of single driver tracking
	public function track_driver($id) {

		$data = Firebase::get('/User_Locations/', ["orderBy" => '"user_type"', "equalTo" => '"D"']);

		$details = $index['details'] = json_decode($data, true);
		foreach ($details as $d) {
			if ($d['user_id'] == $id) {
				if ($d['availability'] == "1") {
					$icon = "online.png";
					$status = "Online";
				} else {
					$icon = "offline.png";
					$status = "Offline";
				}
				if (isset($d['latitude']) && isset($d['longitude'])) {
					$index['driver'] = array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status);
				}
			}
		}
		// dd($index['driver']);
		return view('track_driver', $index);
	}

	public function single_driver($id) {
		$data = Firebase::get('/User_Locations/', ["orderBy" => '"user_type"', "equalTo" => '"D"']);

		$details = json_decode($data, true);
		foreach ($details as $d) {
			if ($d['user_id'] == $id) {
				if ($d['availability'] == "1") {
					$icon = "online.png";
					$status = "Online";
				} else {
					$icon = "offline.png";
					$status = "Offline";
				}
				$driver = [array("id" => $d["user_id"], "name" => $d["user_name"], "position" => ["lat" => $d['latitude'], "long" => $d['longitude']], "icon" => $icon, 'status' => $status)];
			}
		}
		return json_encode($driver);
	}

}
