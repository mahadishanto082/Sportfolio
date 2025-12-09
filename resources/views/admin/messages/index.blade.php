@extends('layouts.admin')

@section('content')
<h1>Contact Messages</h1>

<!-- Success message -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Search form -->
<form method="GET" action="{{ route('admin.contact-message.index') }}" class="mb-3">
    <input type="text" name="key" value="{{ request('key') }}" placeholder="Search by name, email, or project idea">
    <button type="submit" class="btn btn-primary btn-sm">Search</button>
</form>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Project Idea</th>
            <th>Features</th>
            <th>Budget</th>
            <th>Timeline</th>
            <th>Attachment</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{ $message->id }}</td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ Str::limit($message->project_idea, 50) }}</td>
            <td>{{ Str::limit($message->features, 50) }}</td>
            <td>{{ $message->budget ?? '-' }}</td>
            <td>{{ $message->timeline ?? '-' }}</td>
            <td>
                @if($message->attachment)
                    <a href="{{ asset('storage/' . $message->attachment) }}" target="_blank">View</a>
                @else
                    -
                @endif
            </td>
            <td>
                <!-- View message -->
                <a href="{{ route('admin.contact-message.show', $message->id) }}" class="btn btn-info btn-sm">View</a>

                <!-- Email user -->
                <a href="mailto:{{ $message->email }}?subject=Regarding your project inquiry&body=Hello {{ $message->name }}," 
                   class="btn btn-primary btn-sm">Email</a>

                <!-- Delete message -->
                <a onclick="deleteRow('{{ route('admin.contact-message.destroy', $message->id) }}')" 
                   class="btn btn-danger btn-sm" href="javascript:void(0)">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div class="mt-3">
    {{ $messages->links() }}
</div>

<!-- JS for delete confirmation -->
<script>
function deleteRow(url) {
    if(confirm("Are you sure you want to delete this message?")) {
        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
        }).then(res => location.reload())
          .catch(err => alert('Failed to delete message.'));
    }
}
</script>

@endsection
