@extends('layouts.admin')

@section('title')
    Header Content | Edit
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Header content | Edit</h4>
            <p class="mg-b-0">Update Header Content details below</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.header-content.update', $headercontent->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">

                                {{-- Button Name Input --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Button Name <span class="tx-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="button_name_input" placeholder="Enter button name">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="add_button_btn">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Buttons Table --}}
                                <div class="col-md-12 mt-3">
                                    <label>Buttons Preview</label>
                                    <table class="table table-bordered" id="buttons_table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Button Name</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $buttons = is_array($headercontent->button_names) 
                                                            ? $headercontent->button_names 
                                                            : (json_decode($headercontent->button_names, true) ?? []);
                                                $counter = 1;
                                            @endphp

                                            @foreach($buttons as $btn)
                                                <tr>
                                                    <td>{{ $counter++ }}</td>
                                                    <td>
                                                        {{ $btn }}
                                                        <input type="hidden" name="button_names[]" value="{{ $btn }}">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm remove-btn">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Logo Upload --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Logo</label>
                                        <input class="form-control" type="file" name="logo" accept="image/*">
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        @if($headercontent->logo)
                                            <img id="logoPreview" src="{{ asset('storage/' . $headercontent->logo) }}" alt="Logo Preview" style="max-width: 200px; display: block;">
                                        @else
                                            <img id="logoPreview" src="#" alt="Logo Preview" style="max-width: 200px; display: none;">
                                        @endif
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="status">
                                            <option value="" selected hidden disabled></option>
                                            <option value="Active" {{ $headercontent->status == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ $headercontent->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('_js')
<script>
    // Logo Preview
    document.querySelector('input[name="logo"]').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('logoPreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });

    // Button Name Add + Table Preview
    let counter = {{ count($buttons) + 1 }};

    document.getElementById('add_button_btn').addEventListener('click', function () {
        const input = document.getElementById('button_name_input');
        const value = input.value.trim();
        const tableBody = document.querySelector('#buttons_table tbody');

        if (value) {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${counter++}</td>
                <td>
                    ${value}
                    <input type="hidden" name="button_names[]" value="${value}">
                </td>
                <td><button type="button" class="btn btn-danger btn-sm remove-btn">Remove</button></td>
            `;
            tableBody.appendChild(row);
            input.value = '';
        }
    });

    // Remove row from table
    document.querySelector('#buttons_table').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-btn')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endpush
