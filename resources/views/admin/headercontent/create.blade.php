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

                                {{-- Button Name Input --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Button Name <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" id="button_name_input" placeholder="Enter button name">
                                    </div>
                                </div>

                                {{-- Button Link Input --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Button Link <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" id="button_link_input" placeholder="Enter button link">
                                    </div>
                                </div>

                                {{-- Add Button --}}
                                <div class="col-md-12 mb-3">
                                    <button type="button" class="btn btn-primary" id="add_button_btn">Add</button>
                                </div>

                                {{-- Items List Table --}}
                                <div class="col-md-12 mt-3">
                                    <label>Buttons Preview</label>
                                    <table class="table table-bordered" id="buttons_table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Button Name</th>
                                                <th>Button Link</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>

                                {{-- Logo Upload --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Logo <span class="tx-danger"></span></label>
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

    // Button Name + Link Add & Table Preview
   // Button Name + Link Add & Table Preview
   let counter = 1;

document.getElementById('add_button_btn').addEventListener('click', function () {
    const nameInput = document.getElementById('button_name_input');
    const linkInput = document.getElementById('button_link_input');
    const name = nameInput.value.trim();
    const link = linkInput.value.trim();
    const tableBody = document.querySelector('#buttons_table tbody');

    if (name && link) {
        // Create table row
        const row = document.createElement('tr');
        row.innerHTML = `
    <td>${counter++}</td>
    <td>
        ${name}
        <input type="hidden" name="button_names[]" value="${name}">
    </td>
    <td>
        <a href="${link}" target="_blank">${link}</a>
        <input type="hidden" name="button_links[]" value="${link}">
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-sm remove-btn">Remove</button>
    </td>
`;
document.querySelector('form').addEventListener('submit', function(e){
    e.preventDefault(); // prevent actual submission
    const formData = new FormData(this);
    for(let pair of formData.entries()){
        console.log(pair[0]+ ': '+ pair[1]);
    }
});


        tableBody.appendChild(row);

        // Clear inputs
        nameInput.value = '';
        linkInput.value = '';
    } else {
        alert('Please enter both button name and link.');
    }
});

// Remove row
document.querySelector('#buttons_table').addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-btn')) {
        e.target.closest('tr').remove();
    }
});


</script>
@endpush