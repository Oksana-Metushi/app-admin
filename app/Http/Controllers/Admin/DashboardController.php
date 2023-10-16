<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @param Request $request
     * @return View
     */
    public function dashboard(Request $request): View
    {
        if (Auth::user()->is_role) {
            return view('admin.dashboard.list');
        }

        return view('employee.dashboard.list');
    }
}
