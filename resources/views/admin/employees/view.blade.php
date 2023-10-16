@extends('admin.layouts.app')

@section('title', 'Employees')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Employees</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
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
                                <h3 class="card-title">View Employees</h3>
                            </div>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">First Name <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Last Name <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->last_name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Email<span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->email }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Phone<span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->phone }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Profile photo<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            @if (!empty($getRecord->image))
                                                @if (file_exists('uploads/' . $getRecord->image))
                                                    <img src="{{ url('uploads/' . $getRecord->image) }}" alt="image"
                                                        style="height: 80; width: 80px;">
                                                @endif
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Hire date<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y', strtotime($getRecord->hire_date)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job<span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->job }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Department<span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->get_department_single->name)
                                                ? $getRecord->get_department_single->name
                                                : '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('admin.employees.index') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
