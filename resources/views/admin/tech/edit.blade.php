@extends('layouts.admin')

@section('title')
    Tech | Edit
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-gear tx-28"></i>
    <div>
        <h4>Tech | Edit</h4>
        <p class="mg-b-0">Edit tech details</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.tech.update', $tech->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $tech->name) }}" placeholder="Enter tech name">
                                </div>
                            </div>

                            {{-- Logo --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input class="form-control" type="file" name="logo_image" accept="image/*">
                                    @if($tech->logo)
                                        <img src="{{ asset('storage/techs/' . $tech->logo) }}" alt="{{ $tech->name }}" width="50" height="50" class="mt-2">
                                    @endif
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Enter tech description">{{ old('description', $tech->description) }}</textarea>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Active" {{ $tech->status === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $tech->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Update Tech</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
