@extends('layouts.admin')

@section('title')
    Dropdown Info | List
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Dropdown Info</h4>
            <p class="mg-b-0">List of Dropdown information</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
            <div class="card">
                <div class="card-body">
                    <div class="bd bd-gray-300 rounded table-responsive">
                    <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Button Name</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>Subtitle</th>
            <th>Image</th>
            <th>Items</th>
            <th>Picture Headline</th>
            <th>Caption</th>
            <th>Description</th>
            <th>Links</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($dropdownInfos as $dropdownInfo)
            <tr>
                <td>{{ $dropdownInfo->id }}</td>
                <td>{{ $dropdownInfo->dropdown_button_name }}</td>
                <td>{{ $dropdownInfo->category_id }}</td>
                <td>{{ $dropdownInfo->title ?? '--' }}</td>
                <td>{{ $dropdownInfo->content ?? '--' }}</td>
                <td>{{ $dropdownInfo->subtitle }}</td>
                <!-- Single image format -->
                <td>
                    @if($dropdownInfo->image && !is_array(json_decode($dropdownInfo->image, true)))
                        <img src="{{ asset('storage/' . $dropdownInfo->image) }}" width="50" alt="Image">
                    @else
                        --
                    @endif


                <!-- Multiple images format -->

                    @php
                        $images = $dropdownInfo->image ? json_decode($dropdownInfo->image, true) : [];
                        // Ensure $images is an array
                        if (!is_array($images)) {
                            $images = [];
                        }
                    @endphp

                    @if(!empty($images))
                        @foreach($images as $img)
                            <img src="{{ asset('storage/' . $img) }}" width="50" alt="Image">
                        @endforeach
                    @else
                        --
                    @endif
                </td>

              
              
                <td>
                    @php
                        $items = is_array($dropdownInfo->dropdown_items) 
                            ? $dropdownInfo->dropdown_items 
                            : json_decode($dropdownInfo->dropdown_items, true);
                    @endphp

                    @if(!empty($items))
                        @foreach($items as $item)
                            <span class="badge bg-info">{{ $item }}</span>
                        @endforeach
                    @else
                        --
                    @endif
                </td>
                <td>{{ $dropdownInfo->picture_headline ?? '--' }}</td>
                <td>{{ $dropdownInfo->caption ?? '--' }}</td>
                <td>{{ $dropdownInfo->description ?? '--' }}</td>
                <td>
                    @if($dropdownInfo->link)
                        <a href="{{ $dropdownInfo->link }}" target="_blank">{{ $dropdownInfo->link }}</a>
                    @else
                        --
                    @endif
                </td>
                <td>{{ $dropdownInfo->status }}</td>
                <td>
                    <form action="{{ route('admin.dropdown-info.destroy', $dropdownInfo->id) }}" method="POST" style="display:inline;">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
