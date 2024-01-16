@extends('layouts.skeleton')
@section('title', 'Home')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Admin<span class="font-weight-normal text-muted ms-2">Dashboard</span></div>
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
            <div class="row">
                {{-- <div class="col-xl-4 col-lg-6 col-md-6">
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
                </div> --}}
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="mt-0 text-start"> <span class="font-weight-semibold">Total User</span>
                                        <h3 class="mb-0 mt-1 text-secondary mb-2">{{ count($data)}}</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="icon1 bg-secondary my-auto  float-end"> <i
                                            class="las la-city"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-4 col-lg-6 col-md-6">
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
                </div> --}}
            </div>
            <!-- End Row-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom-0">
                            <h3 class="card-title">User List</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover card-table table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($data as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->department->title ?? null }}</td>
                                                <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <a href="{{ route('staff.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                    <a onclick="deleteConfirm({!! $item->id !!},'{{ route('staff.destroy', $item->id) }}')"
                                                        class="btn btn-danger btn-sm">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                            class="fa fa-trash"></i>
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
    </div>


@endsection
