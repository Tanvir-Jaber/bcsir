@extends('layouts.skeleton')
@section('title', 'Admin List')
@section('content')
    <div class="app-content main-content">
        <div class="side-app main-container">
            <div class="page-header d-xl-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Admin List</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
                        {{-- <div class="btn-list">
                            <a href="{{ url()->previous() }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Go Back </a>
                        </div> --}}
                    </div>
                </div>
            </div>



            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">SL</th>
                                            <th class="wd-15p border-bottom-0">Name</th>
                                            <th class="wd-15p border-bottom-0">Email</th>
                                            <th class="wd-15p border-bottom-0">Status</th>
                                            <th class="wd-15p border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                    <a onclick="deleteConfirm({!! $item->id !!},'{{ route('admin.destroy', $item->id) }}')"
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
