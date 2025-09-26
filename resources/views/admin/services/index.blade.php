@extends('layouts.admin')

@section('title')
    Services | List
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Services</h4>
            <p class="mg-b-0">List of all services</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
            <div class="card">
                <div class="card-body">
                    <div class="bd bd-gray-300 rounded table-responsive">
                        <table class="table my-table table-hover mg-b-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $key => $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>
                                        <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}" width="50" height="50">

                                        </td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Str::limit($service->description, 50) }}</td>
                                        <td>
                                            @if($service->status === 'Active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-outline-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.services.edit', $service->id) }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a onclick="deleteRow('{{ route('admin.services.destroy', $service->id) }}')" class="dropdown-item" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No services found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
