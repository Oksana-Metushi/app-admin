@extends('admin.layouts.app')

@section('title', 'Departments')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Departments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Departments</li>
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
                                <h3 class="card-title">Add Departments</h3>
                            </div>

                            <form class="form-horizontal" method="post" action="{{ route('admin.departments.update', $department->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Name <span
                                                style="color:red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $department->name }}" name="name" class="form-control" required
                                                placeholder="Enter Department Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('admin.departments.index') }}" class="btn btn-default">Cancel</a>
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
