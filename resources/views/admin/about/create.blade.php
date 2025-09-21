@extends('layouts.admin')

@section('title')
    About Us | Create
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-paper tx-28"></i>
    <div>
        <h4>About us | Create</h4>
        <p class="mg-b-0">Here is About us page entry form</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">

                                


                                 {{-- Image --}}
                                 <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Image</label>
                                    <input type="file" class="form-control" name="image" >
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div id="images_preview" class="d-flex flex-wrap gap-2 mt-2"></div>
                            </div>

                            <div class="col-md-6">
                                    <label class="form-control-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
                                    @error('short_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- Image --}}
                                 <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Logo</label>
                                    <input type="file" class="form-control" name="logo_image" >
                                    @error('logo_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div id="images_preview" class="d-flex flex-wrap gap-2 mt-2"></div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>caption</label>
                                    <textarea class="form-control" name="caption" rows="4" placeholder="Enter caption"></textarea>
                                </div>
                            </div>


  

                               
                                {{-- Dropdown Item Input with Add Button --}}
                              
                                {{-- Dropdown Preview --}}
                               

                                {{-- Description --}}

                                
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Semi-Description</label>
                                    <textarea class="form-control" name="semi_description" rows="4" placeholder="Enter semi description"></textarea>
                                </div>
                            </div>





                               
                                {{-- Picture Headline --}}
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
