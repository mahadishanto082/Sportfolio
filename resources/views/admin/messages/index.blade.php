@extends('layouts.admin')

@section('content')
<h1>Contact Messages</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Actions</th>
    </tr>
    @foreach($messages as $message)
    <tr>
        <td>{{ $message->id }}</td>
        <td>{{ $message->name }}</td>
        <td>{{ $message->email }}</td>
        <td>{{ Str::limit($message->message, 50) }}</td>
        <td>
         
        <a onclick="deleteRow('{{ route('admin.contact-message.destroy', $message->id) }}')"
           class="dropdown-item" href="javascript:void(0)">
            <i class="fa fa-trash"></i> Delete
        </a>
    </tr>
    @endforeach
</table>
@endsection
