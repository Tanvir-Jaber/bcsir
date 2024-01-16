@extends('layouts.skeleton')
@section('title', 'Edit Admin')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Edit<span class="font-weight-normal text-muted ms-2">Admin</span></div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h4 class="card-title">Edit Admin</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update',$data->id) }}" method="POST">
                                @method('PUT')
                                <div class="">
                                    <div class="form-group">
                                        <label for="" class="form-label">First Name</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-user" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{ $data->first_name }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Last Name</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-user" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="{{ $data->last_name }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Email</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-mail" aria-hidden="true"></i>
                                                </a>
                                                <input type="email" class="form-control" placeholder="Enter your E-mail Address" value="{{ $data->email }}" readonly
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 mb-0">Update</button>
                                <a href="{{ route('admin.index') }}" class="btn btn-danger mt-4 mb-0">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
