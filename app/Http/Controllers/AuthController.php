<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function index(Request $request)
    {

        return view('login');
    }


    public function forgot_password(Request $request)
    {

        return view('forgot_password');
    }

    public function register(Request $request)
    {

        return view('register');
    }

    public function register_post(Request $request)
    {
        //dd($request->all());
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Register successfully');
    }

    public function checkemail(Request $request)
    {
        $email = $request->input('email');
        $isExists = User::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

            if (Auth::User()->is_role == 1) {
                return redirect()->intended('admin/dashboard');
            } else if (Auth::user()->is_role == '0'){
                return redirect()->intended('employee/dashboard');
            }
            else{
                return redirect('/')->with('error', 'You are not admin');
            }
        }else{
            return redirect('/')->with('error', 'Please enter again');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
}
