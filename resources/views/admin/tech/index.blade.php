@extends('layouts.admin')

@section('title')
    Technology | List
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-photos-outline"></i>
        <div>
            <h4>Technologies</h4>
            <p class="mg-b-0">List of all technologies</p>
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
                                <th>Description</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($techs as $tech)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tech->name }}</td>
                                    <td>{{ $tech->description }}</td>
                                    <td>
                                        @if($tech->logo_image)
                                            <img src="{{ asset('storage/' . $tech->logo_image) }}" 
                                                 alt="{{ $tech->name }}" width="50" height="50">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($tech->status === 'Active')
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
                                                <a class="dropdown-item" href="{{ route('admin.tech.edit', $tech->id) }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a onclick="deleteRow('{{ route('admin.tech.destroy', $tech->id) }}')" class="dropdown-item" href="javascript:void(0)">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No technologies found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination can be added here --}}
            </div>
        </div>
    </div>
</div>
@endsection
