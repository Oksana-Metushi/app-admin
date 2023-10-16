@extends('admin.layouts.app')

@section('title', 'Employees')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Employees</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Employees</h3>
                            </div>

                            <form class="form-horizontal" method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">First Name <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('name') }}" name="name"
                                                class="form-control" required placeholder="Enter First Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Last Name <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('last_name') }}" name="last_name"
                                                class="form-control" required placeholder="Enter Last Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Email <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ old('email') }}" name="email"
                                                class="form-control" required placeholder="Enter Email">
                                        </div>
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Password<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="password" value="" name="password" class="form-control"
                                                required placeholder="Enter Password">
                                        </div>
                                        <span style="color: red">{{ $errors->first('password') }}</span>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Phone Number <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('phone') }}" name="phone"
                                                class="form-control" required placeholder="Enter Phone Number">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Profile Image<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Hire Date <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ old('hire_date') }}" name="hire_date"
                                                class="form-control" required placeholder="Enter Hire Date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job Position <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('job') }}" name="job"
                                                class="form-control" required placeholder="Enter Job Position">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Department <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="department_id" class="form-control" required>
                                                <option value=""> -- Select Department -- </option>
                                                @foreach ($getDepartment as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <a href="{{ route('admin.employees.index') }}" class="btn btn-default float-right">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
