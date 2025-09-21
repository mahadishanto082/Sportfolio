@extends('layouts.admin')

@section('title')
    Portfolio Page | Create
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-paper tx-28"></i>
    <div>
        <h4>Portfolio Page | Create</h4>
        <p class="mg-b-0">Here is portfolio page entry form</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                           {{-- Title --}}
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Title <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Sub Title --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}" placeholder="Enter sub title">
                                    @error('sub_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            {{-- Logo --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Logo <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="logo_image" accept="image/*" onchange="previewLogo(event)">
                                    @error('logo_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <img id="logoPreview" src="#" alt="Logo Preview" style="max-width: 200px; display: none;">
                                </div>
                            </div>
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

                            {{-- Project Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Project Name</label>
                                    <input type="text" class="form-control" name="project_name" value="{{ old('project_name') }}" placeholder="Enter project name">
                                    @error('project_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Enter project description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                            <button type="submit" class="btn btn-info">Save Portfolio</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push("_js")
<script>
    function previewLogo(event) {
        const input = event.target;
        const preview = document.getElementById('logoPreview');
        if(input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@endpush