@extends('layouts.admin')

@section('title', 'View Portfolio')

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-briefcase tx-28"></i>
    <div>
        <h4>Portfolio Details</h4>
        <p class="mg-b-0">View all information about this portfolio project.</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">

                <!-- Project Title & Client -->
                <h3>{{ $portfolio->title }}</h3>
                @if($portfolio->client)
                    <h5 class="text-muted">Client: {{ $portfolio->client }}</h5>
                @endif

                <!-- Category -->
                @if($portfolio->category)
                <div class="mt-2">
                    <strong>Category:</strong>
                    <p>{{ $portfolio->category }}</p>
                </div>
                @endif

                <!-- Description -->
                <div class="mt-3">
                    <strong>Description:</strong>
                    <p>{{ $portfolio->description }}</p>
                </div>

                <!-- Technologies -->
                @if($portfolio->technologies)
                <div class="mt-2">
                    <strong>Technologies Used:</strong>
                    <p>{{ $portfolio->technologies }}</p>
                </div>
                @endif

                <!-- Project URL -->
                @if($portfolio->project_url)
                <div class="mt-2">
                    <strong>Project URL:</strong>
                    <p><a href="{{ $portfolio->project_url }}" target="_blank">{{ $portfolio->project_url }}</a></p>
                </div>
                @endif

                <!-- GitHub URL -->
                @if($portfolio->github_url)
                <div class="mt-2">
                    <strong>GitHub Repository:</strong>
                    <p><a href="{{ $portfolio->github_url }}" target="_blank">{{ $portfolio->github_url }}</a></p>
                </div>
                @endif

                <!-- Thumbnail -->
                @if($portfolio->thumbnail)
                <div class="mt-3">
                    <strong>Thumbnail:</strong><br>
                    <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="Thumbnail" width="200">
                </div>
                @endif

                <!-- Gallery Images -->
                @if($portfolio->gallery && is_array($portfolio->gallery))
                <div class="mt-3">
                    <strong>Gallery:</strong><br>
                    @foreach($portfolio->gallery as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" width="100" class="mr-1 mb-1">
                    @endforeach
                </div>
                @endif

                <!-- Tags -->
                @if($portfolio->tags)
                <div class="mt-3">
                    <strong>Tags:</strong>
                    @php
                        $tags = is_array($portfolio->tags) ? $portfolio->tags : explode(',', $portfolio->tags);
                    @endphp
                    @foreach($tags as $tag)
                        <span class="badge badge-primary">{{ trim($tag) }}</span>
                    @endforeach
                </div>
                @endif

                <!-- Status -->
                <div class="mt-3">
                    <strong>Status:</strong>
                    <span class="badge {{ $portfolio->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                        {{ ucfirst($portfolio->status) }}
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
