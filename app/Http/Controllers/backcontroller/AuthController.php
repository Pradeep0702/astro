<?php
namespace App\Http\Controllers\backcontroller;
use App\Http\Controllers\Controller;
use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendotp;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller {
    
    public function index() {
        return view('admin/index');
    }
    public function emailauth(Request $request) {
        if ($request->ajax()) {
            $validate = validator::make($request->all(), ['email' => 'required | email', ]);
            if ($validate->fails()) {
                return response()->json(['code' => '400', 'errors' => $validate->errors() ]);
            } else {
                $count = AuthModel::where('email', $request->email)->count();
                if ($count == 1) {
                    $otp = genrateotp();
                    $user_data = AuthModel::select('name', 'otp', 'email')->where('email', $request->email)->first();
                    $mail = Mail::to($user_data->email)->send(new Sendotp($user_data->name, $otp));
                    if ($mail) {
                        AuthModel::where('email', $request->email)->update(['otp' => $otp]);
                    }
                    session()->put('otp', 1);
                    session()->put('email', $user_data->email);
                    session()->flash('type', 'success');
                    session()->flash('message', 'Sucessfully OTP Send Check Your Email');
                    return response()->json(['code' => '200', ]);
                } else {
                    return response()->json(['code' => '404', 'message' => 'Invalid Email Address', ]);
                }
            }
        }
    }
    public function otpverify(Request $request) {
        if ($request->ajax()) {
            $validate = validator::make($request->all(), ['otp' => 'required | numeric | digits:6', ]);
            if ($validate->fails()) {
                return response()->json(['code' => '400', 'errors' => $validate->errors() ]);
            } else {
                $user_data = AuthModel::where('email', $request->re_email)->where('otp', $request->otp)->first();
                if ($user_data) {
                    Auth::guard('admin_login')->login($user_data);
                    session()->flash('type', 'success');
                    session()->flash('message', 'Sucessfully logged in');
                    AuthModel::where('email', '=', $user_data->email)->update(['otp' => '']);
                    return response()->json(['code' => '200', 'status' => true, ]);
                } else {
                    return response()->json(['code' => 404, 'message' => 'Invalid OTP', ]);
                }
            }
        }
    }
    public function logout() {
        Auth::guard('admin_login')->logout();
        session()->flash('type', 'success');
        session()->flash('message', 'Sucessfully Logout');
        return redirect()->route('back.auth');
    }
}