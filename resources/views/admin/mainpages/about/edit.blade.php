@extends('layouts.admin')

@section('title', 'Edit About Section')

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-information-outline tx-28"></i>
    <div>
        <h4>Edit About Section</h4>
        <p class="mg-b-0">Update the About section details for the website.</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.main-page.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="about">

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="title"
                               value="{{ old('title', $about->title) }}" required>
                    </div>

                    <!-- Subtitle -->
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle"
                               value="{{ old('subtitle', $about->subtitle) }}">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" id="description" rows="5" required>{{ old('description', $about->description) }}</textarea>
                    </div>

                    <!-- Semi Description -->
                    <div class="form-group">
                        <label for="semi_description">Short Intro</label>
                        <textarea name="semi_description" class="form-control" id="semi_description" rows="2">{{ old('semi_description', $about->semi_description) }}</textarea>
                    </div>

                    <!-- Logo Image -->
                    <div class="form-group">
                        <label for="logo_image">Logo Image</label>
                        @if($about->logo_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $about->logo_image) }}" alt="Logo" height="60">
                            </div>
                        @endif
                        <input type="file" name="logo_image" class="form-control-file" id="logo_image">
                    </div>

                    <!-- Main Image -->
                    <div class="form-group">
                        <label for="image">Main Image / Hero Image</label>
                        @if($about->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $about->image) }}" alt="Main Image" height="100">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>

                    <!-- Caption -->
                    <div class="form-group">
                        <label for="caption">Image Caption</label>
                        <input type="text" name="caption" class="form-control" id="caption"
                               value="{{ old('caption', $about->caption) }}">
                    </div>

                    <!-- History -->
                    <div class="form-group">
                        <label for="history">Company History / Milestones</label>
                        <textarea name="history" class="form-control" id="history" rows="3">{{ old('history', $about->history) }}</textarea>
                    </div>

                    <!-- Vision -->
                    <div class="form-group">
                        <label for="vision">Vision Statement</label>
                        <textarea name="vision" class="form-control" id="vision" rows="2">{{ old('vision', $about->vision) }}</textarea>
                    </div>

                    <!-- Mission -->
                    <div class="form-group">
                        <label for="mission">Mission Statement</label>
                        <textarea name="mission" class="form-control" id="mission" rows="2">{{ old('mission', $about->mission) }}</textarea>
                    </div>

                    <!-- Achievements -->
                    <div class="form-group">
                        <label for="achievements">Achievements / Awards</label>
                        <textarea name="achievements" class="form-control" id="achievements" rows="3">
    {{ old('achievements', is_array($about->achievements) ? implode(', ', $about->achievements) : $about->achievements) }}
</textarea>

                    </div>

                    <!-- Status -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Status</label>
                            <select class="form-control select2" name="status">
                                <option value="" disabled hidden></option>
                                <option value="active" {{ old('status', $about->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $about->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> 

                    <button type="submit" class="btn btn-primary">Update About</button>
                    <a href="{{ route('admin.main-page.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
