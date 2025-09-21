@extends('layouts.admin')

@section('title', 'View Service')

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-briefcase-outline tx-28"></i>
    <div>
        <h4>Service Details</h4>
        <p class="mg-b-0">View all information about this service.</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">

                <!-- Title & Subtitle -->
                <h3>{{ $service->title }}</h3>
                @if($service->subtitle)
                    <h5 class="text-muted">{{ $service->subtitle }}</h5>
                @endif

                <!-- Short Description -->
                <div class="mt-3">
                    <strong>Short Description:</strong>
                    <p>{{ $service->description }}</p>
                </div>

                <!-- Detailed Content -->
                @if($service->content)
                <div class="mt-2">
                    <strong>Detailed Content:</strong>
                    <p>{{ $service->content }}</p>
                </div>
                @endif

                <!-- Features -->
                @if($service->features)
                <div class="mt-2">
                    <strong>Features:</strong>
                    @php
                        // Ensure we have an array for features
                        $features = is_array($service->features) ? $service->features : json_decode($service->features, true);
                    @endphp
                    <ul>
                        @foreach($features as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Service Image -->
                @if($service->image)
                <div class="mt-3">
                    <strong>Service Image:</strong><br>
                    <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" width="300">
                </div>
                @endif

                <!-- Status -->
                <div class="mt-3">
                    <strong>Status:</strong>
                    <span class="badge {{ $service->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                        {{ ucfirst($service->status) }}
                    </span>
                </div>

                <!-- Back Button -->
                <div class="mt-4">
                    <a href="{{ route('admin.main-page.index') }}" class="btn btn-secondary">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
