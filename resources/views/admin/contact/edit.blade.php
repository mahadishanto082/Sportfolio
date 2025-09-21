@extends('layouts.admin')

@section('title')
    Contacts | Edit
@endsection

@section('page-info')
<div class="br-pagetitle">
    <i class="ion-ios-mail tx-28"></i>
    <div>
        <h4>Contact | Edit</h4>
        <p class="mg-b-0">Edit contact details</p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $contact->name) }}" placeholder="Enter contact name">
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $contact->email) }}" placeholder="Enter email address">
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $contact->phone) }}" placeholder="Enter phone number">
                                </div>
                            </div>

                            {{-- Subject --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject', $contact->subject) }}" placeholder="Enter subject">
                                </div>
                            </div>

                            {{-- Message --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" rows="4" placeholder="Enter message">{{ old('message', $contact->message) }}</textarea>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Pending" {{ $contact->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Resolved" {{ $contact->status === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Update Contact</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
