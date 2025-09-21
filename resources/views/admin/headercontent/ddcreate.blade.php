@extends('layouts.admin')

@section('title')
    Dropdown-menu | Create
@endsection

@section('page-info')
    <div class="br-pagetitle">
        <i class="ion-ios-list tx-28"></i>
        <div>
            <h4>Dropdown-menu | Create</h4>
            <p class="mg-b-0">Here is dropdown-menu entry form</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12 mg-t-20 mg-xl-t-0">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('admin.dropdown.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">

                                {{-- Dropdown Button Name --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Dropdown Button Name <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" id="dropdown_button_name" name="dropdown_button_name" value="{{ old('dropdown_button_name') }}" required>
                                        @error('dropdown_button_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Category Selection --}}

                                {{-- Category Input --}}
<div class="col-md-6">
    <div class="form-group">
        <label class="form-control-label">Category <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="category_id" value="{{ old('category') }}" placeholder="Enter Category" required>
        @error('category')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

  {{-- Title --}}
  <div class="col-md-6">
    <div class="form-group">
        <label class="form-control-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title" >
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

{{-- Content --}}
<div class="col-md-12">
    <div class="form-group">
        <label class="form-control-label">Content</label>
        <textarea class="form-control" name="content" rows="4" placeholder="Enter dropdown info content" required>{{ old('content') }}</textarea>
        @error('content')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

                                {{-- Dropdown Item Input with Add Button --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Dropdown Item <span class="tx-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="dropdown_item_input">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="add_item_btn">Add Item</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Dropdown Preview --}}
                                <div class="col-md-12 mt-3">
                                    <label>Dropdown Preview</label>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownPreviewBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown Menu
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownPreviewBtn" id="dropdownPreviewMenu">
                                            <!-- Items will be added here dynamically -->
                                        </div>
                                    </div>
                                </div>

                                {{-- Items List Table --}}
                                <div class="col-md-12 mt-3">
                                    <label>Items</label>
                                    <table class="table table-bordered" id="items_table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Item Name</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>

                                {{-- Hidden Inputs Container for Laravel --}}
                                <div id="hidden_inputs_container"></div>

                                {{-- Image --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Image</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Link --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Link</label>
                                    <input type="url" class="form-control" name="link" value="{{ old('link') }}" placeholder="Enter link (optional)">
                                    @error('link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                                {{-- Status --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
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
                                <button type="submit" class="btn btn-info">Save Dropdown</button>
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
        let items = [];

        // Add item to list
        document.getElementById('add_item_btn').addEventListener('click', function() {
            const input = document.getElementById('dropdown_item_input');
            const value = input.value.trim();
            if (value !== '') {
                items.push(value);
                updateTable();
                input.value = '';
            }
        });

        // Update table, hidden inputs, and dropdown preview
        function updateTable() {
            const tableBody = document.querySelector('#items_table tbody');
            const hiddenContainer = document.getElementById('hidden_inputs_container');
            const previewMenu = document.getElementById('dropdownPreviewMenu');
            const previewBtn = document.getElementById('dropdownPreviewBtn');
            const dropdownName = document.getElementById('dropdown_button_name').value.trim();

            tableBody.innerHTML = '';
            hiddenContainer.innerHTML = '';
            previewMenu.innerHTML = '';

            // Update dropdown button name in preview
            previewBtn.textContent = dropdownName || 'Dropdown Menu';

            items.forEach((item, index) => {
                // Table
                tableBody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${document.querySelector('input[name="category_id"]').value}</td>
                        <td>${item}</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeItem(${index})">❌</button></td>
                    </tr>
                `;

                // Hidden input for Laravel
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'dropdown_items[]';
                input.value = item;
                hiddenContainer.appendChild(input);

                // Dropdown preview item
                const menuItem = document.createElement('a');
                menuItem.classList.add('dropdown-item');
                menuItem.href = "#";
                menuItem.textContent = item;
                previewMenu.appendChild(menuItem);
            });
        }

        // Update preview name live
        document.getElementById('dropdown_button_name').addEventListener('input', updateTable);

        // Remove item from list
        function removeItem(index) {
            items.splice(index, 1);
            updateTable();
        }
    </script>
@endpush