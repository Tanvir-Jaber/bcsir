@extends('layouts.skeleton')
@section('title', 'Home')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Dashboard<span class="font-weight-normal text-muted ms-2"></span></div>
                </div>
                {{-- <div class="page-rightheader ms-md-auto">
                <div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
                    <div class="btn-list">
                        <button  class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"> <i class="feather feather-mail"></i> </button>
                        <button  class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"> <i class="feather feather-phone-call"></i> </button>
                        <button  class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"> <i class="feather feather-info"></i> </button>
                    </div>
                </div>
            </div> --}}
            </div>
            <!--End Page header-->

            <!--Row-->
            {{-- <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mt-0 text-start"> <span class="font-weight-semibold">Total Admin</span>
                                        <h3 class="mb-0 mt-1 text-success mb-2">6,578</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon1 bg-success my-auto  float-end"> <i class="las la-city"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mt-0 text-start"> <span class="font-weight-semibold">Total Staff</span>
                                        <h3 class="mb-0 mt-1 text-secondary mb-2">$82,7853</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon1 bg-secondary my-auto  float-end"> <i
                                            class="las la-hand-holding-usd"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mt-0 text-start"> <span class="font-weight-semibold">Total Packages</span>
                                        <h3 class="mb-0 mt-1 text-danger mb-2">7</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon1 bg-danger my-auto  float-end"> <i class="las la-cubes"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- End Row-->

            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">QR CODE List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">SL</th>
                                            <th class="wd-15p border-bottom-0">Title</th>
                                            <th class="wd-15p border-bottom-0">Entry Date</th>
                                            <th class="wd-15p border-bottom-0">Reference No</th>
                                            <th class="wd-15p border-bottom-0">Generated By</th>
                                            {{-- <th class="wd-15p border-bottom-0">Footer</th> --}}
                                            {{-- <th class="wd-15p border-bottom-0">Department</th> --}}
                                            <th class="wd-15p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->issue_date ? \Carbon\Carbon::parse($item->issue_date)->format('Y-m-d') : null }}</td>
                                                <td>{{ $item->ref_no }}</td>
                                                <td>{{ $item->user->username }}</td>
                                                {{-- <td>{{ $item->department->title ?? null }}</td> --}}
                                                <td>
                                                    <a href="" data-id="{{$item->id}}" data-info = "{{$item->user->username}}" data-image="{{ asset($item->image) }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        class="btn btn-warning btn-sm preview-image">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Preview"
                                                            class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('qr.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                    @if (auth()->user()->user_type != 3)
                                                    <a onclick="deleteConfirm({!! $item->id !!},'{{ route('qr.destroy',$item->id) }}')"
                                                        class="btn btn-danger btn-sm">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                            class="fa fa-trash"></i>
                                                    </a>
                                                    @endif
                                                    <a href="{{ route('printable',$item->id)}}"
                                                        class="btn btn-success btn-sm" target="_blank">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Print"
                                                            class="fa fa-print"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No Data Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('staff.qr.preview')
    </div>


@endsection
@section('scripts')
<script>
    $(".preview-image").on('click',function(){
        $("#qr_image").attr('src',$(this).data('image'))
        $("#qr_info").text(`Generated By: ${$(this).data('info')} |  bcsir-ctg#${$(this).data('id')}`)
    })
</script>
    
@endsection
