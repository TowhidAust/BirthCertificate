<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Model\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Redirect;

class UsersController extends Controller {
	public function index() {
		$index['data'] = User::whereUser_type("O")->orWhere('user_type', 'A')->orWhere('user_type', 'OP')->orWhere('user_type', 'S')->get();
		return view("users.index", $index);
	}

	public function create() {
		return view("users.create");
	}

	public function destroy(Request $request) {
		User::find($request->get('id'))->delete();
		return redirect()->route('users.index');
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

	public function store(UserRequest $request) {
	//	 dd($request->get('module'));

		$id = User::create([
			"name" => $request->get("first_name") . " " . $request->get("last_name"),
			"email" => $request->get("email"),
			"number" => $request->get("number"),
			"designation" => $request->get("designation"),
			"password" => bcrypt($request->get("password")),
			"user_type" => $request->get("role"),
			"group_id" => $request->get("group_id"),
			'api_token' => str_random(60),
		])->id;
		$user = User::find($id);
		$user->module = serialize($request->get('module'));
		$user->language = 'English-en';
		$user->save();

		if ($request->file('profile_image') && $request->file('profile_image')->isValid()) {
			$this->upload_file($request->file('profile_image'), "profile_image", $id);
		}
		return Redirect::route("users.index");

	}
	public function edit(User $user) {

		return view("users.edit", compact("user"));
	}

	public function update(EditUserRequest $request) {
   // return $request->all();
		$user = User::whereId($request->get("id"))->first();
		$user->name = $request->get("first_name") . " " . $request->get("last_name");
		$user->email = $request->get("email");
		$user->number = $request->get("number");
		$user->designation = $request->get("designation");
		$user->user_type = $request->get("role");
		$user->group_id = $request->get("group_id");
		$user->module = serialize($request->get('module'));

		// $user->profile_image = $request->get('profile_image');
		// if ($request->get('is_admin') == '1') {
		// 	$user->user_type = 'S';
		// } else {
		// 	$user->user_type = 'O';
		// }
		// if (Auth::user()->user_type == "S" && $user->id == Auth::user()->id) {
		// 	$user->user_type = 'S';
		// }
		$user->save();
		if ($request->file('profile_image') && $request->file('profile_image')->isValid()) {
			$this->upload_file($request->file('profile_image'), "profile_image", $user->id);
		}
		$modules = unserialize($user->getMeta('module'));
		// if (Auth::user()->id == $user->id && !(in_array(0, $modules))) {
		//     return redirect('admin/');
		// }
		return Redirect::route("users.index");
	}

}
