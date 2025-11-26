@extends('layouts.admin')

@section('title', 'Edit Portfolio Item')

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-briefcase tx-28"></i>
    <div>
        <h4>Edit Portfolio</h4>
        <p class="mg-b-0">Update the portfolio project details.</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.main-page.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="portfolio">

                    <!-- Project Title -->
                    <div class="form-group">
                        <label for="title">Project Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="title" 
                               placeholder="Enter project title" value="{{ old('title', $portfolio->title) }}" required>
                    </div>

                    <!-- Client Name -->
                    <div class="form-group">
                        <label for="client">Client Name</label>
                        <input type="text" name="client" class="form-control" id="client" 
                               placeholder="Enter client name (optional)" value="{{ old('client', $portfolio->client) }}">
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control" id="category" 
                               placeholder="e.g. Web Development, Mobile App" value="{{ old('category', $portfolio->category) }}">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" id="description" rows="5" 
                                  placeholder="Enter full project description" required>{{ old('description', $portfolio->description) }}</textarea>
                    </div>

                    <!-- Technologies -->
                    <div class="form-group">
                        <label for="technologies">Technologies Used</label>
                        <input type="text" name="technologies" class="form-control" id="technologies" 
                               placeholder="e.g. Laravel, Vue.js, MySQL" value="{{ old('technologies', $portfolio->technologies) }}">
                    </div>

                    <!-- Project URL -->
                    <div class="form-group">
                        <label for="project_url">Project URL</label>
                        <input type="url" name="project_url" class="form-control" id="project_url" 
                               placeholder="https://example.com" value="{{ old('project_url', $portfolio->project_url) }}">
                    </div>

                    <!-- GitHub URL -->
                    <div class="form-group">
                        <label for="github_url">GitHub Repository</label>
                        <input type="url" name="github_url" class="form-control" id="github_url" 
                               placeholder="https://github.com/username/project" value="{{ old('github_url', $portfolio->github_url) }}">
                    </div>

                    <!-- Thumbnail -->
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail Image</label>
                        <input type="file" name="thumbnail" class="form-control-file" id="thumbnail">
                        @if($portfolio->thumbnail)
                            <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="Thumbnail" width="100" class="mt-2">
                        @endif
                    </div>

                    <!-- Gallery Images -->
                    <div class="form-group">
                        <label for="gallery">Gallery Images (Multiple)</label>
                        <input type="file" name="gallery[]" class="form-control-file" id="gallery" multiple>
                        @if($portfolio->gallery && is_array($portfolio->gallery))
                            <div class="mt-2">
                                @foreach($portfolio->gallery as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" width="80" class="mr-1 mb-1">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Tags -->
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" class="form-control" id="tags" 
                               placeholder='Comma separated tags, e.g. Laravel,Vue' 
                               value="{{ old('tags', is_array($portfolio->tags) ? implode(',', $portfolio->tags) : $portfolio->tags) }}">
                    </div>

                    <!-- Status -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="" disabled {{ old('status', $portfolio->status) ? '' : 'selected' }}>Select Status</option>
                                <option value="active" {{ old('status', $portfolio->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $portfolio->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Portfolio</button>
                    <a href="{{ route('admin.main-page.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
