@extends('layouts.admin')

@section('title', 'Create Service')

@section('page-info')
    <div class="br-pagetitle">
        <i class="ion-ios-briefcase-outline tx-28"></i>
        <div>
            <h4>Create New Service</h4>
            <p class="mg-b-0">Fill out the service details to display on the website.</p>
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
                        <input type="hidden" name="type" value="services">

                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Service Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter service title" required>
                        </div>

                        <!-- Subtitle -->
                        <div class="form-group">
                            <label for="subtitle">Subtitle / Tagline</label>
                            <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Optional tagline for service">
                        </div>



                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Short Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter short description" required></textarea>
                        </div>

                        <!-- Full Content -->
                        <div class="form-group">
                            <label for="content">Detailed Content</label>
                            <textarea name="content" class="form-control" id="content" rows="5" placeholder="Full service details"></textarea>
                        </div>

                        <!-- Features -->
                        <div class="form-group">
                            <label for="features">Features</label>
                            <textarea name="features" class="form-control" id="features" rows="3" placeholder='Enter as JSON array, e.g., ["Feature 1","Feature 2"]'></textarea>
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Service Image</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                        <select class="form-control select2" name="status">
                                            <option value="" selected hidden disabled></option>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Save Service</button>
                        <a href="{{ route('admin.main-page.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
