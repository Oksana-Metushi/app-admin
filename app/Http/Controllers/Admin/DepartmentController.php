<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the Departments.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $departments = Department::query()
            ->filter($request->get('name'))
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.departments.index', ['departments' => $departments]);
    }

    /**
     * Display the specified Department.
     *
     * @param Department $department
     * @return View
     */
    public function show($id): View
    {
        $department = Department::with('employees')->find($id);
        return view('admin.departments.show')->with('employees', $department->employees);
    }

    /**
     * Show the form for creating a Department.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.departments.add');
    }

    /**
     * Create a new Department.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $user = new Department;
        $user->name = $request['name'];
        $user->save();

        return redirect()->route('admin.departments.index')->with('success', 'Department added');
    }

    /**
     * Show the form for editing the specified Department.
     *
     * @param Department $department
     * @return View
     */
    public function edit(Department $department): View
    {
        return view('admin.departments.edit', ['department' => $department]);
    }

    /**
     * Update the specified Department.
     *
     * @param Department $department
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Department $department, Request $request): RedirectResponse
    {
        $department->name = $request['name'];
        $department->save();

        return redirect()->route('admin.departments.index')->with('success', 'Department updated');
    }

    /**
     * Remove the specified Department.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();

        return redirect()->route('admin.departments.index')->with('error', 'Department deleted');
    }
}
