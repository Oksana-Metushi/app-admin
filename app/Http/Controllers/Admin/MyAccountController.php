<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MyAccountController extends Controller
{
    /**
     * Show the form for update of Account.
     *
     * @return View
     */
    public function edit(): View
    {
        $data['getRecord'] = Auth::user();
        return view('admin.my_account.update', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        request()->validate([
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = trim($request->password);
        }

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

        return redirect()->route('admin.account.edit')->with('success', 'My account updated');
    }

    public function employee_my_account(Request $request)
    {
        $data['getRecord'] = Auth::user();
        return view('employee.my_account.update', $data);
    }

    public function employee_my_account_update(Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if (!empty($request->password)) {
            $user->password = trim($request->password);
        }

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

        return redirect('employee/my_account')->with('success', 'My account updated');
    }
}
