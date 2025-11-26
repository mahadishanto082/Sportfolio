@extends('layouts.admin')
@section('title')
    Main Page 
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-paper tx-28"></i>
    <div>
        <h4>Main Page</h4>
        <p class="mg-b-0">Here is the main page section</p>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    @php
        $pages = [
            'about' => 'About Us',
            'services' => 'Services',
            'portfolio' => 'Portfolio',
            'testimonials' => 'Testimonial',
            'contact' => 'Contact Us'
        ];
    @endphp

    @foreach($pages as $key => $title)
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                <p class="card-text">
                Status: 
                @if (isset($mainPages[$key]) && $mainPages[$key]->status === 'active')
    <span class="badge badge-success">Active</span>
@else
    <span class="badge badge-danger">Inactive</span>
@endif






                </p>
                <a href="{{ route('admin.main-page.create', ['type' => $key]) }}" class="btn btn-secondary">Create</a>

                
                @if(isset($mainPages[$key]))
                     <a href="{{ route('admin.main-page.edit', ['main_page' => $mainPages[$key]->id, 'type' => $key]) }}" class="btn btn-primary">Edit</a>
                @endif

                <a href="{{ route('admin.main-page.show', ['main_page' => $mainPages[$key]->id ?? 0, 'type' => $key]) }}" class="btn btn-info">View</a>


            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
