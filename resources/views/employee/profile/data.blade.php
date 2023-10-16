@extends('admin.layouts.app')

@section('title', 'My Profile')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Profile </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Profile</a></li>
                            <li class="breadcrumb-item active">My Profile</li>
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
                                <h3 class="card-title">My Profile</h3>
                            </div>

                            <form class="form-horizontal" method="post"
                                action="{{ url('employee/profile/update') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">First Name <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->name }}" name="name"
                                                class="form-control" required placeholder="Enter First Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Last Name <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->last_name }}" name="last_name"
                                                class="form-control" required placeholder="Enter Last Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Email <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ $getRecord->email }}" name="email"
                                                class="form-control" required placeholder="Enter Email">
                                        </div>
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Phone Number <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->phone }}" name="phone"
                                                class="form-control" required placeholder="Enter Phone Number">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Profile Image<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <div class="">
                                                @if (!empty($getRecord->image))
                                                    @if (file_exists('uploads/' . $getRecord->image))
                                                        <img src="{{ url('uploads/' . $getRecord->image) }}" alt="image"
                                                            style="height: 80; width: 80px;">
                                                    @endif
                                                @endif
                                            </div>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Hire Date <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ $getRecord->hire_date }}" name="hire_date"
                                                class="form-control" required placeholder="Enter Hire Date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job Position <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->job }}" name="job"
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
                                                    <option {{ $value->id == $getRecord->department_id ? 'selected' : '' }}
                                                        value="{{ $value->id }}">{{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
