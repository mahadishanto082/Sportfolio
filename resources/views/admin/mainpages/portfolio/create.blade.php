@extends('layouts.admin')

@section('title', 'Create Portfolio Item')

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-briefcase tx-28"></i>
    <div>
        <h4>Create Portfolio</h4>
        <p class="mg-b-0">Fill out the portfolio project details.</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.main-page.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="portfolio">
                    <!-- Project Title -->
                    <div class="form-group">
                        <label for="title">Project Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="title" 
                               placeholder="Enter project title" required>
                    </div>

                    <!-- Client Name -->
                    <div class="form-group">
                        <label for="client">Client Name</label>
                        <input type="text" name="client" class="form-control" id="client" 
                               placeholder="Enter client name (optional)">
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category">Category <span class="text-danger"></span></label>
                        <input type="text" name="category" class="form-control" id="category" 
                               placeholder="e.g. Web Development, Mobile App" >
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" id="description" rows="5" 
                                  placeholder="Enter full project description" required></textarea>
                    </div>

                    <!-- Technologies -->
                    <div class="form-group">
                        <label for="technologies">Technologies Used</label>
                        <input type="text" name="technologies" class="form-control" id="technologies" 
                               placeholder="e.g. Laravel, Vue.js, MySQL">
                    </div>

                    <!-- Project URL -->
                    <div class="form-group">
                        <label for="project_url">Project URL</label>
                        <input type="url" name="project_url" class="form-control" id="project_url" 
                               placeholder="https://example.com">
                    </div>

                    <!-- GitHub URL -->
                    <div class="form-group">
                        <label for="github_url">GitHub Repository</label>
                        <input type="url" name="github_url" class="form-control" id="github_url" 
                               placeholder="https://github.com/username/project">
                    </div>

                    <!-- Thumbnail -->
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail Image</label>
                        <input type="file" name="thumbnail" class="form-control-file" id="thumbnail">
                    </div>

                    <!-- Gallery Images -->
                    <div class="form-group">
                        <label for="gallery">Gallery Images (Multiple)</label>
                        <input type="file" name="gallery[]" class="form-control-file" id="gallery" multiple>
                    </div>

                    <!-- Tags -->
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" class="form-control" id="tags" 
                               placeholder='Comma separated tags, e.g. ["Laravel","Vue"]'>
                    </div>

                    <!-- Status -->
                    <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Status</label>
                                    <select class="form-control " name="status" required>
    <option value="" disabled {{ old('status') ? '' : 'selected' }}>Select Status</option>
    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
</select>

                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                    <button type="submit" class="btn btn-primary">Save Portfolio</button>
                    <a href="{{ route('admin.main-page.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
