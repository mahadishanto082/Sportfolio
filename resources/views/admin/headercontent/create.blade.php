@extends('layouts.admin')

@section('title')
    Header Content | Create
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="icon ion-ios-paper-outline"></i>
        <div>
            <h4>Header content | Create</h4>
            <p class="mg-b-0">Here is the Header Contents</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.header-content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">

                                {{-- Button Name Input with Add Button --}}
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

                                {{-- Items List Table --}}
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
                                        <tbody></tbody>
                                    </table>
                                </div>

                                {{-- Logo Upload --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Logo <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="logo" accept="image/*">
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <img id="logoPreview" src="#" alt="Logo Preview" style="max-width: 200px; display: none;">
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="status">
                                            <option value="" selected hidden disabled></option>
                                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div><!-- form-layout-footer -->
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
    let counter = 1;

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
