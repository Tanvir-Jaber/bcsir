@extends('layouts.skeleton')
@section('title', 'Home')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Edit<span class="font-weight-normal text-muted ms-2">Department</span></div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h4 class="card-title">Edit Department</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('department.update',$department->id) }}" method="POST">
                                @method('PUT')
                                <div class="">
                                    <div class="form-group">
                                        <label for="" class="form-label">Department Name</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Department Name" value="{{ $department->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Department Code</label>
                                        <input type="text" class="form-control" name="code" placeholder="Enter Department Code" value="{{ $department->code }}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 mb-0">Update</button>
                                <a href="{{ route('department.index') }}" class="btn btn-danger mt-4 mb-0">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
