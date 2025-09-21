@extends('layouts.admin')

@section('title', 'Edit Service')

@section('page-info')
    <div class="br-pagetitle">
        <i class="ion-ios-briefcase-outline tx-28"></i>
        <div>
            <h4>Edit Service</h4>
            <p class="mg-b-0">Update the service details shown on the website.</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.main-page.update', $services->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="type" value="services">

                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Service Title <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="title" 
                                   class="form-control" 
                                   id="title" 
                                   value="{{ old('title', $services->title) }}" 
                                   placeholder="Enter service title" 
                                   required>
                        </div>

                        <!-- Subtitle -->
                        <div class="form-group">
                            <label for="subtitle">Subtitle / Tagline</label>
                            <input type="text" 
                                   name="subtitle" 
                                   class="form-control" 
                                   id="subtitle" 
                                   value="{{ old('subtitle', $services->subtitle) }}" 
                                   placeholder="Optional tagline for service">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Short Description <span class="text-danger">*</span></label>
                            <textarea name="description" 
                                      class="form-control" 
                                      id="description" 
                                      rows="3" 
                                      placeholder="Enter short description" 
                                      required>{{ old('description', $services->description) }}</textarea>
                        </div>

                        <!-- Full Content -->
                        <div class="form-group">
                            <label for="content">Detailed Content</label>
                            <textarea name="content" 
                                      class="form-control" 
                                      id="content" 
                                      rows="5" 
                                      placeholder="Full service details">{{ old('content', $services->content) }}</textarea>
                        </div>

                        <!-- Features -->
                        <div class="form-group">
                            <label for="features">Features</label>
                            <textarea name="features" 
                                      class="form-control" 
                                      id="features" 
                                      rows="3" 
                                      placeholder='Enter features separated by new lines'>
                                {{ old('features', is_array($services->features) ? implode("\n", $services->features) : $services->features) }}
                            </textarea>
                        </div>

                        <!-- Current Image Preview -->
                        @if ($services->image)
                            <div class="form-group">
                                <label>Current Image</label><br>
                                <img src="{{ asset('storage/' . $services->image) }}" alt="Service Image" class="img-thumbnail mb-2" style="max-width: 200px;">
                            </div>
                        @endif

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Change Service Image</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Status</label>
                                <select class="form-control select2" name="status">
                                    <option value="" hidden disabled></option>
                                    <option value="active" {{ old('status', $services->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $services->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Update Service</button>
                        <a href="{{ route('admin.main-page.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

