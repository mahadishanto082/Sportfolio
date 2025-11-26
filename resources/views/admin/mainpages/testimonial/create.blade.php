@extends('layouts.admin')

@section('title', 'Create Testimonial')

@section('page-info')
    <div class="br-pagetitle">
        <i class="ion-ios-chatboxes-outline tx-28"></i>
        <div>
            <h4>Create New Testimonial</h4>
            <p class="mg-b-0">Add a client testimonial for the website.</p>
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
                    <input type="hidden" name="type" value="testimonial">

                    <!-- Client Name -->
                    <div class="form-group">
                        <label>Client Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <!-- Client Role -->
                    <div class="form-group">
                        <label>Client Role / Position <span class="text-danger">*</span></label>
                        <input type="text" name="role" class="form-control" placeholder="CEO, ABC Ltd" required>
                    </div>

                    <!-- Testimonial Message -->
                    <div class="form-group">
                        <label>Testimonial Message <span class="text-danger">*</span></label>
                        <textarea name="message" class="form-control" rows="3" placeholder="Write the client's feedback..." required></textarea>
                    </div>

                    <!-- Photo -->
                    <div class="form-group">
                        <label>Client Photo</label>
                        <input type="file" name="photo" class="form-control-file" accept="image/*">
                    </div>

                    <!-- User Rating -->
                    <div class="form-group">
                        <label>User Rating</label>
                        <select name="user_rating" class="form-control">
                            <option value="">-- Optional (User Submitted) --</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="1">⭐</option>
                        </select>
                    </div>

                    <!-- Admin Rating -->
                    <div class="form-group">
                        <label>Admin Rating (Override)</label>
                        <select name="admin_rating" class="form-control">
                            <option value="">-- Optional --</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="1">⭐</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="col-md-4 px-0">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control select2">
                                <option value="" selected hidden disabled>Select</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary">Save Testimonial</button>
                    <a href="{{ route('admin.main-page.index') }}" class="btn btn-secondary">Back</a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
