@extends('layouts.skeleton')
@section('title', 'Admin Create')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Add<span class="font-weight-normal text-muted ms-2">Admin</span></div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h4 class="card-title">Add New Admin</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.store') }}" method="POST">
                                @csrf
                                <div class="">
                                    {{-- <div class="form-group">
                                        <label for="" class="form-label">Department</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-edit" aria-hidden="true"></i>
                                                </a>

                                                {{ Form::select('department_id',[],null,['class' => 'form-control','required','placeholder' => 'Select your department']) }}
                                                
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="" class="form-label">First Name</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-user" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name"
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
                                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name"
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
                                                <input type="email" class="form-control" name="email" placeholder="Enter your E-mail Address"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Password</label>
                                        <div class="input-group" id="Password-toggle">
                                            <a href="" class="input-group-text">
                                                <i class="fe fe-eye-off" aria-hidden="true"></i>
                                            </a>
                                            <input class="form-control" type="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-4 mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
