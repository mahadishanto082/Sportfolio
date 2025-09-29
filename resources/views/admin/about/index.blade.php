@extends('layouts.admin')

@section('title')
    About Us | List
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>About Us</h4>
            <p class="mg-b-0">List of all About Us entries</p>
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
                                    <th>Image</th>
                                    <th>Logo</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Description</th>
                                    <th>Semi Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($abouts as $about)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($about->image)
                                                <img src="{{ asset('storage/' . $about->image) }}" alt="Image" width="50" height="50">
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($about->logo_image)
                                                <img src="{{ asset('storage/' . $about->logo_image) }}" alt="Logo" width="50" height="50">
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->sub_title }}</td>
                                        <td>{{ Str::limit($about->description, 50) }}</td>
                                        <td>{{ Str::limit($about->semi_description, 50) }}</td>
                                        <td>
                                            @if($about->status === 'Active')
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
                                                    <a class="dropdown-item" href="{{ route('admin.about.edit', $about->id) }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a onclick="deleteRow('{{ route('admin.about.destroy', $about->id) }}')" class="dropdown-item" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No About Us entries found</td>
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
