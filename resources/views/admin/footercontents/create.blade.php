@extends('layouts.admin')

@section('title')
    Footer | Create
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-mail tx-28"></i>
    <div>
        <h4>Footer | Create</h4>
        <p class="mg-b-0">Here is the Footer entry form</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
            <form action="{{ route('admin.contact.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Logo <span class="tx-danger"></span></label>
                                        <input class="form-control" type="file" name="logo" accept="image/*">
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <img id="logoPreview" src="#" alt="Logo Preview" style="max-width: 200px; display: none;">
                                    </div>
                                </div>
                    <div class="form-group mb-3">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Company Name" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Company Email" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Company Phone">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="Company Address">{{ old('address') }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="" selected hidden disabled>Select Status</option>
                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-info">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('_js')
<script>
    // Logo Preview
document.querySelector('input[name="logo"]').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('logoPreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>