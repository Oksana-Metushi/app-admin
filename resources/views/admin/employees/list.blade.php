@extends('admin.layouts.app')

@section('title', 'Employees')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">List</a></li>
                            <li class="breadcrumb-item active">Employees</li>
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
                                <h3 class="card-title">Search Employee</h3>
                            </div>

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>First Name</label>
                                            <input type="text" name="name" value="{{ Request()->name }}"
                                                class="form-control" placeholder="First Name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" value="{{ Request()->last_name }}"
                                                class="form-control" placeholder="Last Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ Request()->email }}"
                                                class="form-control" placeholder="Email">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ route('admin.employees.index') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header ">
                                <h3>Employees List</h3>
                                <div><a href="{{ route('admin.employees.create') }}" class="btn btn-primary float-right">Add Employees</a></div>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Profile Image</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->last_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>
                                                    @if (!empty($value->image))
                                                        @if (file_exists('uploads/' . $value->image))
                                                            <img src="{{ url('uploads/' . $value->image) }}" alt="image"
                                                                style="height: 80; width: 80px;">
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ !empty($value->get_department_single->name) ? $value->get_department_single->name : '' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.employees.show', $value->id) }}"
                                                        class="btn btn-info">View</a>
                                                    <a href="{{ route('admin.employees.edit', $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('admin.employees.destroy', $value->id) }}" method="POST">
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
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
