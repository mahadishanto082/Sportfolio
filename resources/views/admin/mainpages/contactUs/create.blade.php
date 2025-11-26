@extends('layouts.admin')

@section('title', 'Add Team Member')

@section('page-info')
    <div class="br-pagetitle">
        <i class="ion-ios-people-outline tx-28"></i>
        <div>
            <h4>Add Team Member</h4>
            <p class="mg-b-0">Add a team member who will be displayed on the Contact Us page.</p>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label>Member Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <!-- Designation -->
                    <div class="form-group">
                        <label>Designation <span class="text-danger">*</span></label>
                        <input type="text" name="designation" class="form-control" placeholder="Software Engineer / Project Manager" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="johndoe@example.com">
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="+8801XXXXXXXXX">
                    </div>

                    <!-- Photo -->
                    <div class="form-group">
                        <label>Member Photo</label>
                        <input type="file" name="photo" class="form-control-file" accept="image/*">
                    </div>

                    <!-- Status -->
                    <div class="col-md-4 px-0">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control select2">
                                <option value="" selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-primary">Save Member</button>
                    <a href="#" class="btn btn-secondary">Back</a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
