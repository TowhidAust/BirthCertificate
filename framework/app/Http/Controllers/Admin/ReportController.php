<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Model\Bookings;
use App\Model\Hyvikk;
use App\Model\IncCats;
use App\Model\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;
use PushNotification;

class ReportController extends Controller
{
  public function correction_report()
      {
        $data['date1'] = null;
        $data['date2'] = null;
        $data['wards']= DB::table('wards')->get();
          if (Auth::user()->user_type == "C") {
              $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
          } elseif (Auth::user()->user_type == "S") {

            $data['pending_applican_info'] = DB::table('correction_applications')
                                            ->join('wards','wards.id','=','correction_applications.ward_id')
                                            ->orderBy('correction_applications.id','desc')
										                        ->whereDate('correction_applications.created_at', DB::raw('CURDATE()'))
                                            ->select('correction_applications.*','wards.name as ward_name')
                                            ->get();
                                             // dd($data['pending_applican_info']);

          }elseif(Auth::user()->user_type == "D"){
            $data['pending_applican_info'] = DB::table('correction_applications')
                                            ->join('wards','wards.id','=','correction_applications.ward_id')
                                      			->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                            ->orderBy('correction_applications.id','desc')
                                            ->where('correction_applications.ward_id',Auth::user()->ward_id)
										                        ->whereDate('correction_applications.created_at', DB::raw('CURDATE()'))
                                            ->select('correction_applications.*','wards.name as ward_name','correction_applications.name as f_name')
                                            ->get();
                                            // dd($data['pending_applican_info']);

          }elseif (Auth::user()->user_type == "A") {
            $data['pending_applican_info'] = DB::table('correction_applications')
                                            ->join('wards','wards.id','=','correction_applications.ward_id')
                                            ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                            ->orderBy('correction_applications.id','desc')
                                            ->where('correction_approvals.councillor','1')
                                            ->where('correction_approvals.accountant','0')
										                        ->whereDate('correction_applications.created_at', DB::raw('CURDATE()'))
                                            ->select('correction_applications.*','wards.name as ward_name')
                                            ->get();
                                             // dd($data['pending_applican_info']);

          }elseif (Auth::user()->user_type == "O") {
            $data['pending_applican_info'] = DB::table('correction_applications')
                                            ->join('wards','wards.id','=','correction_applications.ward_id')
                                            ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                            ->orderBy('correction_applications.id','desc')
                                            ->where('correction_approvals.accountant','1')
                                            ->where('correction_approvals.officer','0')
										                        ->whereDate('correction_applications.created_at', DB::raw('CURDATE()'))
                                            ->select('correction_applications.*','wards.name as ward_name')
                                            ->get();
                                             // dd($data['pending_applican_info']);

          }elseif (Auth::user()->user_type == "OP") {
            $data['pending_applican_info'] = DB::table('correction_applications')
                                            ->join('wards','wards.id','=','correction_applications.ward_id')
                                            ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                            ->orderBy('correction_applications.id','desc')
                                            ->where('correction_approvals.officer','1')
                                            ->where('correction_approvals.operator','0')
										                        ->whereDate('correction_applications.created_at', DB::raw('CURDATE()'))
                                            ->select('correction_applications.*','wards.name as ward_name')
                                            ->get();

          }
          // dd($data);
          return view("reports.correction", $data);
      }
      public function correction_report_post(Request $request)
          {
            $data['date1'] = $request->get('date1');
            $data['date2'] = $request->get('date2');
            $data['wards']= DB::table('wards')->get();
              if (Auth::user()->user_type == "C") {
                  $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
              } elseif (Auth::user()->user_type == "S") {

                $correction = DB::table('correction_applications')
                                                ->join('wards','wards.id','=','correction_applications.ward_id')
                                                ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                                ->orderBy('correction_applications.id','desc')
                                                ->whereBetween('correction_applications.created_at', [$request->get('date1'), $request->get('date2')])
                                                ->select('correction_applications.*','wards.name as ward_name');
                if ($request->ward_name != null) {
                   $data['pending_applican_info']=$correction->where('correction_applications.ward_id', $request->ward_name)->get();
                } else {
                $data['pending_applican_info']=$correction->get();
                }
              }elseif(Auth::user()->user_type == "D"){
                $correction = DB::table('correction_applications')
                                                ->join('wards','wards.id','=','correction_applications.ward_id')
                                          			->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                                ->orderBy('correction_applications.id','desc')
                                                ->where('correction_applications.ward_id',Auth::user()->ward_id)
    										                        ->whereBetween('correction_applications.created_at', [$request->get('date1'), $request->get('date2')])
                                                ->select('correction_applications.*','wards.name as ward_name');
                if ($request->ward_name != null) {
                   $data['pending_applican_info']=$correction->where('correction_applications.ward_id', $request->ward_name)->get();
             		} else {
             		$data['pending_applican_info']=$correction->get();
             		}
                                                // dd($data['pending_applican_info']);

              }elseif (Auth::user()->user_type == "A") {
                $correction = DB::table('correction_applications')
                                                ->join('wards','wards.id','=','correction_applications.ward_id')
                                          			->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                                ->orderBy('correction_applications.id','desc')
                                                ->where('correction_approvals.councillor','1')
    										                        ->whereBetween('correction_applications.created_at', [$request->get('date1'), $request->get('date2')])
                                                ->select('correction_applications.*','wards.name as ward_name');
                if ($request->ward_name != null) {
                   $data['pending_applican_info']=$correction->where('correction_applications.ward_id', $request->ward_name)->get();
             		} else {
             		$data['pending_applican_info']=$correction->get();
             		}

              }elseif (Auth::user()->user_type == "O") {
                $correction = DB::table('correction_applications')
                                                ->join('wards','wards.id','=','correction_applications.ward_id')
                                          			->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                                ->orderBy('correction_applications.id','desc')
                                                ->where('correction_approvals.accountant','1')
    										                        ->whereBetween('correction_applications.created_at', [$request->get('date1'), $request->get('date2')])
                                                ->select('correction_applications.*','wards.name as ward_name');
                  if ($request->ward_name != null) {
                     $data['pending_applican_info']=$correction->where('correction_applications.ward_id', $request->ward_name)->get();
               		} else {
               		$data['pending_applican_info']=$correction->get();
                }
            }elseif (Auth::user()->user_type == "OP") {
              $correction = DB::table('correction_applications')
                                              ->join('wards','wards.id','=','correction_applications.ward_id')
                                              ->join('correction_approvals','correction_approvals.correction_id','=','correction_applications.id')
                                              ->orderBy('correction_applications.id','desc')
                                              ->where('correction_approvals.officer','1')
                                              ->whereBetween('correction_applications.created_at', [$request->get('date1'), $request->get('date2')])
                                              ->select('correction_applications.*','wards.name as ward_name');
                if ($request->ward_name != null) {
                   $data['pending_applican_info']=$correction->where('correction_applications.ward_id', $request->ward_name)->get();
                } else {
                $data['pending_applican_info']=$correction->get();
              }
              }
              // dd($data);
              return view("reports.correction", $data);
          }
    public function application_report(){

      $data['date1'] = null;
      $data['date2'] =null;
      $data['wards']= DB::table('wards')->get();
          if (Auth::user()->user_type == "C") {
              $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
          } elseif (Auth::user()->user_type == "D") {
            $data['pending_applican_info'] = DB::table('applican_informations')
                                            ->join('wards','wards.id','=','applican_informations.ward_name')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
      																			->where('applican_informations.ward_name',Auth::user()->ward_id)
										                        ->whereDate('created_at', DB::raw('CURDATE()'))
                                            ->select('applican_informations.*','approvals.*','wards.name as ward_name')
                                            ->get();
          } elseif (Auth::user()->user_type == "S") {
            $data['pending_applican_info'] = DB::table('applican_informations')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
                                            ->get();

          }elseif (Auth::user()->user_type == "A") {
            $data['pending_applican_info'] = DB::table('applican_informations')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
                                            ->where('approvals.councillor','1')
                                            ->where('approvals.accountant','0')
                                            ->get();

          }elseif (Auth::user()->user_type == "O") {
            $data['pending_applican_info'] = DB::table('applican_informations')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
                                            ->where('approvals.accountant','1')
                                            ->where('approvals.officer','0')
                                            ->get();

          }elseif (Auth::user()->user_type == "OP") {
            $data['pending_applican_info'] = DB::table('applican_informations')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
                                            ->where('approvals.officer','1')
                                            ->where('approvals.operator','0')
                                            ->get();
          } else {
              $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
              $data['data'] = Bookings::whereIn('vehicle_id', $vehicle_ids)->orderBy('id', 'desc')->get();
          }


          $data['types'] = IncCats::get();
              return view("reports.application", $data);
    }
    public function application_report_post(Request $request){

      $data['date1'] = $request->date1;
      $data['date2'] = $request->date2;
      $data['wards']= DB::table('wards')->get();
          if (Auth::user()->user_type == "C") {
              $data['data'] = Bookings::where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
          } elseif (Auth::user()->user_type == "D") {
            $application_data = DB::table('applican_informations')
                                            ->join('wards','wards.id','=','applican_informations.ward_name')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
      																			->where('applican_informations.ward_name',Auth::user()->ward_id)
										                        ->whereBetween('applican_informations.created_at', [$request->get('date1'), $request->get('date2')])
                                            ->select('applican_informations.*','approvals.*','wards.name as ward_name');

           if ($request->ward_name != null) {
              $data['pending_applican_info']=$application_data->where('applican_informations.ward_name', $request->ward_name)->get();
        		} else {
        		$data['pending_applican_info']=$application_data->get();
        		}
          } elseif (Auth::user()->user_type == "S") {
            $application_data = DB::table('applican_informations')
                                            ->join('wards','wards.id','=','applican_informations.ward_name')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
										                        ->whereBetween('applican_informations.created_at', [$request->get('date1'), $request->get('date2')])
                                            ->select('applican_informations.*','approvals.*','wards.name as ward_name');

           if ($request->ward_name != null) {
              $data['pending_applican_info']=$application_data->where('applican_informations.ward_name', $request->ward_name)->get();
        		} else {
        		$data['pending_applican_info']=$application_data->get();
        		}

          }elseif (Auth::user()->user_type == "A") {
            $application_data = DB::table('applican_informations')
                                            ->join('wards','wards.id','=','applican_informations.ward_name')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
                                            ->where('approvals.councillor','1')
                                            ->whereBetween('applican_informations.created_at', [$request->get('date1'), $request->get('date2')])
                                            ->select('applican_informations.*','approvals.*','wards.name as ward_name');

           if ($request->ward_name != null) {
              $data['pending_applican_info']=$application_data->where('applican_informations.ward_name', $request->ward_name)->get();
            } else {
            $data['pending_applican_info']=$application_data->get();
          }

          }elseif (Auth::user()->user_type == "O") {
            $application_data = DB::table('applican_informations')
                                            ->join('wards','wards.id','=','applican_informations.ward_name')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
                                            ->where('approvals.accountant','1')
                                            ->whereBetween('applican_informations.created_at', [$request->get('date1'), $request->get('date2')])
                                            ->select('applican_informations.*','approvals.*','wards.name as ward_name');

           if ($request->ward_name != null) {
              $data['pending_applican_info']=$application_data->where('applican_informations.ward_name', $request->ward_name)->get();
            } else {
            $data['pending_applican_info']=$application_data->get();
          }

          }elseif (Auth::user()->user_type == "OP") {
            $application_data = DB::table('applican_informations')
                                            ->join('wards','wards.id','=','applican_informations.ward_name')
                                            ->join('approvals','approvals.applicant_id','=','applican_informations.id')
                                            ->orderBy('applican_informations.id','desc')
                                            ->where('approvals.officer','1')
                                            ->whereBetween('applican_informations.created_at', [$request->get('date1'), $request->get('date2')])
                                            ->select('applican_informations.*','approvals.*','wards.name as ward_name');

           if ($request->ward_name != null) {
              $data['pending_applican_info']=$application_data->where('applican_informations.ward_name', $request->ward_name)->get();
            } else {
            $data['pending_applican_info']=$application_data->get();
          }
          } else {
              $vehicle_ids = VehicleModel::where('group_id', Auth::user()->group_id)->pluck('id')->toArray();
              $data['data'] = Bookings::whereIn('vehicle_id', $vehicle_ids)->orderBy('id', 'desc')->get();
          }


          $data['types'] = IncCats::get();
              return view("reports.application", $data);
    }
}
