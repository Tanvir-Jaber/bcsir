
@extends('layouts.skeleton')
@section('title', 'QR CODE Edit')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Edit<span class="font-weight-normal text-muted ms-2">QR CODE</span></div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h4 class="card-title">Edit QR CODE</h4>
                        </div>
                        <div class="card-body">
                            
                            <form action="{{ route('qr.update',$data->id) }}" method="POST">
                                @method('PUT')
                                <div class="">
                                    <div class="form-group">
                                        <label for="" class="form-label">Title</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group">
                                                <a class="input-group-text">
                                                    <i class="fe fe-slash" aria-hidden="true"></i>
                                                </a>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Qr Code Title" value="{{ $data->title }}"
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
                                                <input type="text" class="form-control" name="name" placeholder="Enter Qr Code Name" value="{{ $data->name }}"
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
                                                <input type="text" class="form-control" name="ref_no" value="{{ $data->ref_no }}" placeholder="Enter Qr Code Reference Number"
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
                                                <input type="date" class="form-control" name="issue_date" placeholder="Enter Entry Date" max="{{date('Y-m-d')}}" value="{{ $data->issue_date ? date('Y-m-d',strtotime($data->issue_date)) : null }}"
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
                                                <input type="text" class="form-control" name="header" placeholder="Enter Qr Code Header" value="{{ $data->header }}"
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
                                                
                                                <textarea style="resize: none" placeholder="Enter Qr Code Description" class="form-control" name="description" cols="10" rows="5" xrequired>{{ $data->description }}</textarea>
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
                                                <input type="text" class="form-control" name="footer" placeholder="Enter Qr Code Footer" value="{{ $data->footer }}"
                                                    xrequired>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 mb-0">Update</button>
                                <a href="{{ route('qr.index') }}" class="btn btn-danger mt-4 mb-0">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

