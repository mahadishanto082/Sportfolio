@extends('layouts.admin')

@section('title')
    Packages | Edit
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="ion-ios-paper tx-28"></i>
        <div>
            <h4>Packages | Edit</h4>
            <p class="mg-b-0">Here is the Packages edit form</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.packages.update', $packages->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">

                                {{-- Title --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ old('title', $packages->title) }}" placeholder="Enter Title">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Package Name --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Package Name</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{ old('name', $packages->name) }}" placeholder="Enter package name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Price --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Price</label>
                                        <input type="number" step="0.01" class="form-control" name="price"
                                               value="{{ old('price', $packages->price) }}" placeholder="Enter price">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Duration --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Duration</label>
                                        <input type="text" class="form-control" name="duration"
                                               value="{{ old('duration', $packages->duration) }}" placeholder="Enter duration (e.g., 1 month)">
                                        @error('duration')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Features --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Features</label>
                                        <textarea class="form-control" name="features" rows="4"
                                                  placeholder="Enter package features">{{ old('features', $packages->features) }}</textarea>
                                        @error('features')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                        <select class="form-control select2" name="status">
                                            <option value="" hidden disabled></option>
                                            <option value="Active" {{ old('status', $packages->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status', $packages->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
