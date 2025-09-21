@extends('layouts.admin')

@section('title')
    Title page content | List
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Title page Contents</h4>
            <p class="mg-b-0">List of title page contents</p>
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
                                    <th>Logo</th>
                                    <th>Background Image</th>
                                    <th>Short title</th>
                                    <th>Content</th>
                                    <th>Caption</th>
                                    <th>Emergency Contact</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($titlePages as $key => $titlePage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($titlePage->image)
                                                <img width="50" src="{{ asset('storage/' . $titlePage->image) }}">
                                            @endif
                                        </td>
                                        <td>
                                            @if($titlePage->bg_image)
                                                <img width="50" src="{{ asset('storage/' . $titlePage->bg_image) }}">
                                            @endif
                                        </td>
                                        <td>{{ $titlePage->short_title }}</td>
                                        <td>{{ $titlePage->content }}</td>
                                        <td>{{ $titlePage->caption }}</td>
                                        <td>{{ $titlePage->emergency_contact }}</td>
                                        <td>{{ $titlePage->status }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-outline-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.title-page.edit', $titlePage->id) }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a onclick="deleteRow('{{ route('admin.title-page.destroy', $titlePage->id) }}')" class="dropdown-item" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No data found</td>
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
