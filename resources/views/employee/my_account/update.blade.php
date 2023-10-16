@extends('admin.layouts.app')

@section('title', 'My Account')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Account</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Settings</h3>
                            </div>

                            <form class="form-horizontal" method="post" action="{{ url('employee/my_account/update') }}"
                                enctype="multipart/form-data">

                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Name <span style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->name }}" name="name"
                                                class="form-control" required placeholder="Enter Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Email <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ $getRecord->email }}" name="email"
                                                class="form-control" required placeholder="Enter Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Profile Image <span
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
                                        <label class="col-sm-2 col-form-lable">Password <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password" class="form-control"
                                                placeholder="Enter Password">
                                            (Leave blank if you are not changing password!)
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('employee/my_account') }}" class="btn btn-default">Cancel</a>
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
