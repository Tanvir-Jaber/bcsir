@extends('layouts.skeleton')
@section('title', 'QR CODE Create')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">QR CODE<span class="font-weight-normal text-muted ms-2"></span></div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h4 class="card-title">Add New QR CODE</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('qr.store') }}" method="POST">
                                @csrf
                                <div class="">
                                    @if (auth()->user()->user_type != 3)
                                    <div class="form-group">
                                        <label for="" class="form-label">Department</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-edit" aria-hidden="true"></i>
                                                </a>
                                                {{ Form::select('department_id',$departments,null,['class' => 'form-control','required','placeholder' => 'Select your department']) }}
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="" class="form-label">Derparment</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-slash" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control"  value="{{auth()->user()->department->title}}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="" class="form-label">Title</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-slash" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Qr Code Title"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-none">
                                        <label for="" class="form-label">Name</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-user" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Qr Code Name"
                                                    xrequired>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Reference Number</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-target" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="ref_no" placeholder="Enter Qr Code Reference number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Entry Date</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-target" aria-hidden="true"></i>
                                                </a>
                                                <input type="date" class="form-control" name="issue_date" placeholder="Enter Entry Date" max="{{date('Y-m-d')}}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-none">
                                        <label for="" class="form-label">Header</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-target" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="header" placeholder="Enter Qr Code Header"
                                                    xrequired>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group d-none">
                                        <label for="" class="form-label">Description</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-book-open" aria-hidden="true"></i>
                                                </a>
                                                
                                                <textarea style="resize: none" placeholder="Enter Qr Code Description" class="form-control" name="description" cols="10" rows="5" xrequired></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-none">
                                        <label for="" class="form-label">Footer</label>
                                        <div class="input-group" >
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-wind" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="footer" placeholder="Enter Qr Code Footer"
                                                    xrequired>
                                            </div>
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

