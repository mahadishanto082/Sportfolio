@extends('layouts.admin')

@section('title')
    Main Page
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-paper tx-28"></i>
    <div>
        <h4>Main Page</h4>
        <p class="mg-b-0">Manage main page sections</p>
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
                                <th>Page Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $pages = [
                                    ['name' => 'About', 'data' => $about, 'route' => 'admin.about.edit'],
                                    ['name' => 'Services', 'data' => $services, 'route' => 'admin.services.edit'],
                                    ['name' => 'Portfolio', 'data' => $portfolio, 'route' => 'admin.portfolio.edit'],
                                ];
                            @endphp

                            @foreach($pages as $index => $page)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $page['name'] }}</td>
                                    <td>
                                        @if($page['data']->count() > 0)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-outline-info dropdown-toggle" 
                                               href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>
                                            <div class="dropdown-menu">
                                                @if($page['data']->count() > 0)
                                                    <a class="dropdown-item" href="{{ route($page['route'], $page['data']->first()->id) }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route(str_replace('edit', 'create', $page['route'])) }}">
                                                        <i class="fa fa-plus"></i> Create
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
