<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    public function profile_data(Request $request)
    {
        $data['getDepartment'] = Department::get();
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('employee.profile.data', $data);
    }


    public function data_update(Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        $user->hire_date = trim($request->hire_date);
        $user->job = trim($request->job);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0;

        if (!empty($request->file('image'))){
            if(!empty($user->image) && file_exists('upload/'.$user->image)){
                unlink('upload/'.$user->image);
            }
            $file = $request->file('image');
            $randomStr = Str::random(30);
            $filename = $randomStr. '.' .$file->getClientOriginalExtension();
            $file->move('uploads/',$filename);
            $user->image = $filename;
        }

        $user->save();

        return redirect('employee/profile')->with('success', 'My account updated');
    }
}
