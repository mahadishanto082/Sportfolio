@extends('layouts.admin')

@section('title', 'View About Section')

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-information-outline tx-28"></i>
    <div>
        <h4>About Section Details</h4>
        <p class="mg-b-0">View all details for the About section.</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">

                <!-- Title & Subtitle -->
                <h3>{{ $about->title }}</h3>
                @if($about->subtitle)
                    <h5 class="text-muted">{{ $about->subtitle }}</h5>
                @endif

                <!-- Description -->
                <div class="mt-3">
                    <strong>Description:</strong>
                    <p>{{ $about->description }}</p>
                </div>

                <!-- Short Intro -->
                @if($about->semi_description)
                <div class="mt-2">
                    <strong>Short Intro:</strong>
                    <p>{{ $about->semi_description }}</p>
                </div>
                @endif

                <!-- Images -->
                <div class="mt-3">
                    @if($about->logo_image)
                        <div class="mb-2">
                            <strong>Logo:</strong><br>
                            <img src="{{ asset('storage/' . $about->logo_image) }}" alt="Logo" width="150">
                        </div>
                    @endif

                    @if($about->image)
                        <div class="mb-2">
                            <strong>Main Image / Hero:</strong><br>
                            <img src="{{ asset('storage/' . $about->image) }}" alt="Main Image" width="300">
                        </div>
                    @endif

                    @if($about->caption)
                        <p><em>{{ $about->caption }}</em></p>
                    @endif
                </div>

                <!-- Company History -->
                @if($about->history)
                <div class="mt-3">
                    <strong>History / Milestones:</strong>
                    <p>{{ $about->history }}</p>
                </div>
                @endif

                <!-- Vision -->
                @if($about->vision)
                <div class="mt-2">
                    <strong>Vision:</strong>
                    <p>{{ $about->vision }}</p>
                </div>
                @endif

                <!-- Mission -->
                @if($about->mission)
                <div class="mt-2">
                    <strong>Mission:</strong>
                    <p>{{ $about->mission }}</p>
                </div>
                @endif

                <!-- Achievements -->
                @if($about->achievements)
<div class="mt-3">
    <strong>Achievements / Awards:</strong>
    <ul>
        @php
            // Ensure we have an array
            $achievements = is_array($about->achievements) ? $about->achievements : json_decode($about->achievements, true);
        @endphp
        @foreach($achievements as $achievement)
            <li>{{ $achievement }}</li>
        @endforeach
    </ul>
</div>
@endif


                <!-- Status -->
                <div class="mt-3">
                    <strong>Status:</strong>
                    <span class="badge {{ $about->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                        {{ ucfirst($about->status) }}
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
