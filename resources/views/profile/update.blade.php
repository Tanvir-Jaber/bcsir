@extends('layouts.skeleton')
@section('title', 'Update Profile')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Update<span class="font-weight-normal text-muted ms-2">Profile</span></div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h4 class="card-title">Edit Your Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update',auth()->user()->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="">
                                    @if (auth()->user()->user_type == 3)
                                    <div class="form-group">
                                        <label for="" class="form-label">Department</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-edit" aria-hidden="true"></i>
                                                </a>
                                                {{-- <select name="department_id" class="form-control" id="" required></select> --}}

                                                {{ Form::select('department_id',$departments,$data->department_id,['class' => 'form-control','required','placeholder' => 'Select your department']) }}
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
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
                                                <input type="email" class="form-control" name="email" placeholder="Enter your E-mail Address" value="{{ $data->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Gender</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-edit" aria-hidden="true"></i>
                                                </a>
                                                {{ Form::select('gender',App\Models\User::GENDER,$data->gender,['class' => 'form-control','required','placeholder' => 'Select your Gender']) }}
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Address</label>
                                        <textarea class="form-control" name="address" placeholder="Enter your Address">{{$data->address}}</textarea>
                                    </div>
                                    
                                </div>
                                <button class="btn btn-primary mt-4 mb-0">Update</button>
                            </form>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h4 class="card-title">Update Your Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.change_password') }}" method="POST">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="" class="form-label">Old Password</label>
                                        <div class="input-group" id="Password-toggle1">
                                            <a href="" class="input-group-text">
                                                <i class="fe fe-eye-off" aria-hidden="true"></i>
                                            </a>
                                            <input class="form-control" type="password" name="old_password"
                                                placeholder="Old Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">New Password</label>
                                        <div class="input-group" id="Password-toggle">
                                            <a href="" class="input-group-text">
                                                <i class="fe fe-eye-off" aria-hidden="true"></i>
                                            </a>
                                            <input class="form-control" type="password" name="password"
                                                placeholder="New Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Confirm Password</label>
                                        <div class="input-group" id="Password-toggle2">
                                            <a href="" class="input-group-text">
                                                <i class="fe fe-eye-off" aria-hidden="true"></i>
                                            </a>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-4 mb-0">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
