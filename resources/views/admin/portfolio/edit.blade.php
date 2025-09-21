@extends('layouts.admin')

@section('title')
    Portfolio | Edit
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-briefcase tx-28"></i>
    <div>
        <h4>Portfolio | Edit</h4>
        <p class="mg-b-0">Edit portfolio details</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            {{-- Project Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" name="project_name" value="{{ old('project_name', $portfolio->project_name) }}" placeholder="Enter project name">
                                </div>
                            </div>

                            {{-- Caption --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Caption</label>
                                    <input type="text" class="form-control" name="caption" value="{{ old('caption', $portfolio->caption) }}" placeholder="Enter caption">
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Enter description">{{ old('description', $portfolio->description) }}</textarea>
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image" accept="image/*">
                                    @if($portfolio->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/portfolios/' . $portfolio->image) }}" alt="{{ $portfolio->project_name }}" width="120">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Active" {{ $portfolio->status === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $portfolio->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-layout-footer mt-3">
                            <button type="submit" class="btn btn-info">Update Portfolio</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
