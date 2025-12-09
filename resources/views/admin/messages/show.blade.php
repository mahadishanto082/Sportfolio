@extends('layouts.admin')

@section('content')
<h1>Contact Message Details</h1>

<!-- Back button -->
<a href="{{ route('admin.contact-message.index') }}" class="btn btn-secondary mb-3">Back to Messages</a>

<div class="card" style="padding: 20px; border: 1px solid #ddd; max-width: 800px;">
    <p><strong>ID:</strong> {{ $message->id }}</p>
    <p><strong>Name:</strong> {{ $message->name }}</p>
    <p><strong>Email:</strong> {{ $message->email }}</p>
    <p><strong>Project Idea:</strong><br>{{ $message->project_idea }}</p>
    <p><strong>Features:</strong><br>{{ $message->features ?? '-' }}</p>
    <p><strong>Budget:</strong> {{ $message->budget ?? '-' }}</p>
    <p><strong>Timeline:</strong> {{ $message->timeline ?? '-' }}</p>
    <p><strong>Attachment:</strong>
        @if($message->attachment)
            <a href="{{ asset('storage/' . $message->attachment) }}" target="_blank">View / Download</a>
        @else
            -
        @endif
    </p>
</div>

<!-- Optional: Email user directly -->
<a href="mailto:{{ $message->email }}?subject=Regarding your project inquiry&body=Hello {{ $message->name }}," 
   class="btn btn-primary mt-3">Send Email</a>

@endsection
