@extends('layouts.admin')

@section('title')
    Packages | List
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Packages</h4>
            <p class="mg-b-0">List of all Packages</p>
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
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Features</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $package->name ?? 'N/A' }}</td>
                                        <td>{{ $package->price ? '$'.number_format($package->price, 2) : 'N/A' }}</td>
                                        <td>{{ $package->duration ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($package->features, 50) }}</td>
                                        <td>
                                            @if($package->status === 'Active')
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
                                                    <a class="dropdown-item" href="{{ route('admin.packages.edit', $package->id) }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a onclick="deleteRow('{{ route('admin.packages.destroy', $package->id) }}')" class="dropdown-item" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Packages found</td>
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
