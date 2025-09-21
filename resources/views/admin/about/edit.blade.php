@extends('layouts.admin')

@section('title')
    Edit About Us
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="icon ion-ios-create-outline"></i>
    <div>
        <h4>Edit About Us</h4>
        <p class="mg-b-0">Update the information for About Us section</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" 
                               name="title" 
                               class="form-control" 
                               value="{{ old('title', $about->title) }}" 
                               required>
                    </div>

                    {{-- Content --}}
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" 
                                  class="form-control" 
                                  rows="5" 
                                  required>{{ old('content', $about->content) }}</textarea>
                    </div>

                    {{-- Semi Description --}}
                    <div class="form-group">
                        <label for="semi_description">Semi Description</label>
                        <input type="text" 
                               name="semi_description" 
                               class="form-control" 
                               value="{{ old('semi_description', $about->semi_description) }}">
                    </div>

                    {{-- Caption --}}
                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" 
                               name="caption" 
                               class="form-control" 
                               value="{{ old('caption', $about->caption) }}">
                    </div>

                    {{-- Image --}}
                    <div class="form-group">
                        <label for="image">Image</label><br>
                        @if($about->image)
                            <img src="{{ asset('storage/about/' . $about->image) }}" 
                                 alt="Current Image" width="80" height="80" class="mb-2">
                        @endif
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    {{-- Logo --}}
                    <div class="form-group">
                        <label for="logo_image">Logo</label><br>
                        @if($about->logo_image)
                            <img src="{{ asset('storage/about/' . $about->logo_image) }}" 
                                 alt="Current Logo" width="60" height="60" class="mb-2">
                        @endif
                        <input type="file" name="logo_image" class="form-control-file">
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Active" {{ $about->status === 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $about->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
