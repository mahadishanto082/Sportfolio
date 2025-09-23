@extends('layouts.admin')

@section('title')
    Header Content | List
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Header Contents</h4>
            <p class="mg-b-0">List of Header contents</p>
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
                                    <th>Button Names</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($headercontents->count())
                                    @foreach($headercontents as $key => $headercontent)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            {{-- Logo --}}
                                            <td>
                                                @if($headercontent->logo)
                                                    <img width="50" src="{{ asset('storage/' . $headercontent->logo) }}">
                                                @else
                                                    --
                                                @endif
                                            </td>

                                            {{-- Button Names (stored as array/json) --}}
                                            <td>
                                                @php
                                                    $buttons = is_array($headercontent->button_names) 
                                                        ? $headercontent->button_names 
                                                        : (json_decode($headercontent->button_names, true) ?? []);
                                                @endphp
                                                @if(!empty($buttons))
                                                    {{ implode(', ', $buttons) }}
                                                @else
                                                    --
                                                @endif
                                            </td>

                                            {{-- Status --}}
                                            <td>{{ $headercontent->status }}</td>

                                            {{-- Action --}}
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-outline-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('admin.header-content.edit', $headercontent->id) }}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <a onclick="deleteRow('{{ route('admin.header-content.destroy', $headercontent->id) }}')" class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No data found</td>
                                    </tr>
                                @endif
                            </tbody>

                            @if($headercontents->hasPages())
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            {{ $headercontents->links('admin.shared._paginate') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
