@extends('layouts.admin')

@section('title')
    Title Page | Create
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-paper tx-28"></i>
    <div>
        <h4>Title Page | Create</h4>
        <p class="mg-b-0">Here is title page entry form</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.title-page.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">

                                {{-- -logo --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Logo <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="image" accept="image/*">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <img id="logoPreview" src="#" alt="Logo Preview" style="max-width: 200px; display: none;">
                                    </div>
                                </div>


                                 {{-- Image --}}
                             

                            <div class="col-md-6">
                                    <label class="form-control-label">Short-Title</label>
                                    <input type="text" class="form-control" name="short_title" value="{{ old('subtitle') }}" placeholder="Enter sub-title">
                                    @error('short_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


  

                                {{-- Content --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Content</label>
                                        <textarea class="form-control" name="content" rows="4" placeholder="Enter dropdown info content" required>{{ old('content') }}</textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Dropdown Item Input with Add Button --}}
                              
                                {{-- Dropdown Preview --}}
                               

                                
                                


                               
                                {{-- Picture Headline --}}

                                {{-- Caption --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Caption</label>
                                        <input type="text" class="form-control" name="caption" value="{{ old('caption') }}" placeholder="Enter caption">
                                        @error('caption')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Description --}}
                               
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


                            


                                {{-- Status --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
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
                                <button type="submit" class="btn btn-info">Save Dropdown</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('_js')
<script>
    

// Remove item
function removeItem(index) {
    items.splice(index, 1);
    updateItems();
}

// Update table, hidden inputs, and dropdown preview
function updateItems() {
}
let images = [];

// Image input change
document.getElementById('images_input').addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    files.forEach(file => images.push(file));
    updateImagePreview();
});

// Remove item
function removeItem(index) {
    items.splice(index, 1);
    updateItems();
}
// Image preview
document.getElementById('images_input').addEventListener('change', function() {
    const previewContainer = document.getElementById('images_preview');
    previewContainer.innerHTML = '';
    Array.from(this.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.objectFit = 'cover';
            img.classList.add('m-1', 'border', 'p-1');
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});

</script>
@endpush
