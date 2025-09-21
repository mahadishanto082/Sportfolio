@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Dropdown Menus</h1>
        <a href="{{ route('admin.dropdown.create') }}" class="btn btn-primary">+ Add New Dropdown</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Button Name</th>
                <th>Category</th>

                <th>Items</th>

                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dropdowns as $dropdown)
                <tr>
                    <td>{{ $dropdown->id }}</td>
                    <td>{{ $dropdown->dropdown_button_name }}</td>
                    <td>{{ $dropdown->category_id }}</td>
                    <td>
                        @foreach($dropdown->dropdown_items as $item)
                            <span class="badge bg-primary">{{ $item }}</span>
                        @endforeach
                    </td>
                   
                    <td>{{ $dropdown->status }}</td>
                    <td>
                        <form action="{{ route('admin.dropdown.destroy', $dropdown->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No dropdown menus found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
