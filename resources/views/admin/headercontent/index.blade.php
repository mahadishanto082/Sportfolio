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
                                    <th>Buttons</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    @if($headerContents->count())
        @foreach($headerContents as $key => $headerContent)
            <tr>
                <td>{{ $loop->iteration }}</td>

                {{-- Logo --}}
                <td>
                    @if($headerContent->logo)
                        <img width="50" src="{{ asset('storage/' . $headerContent->logo) }}">
                    @else
                        --
                    @endif
                </td>

                {{-- Buttons --}}
                <td>
                    @php
                        $buttons = is_array($headerContent->buttons) 
                            ? $headerContent->buttons 
                            : (json_decode($headerContent->buttons, true) ?? []);
                    @endphp

                    @if(!empty($buttons))
                        <ul class="mb-0">
                            @foreach($buttons as $btn)
                                <li>
                                    <strong>{{ $btn['name'] ?? '' }}</strong>: 
                                    <a href="{{ $btn['link'] ?? '#' }}" target="_blank">
                                        {{ $btn['link'] ?? '' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        --
                    @endif
                </td>

                {{-- Status --}}
                <td>{{ $headerContent->status }}</td>

                {{-- Action --}}
                <td>
                    <div class="dropdown">
                        <a class="btn btn-sm btn-outline-info dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Action
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.header-content.edit', $headerContent->id) }}">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a onclick="deleteRow('{{ route('admin.header-content.destroy', $headerContent->id) }}')" class="dropdown-item" href="javascript:void(0)">
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


                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
