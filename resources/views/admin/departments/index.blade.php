@extends('admin.layouts.app')

@section('title', 'Departments')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Departments</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">List</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Department</h3>
                            </div>

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Department Name</label>
                                            <input type="text" name="name"
                                                value="{{ Request()->name }}" class="form-control"
                                                placeholder="Department Name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ route('admin.departments.index') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3>Departments List</h3>
                                <div><a href="{{ route('admin.departments.create') }}" class="btn btn-primary float-right">Add Departments</a></div>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($departments as $department)
                                            <tr>
                                                <td>{{ $department->id }}</td>
                                                <td>{{ $department->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.departments.show', $department->id) }}"
                                                       class="btn btn-info">View</a>
                                                    <a href="{{ route('admin.departments.edit', $department->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit"
                                                                onclick="return confirm('Are you sure you want to delete?')"
                                                                class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No record found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div style="padding: 10px; float:right;">
                                    {!! $departments->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
