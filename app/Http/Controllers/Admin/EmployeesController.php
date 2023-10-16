<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        return view('admin.employees.list', $data);
    }

    public function create(Request $request)
    {
        $data['getDepartment'] = Department::get();
        return view('admin.employees.add', $data);
    }

    public function store(Request $request)
    {
        $user = request()->validate([
            'name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'hire_date' => 'required',
            'job' => 'required',
            'department_id' => 'required',
        ]);

        $user = new user;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        $user->hire_date = trim($request->hire_date);
        $user->job = trim($request->job);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0;
        $user->password = Hash::make($request->password);

        if(!empty($request->file('image'))){
            $file = $request->file('image');
            $randomStr = Str::random(30);
            $filename = $randomStr. '.' .$file->getClientOriginalExtension();
            $file->move('uploads/',$filename);
            $user->image = $filename;
        }
        $user->save();

        return redirect()->route('admin.employees.index')->with('success', 'Employee added');
    }

    public function show($id)
    {
        $data['getRecord'] = User::find($id);
        return view('admin.employees.view', $data);
    }

    public function edit($id)
    {
        $data['getDepartment'] = Department::get();
        $data['getRecord'] = User::find($id);
        return view('admin.employees.edit', $data);
    }

    public function update($id, Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,'.$id
        ]);

        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        $user->hire_date = trim($request->hire_date);
        $user->job = trim($request->job);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0;

        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }

        if(!empty($request->file('image'))){
            if(!empty($user->image) && file_exists('uploads/'.$user->image)){
                unlink('uploads/'.$user->image);
            }
            $file = $request->file('image');
            $randomStr = Str::random(30);
            $filename = $randomStr. '.' .$file->getClientOriginalExtension();
            $file->move('uploads/',$filename);
            $user->image = $filename;
        }

        $user->save();

        return redirect()->route('admin.employees.index')->with('success', 'Employee updated');
    }

    public function destroy($id)
    {
        $recordDelete = User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Record deleted');
    }
}
