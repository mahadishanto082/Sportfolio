@extends('layouts.admin')

@section('title')
    Tech | Create
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-gear tx-28"></i>
    <div>
        <h4>Tech | Create</h4>
        <p class="mg-b-0">Here is tech entry form</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.tech.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter tech name">
                                </div>
                            </div>

                            {{-- Logo --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input class="form-control" type="file" name="logo_image" accept="image/*">
                                </div>
                            </div>



                            {{-- Status --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="" hidden disabled selected>Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Save Tech</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
