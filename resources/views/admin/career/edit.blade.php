@extends('layouts.admin')

@section('title')
    Services | Edit
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-paper tx-28"></i>
    <div>
        <h4>Service | Edit</h4>
        <p class="mg-b-0">Edit service details</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            {{-- Title --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $service->title) }}" placeholder="Enter service title">
                                </div>
                            </div>

                            {{-- Icon --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input class="form-control" type="file" name="icon" accept="image/*">
                                    @if($service->icon)
                                        <img src="{{ asset('storage/services/' . $service->icon) }}" alt="{{ $service->title }}" width="50" height="50" class="mt-2">
                                    @endif
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $service->name) }}" placeholder="Enter service name">
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Enter service description">{{ old('description', $service->description) }}</textarea>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Active" {{ $service->status === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $service->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Update Service</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
