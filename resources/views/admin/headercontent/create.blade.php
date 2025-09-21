@extends('layouts.admin')

@section('title')
    Header Content | Create
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Header content | Create</h4>
            <p class="mg-b-0">Here is the Header Contents</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('admin.header-content.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">
                                
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Navigation Links</label>

                                        <input 
                                        type="text" 
                                        name="nav_links[]" 
                                        class="form-control mb-2" 
                                        placeholder="Link 1" 
                                        value="{{ old('nav_links.0') }}">
                                        <input 
                                        type="text" 
                                        name="nav_links[]" 
                                        class="form-control mb-2" 
                                        placeholder="Link 2" 
                                        value="{{ old('nav_links.1') }}">
                                        <input 
                                        type="text" 
                                        name="nav_links[]" 
                                        class="form-control mb-2" 
                                        placeholder="Link 3" 
                                        value="{{ old('nav_links.2') }}">
                                        <input 
                                        type="text" 
                                        name="nav_links[]" 
                                        class="form-control mb-2" 
                                        placeholder="Link 4" 
                                        value="{{ old('nav_links.3') }}">
                                        <input 
                                        type="text" 
                                        name="nav_links[]" 
                                        class="form-control" 
                                        placeholder="Link 5" 
                                        value="{{ old('nav_links.4') }}">

                                        @error('nav_links')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        {{-- For individual inputs validation errors, you can do: --}}
                                        @error('nav_links.0')
                                        <small class="text-danger">Link 1: {{ $message }}</small>
                                        @enderror
                                        @error('nav_links.1')
                                        <small class="text-danger">Link 2: {{ $message }}</small>
                                        @enderror
                                        @error('nav_links.2')
                                        <small class="text-danger">Link 3: {{ $message }}</small>
                                        @enderror
                                        @error('nav_links.3')
                                        <small class="text-danger">Link 4: {{ $message }}</small>
                                        @enderror
                                        @error('nav_links.4')
                                        <small class="text-danger">Link 5: {{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Logo <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="logo" accept="image/*">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <img id="logoPreview" src="#" alt="Logo Preview" style="max-width: 200px; display: none;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Button Name</label>
                                        <input type="text" name="button_name" class="form-control" placeholder="Enter button name" value="{{ old('button_name') }}">
                                        @error('button_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <img id="logoPreview" src="#" alt="Logo Preview" style="max-width: 200px; display: none;">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="status">
                                            <option value="" selected hidden disabled></option>
                                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div><!-- form-layout-footer -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection
@push('_js')
<script>
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
@endpush
