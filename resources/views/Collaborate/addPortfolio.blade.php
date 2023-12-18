@extends('layouts.master')
@section('title')
    Add Portfolio
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            ERGOSUMDEUS
        @endslot
        @slot('title')
            Portfolio
        @endslot
    @endcomponent
    <form class="row g-3 needs-validatin" method="POST" enctype="multipart/form-data" action="{!! route('admin.save_portfolio') !!}"
        novalidate>
        @csrf


        <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="project-title-input">Project Title</label>
                            <input type="text" name="title" class="form-control" id="project-title-input"
                                placeholder="Enter project title" value="{{ old('title') }}" required>
                            <div class="invalid-feedback">
                                Please enter data in the Title field.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>
                            <input class="form-control" id="project-thumbnail-img" type="file" name="logo_image"
                                accept="image/png, image/jpg, image/gif, image/jpeg">
                        </div>

                        <div class="mb-3">
                            <label for="validation" class="form-label">Content</label>
                            <div class="snow-editor" id="snow_editor" style="height: 300px;">
                                <p><span>Hello World!</span></p>
                            </div> <!-- end Snow-editor-->
                            <input type="hidden" name="content" id="snow_picker_content">
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="inputPriority" class="form-label">Priority</label>
                                    <select class="form-select" data-choices-search-false id="inputPriority"
                                        name="priority">
                                        <option value="1" selected>Portfolio</option>
                                        <option value="2">Archived</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="inputStatus" class="form-label">Status</label>
                                    <select class="form-select" data-choices-search-false id="inputStatus"
                                        name="show_details">
                                        <option value="1" selected>Public</option>
                                        <!-- <option value="2">Private</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Year</label>
                                    <input type="text" class="form-control" name="year" placeholder="YYYY"
                                        value="{{ old('year') }}" id="date-format " required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <!-- <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Attach Images</h4>
                                    </div>

                                    <div class="card-body">
                                        <p class="text-muted">Add Images here.</p>
                                        <input type="file" class="filepond filepond-input-multiple" multiple name="image[]"
                                        accept="image/png, image/gif, image/jpeg" data-allow-reorder="true" data-max-file-size="10MB" data-max-files="10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div> -->

                <div class="text-end mb-4">
                    <a href="{{ url('admin/collaborate_portfolio') }}" class="btn btn-danger w-sm">Cancel</a>
                    <button type="submit" class="btn btn-primary w-sm">Create</button>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-4">
                <!-- <div class="card">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title mb-0">Privacy</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div>
                                                                            <label for="choices-privacy-status-input" class="form-label">Status</label>
                                                                            <select class="form-select" data-choices data-choices-search-false
                                                                                id="choices-privacy-status-input">
                                                                                <option value="Private" selected>Private</option>
                                                                                <option value="Team">Team</option>
                                                                                <option value="Public">Public</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Services</h5>
                    </div>
                    <div class="card-body">
                        <!-- <div class="mb-3">
                                                                            <label for="choices-categories-input" class="form-label">Categories</label>
                                                                            <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                                                                                <option value="Designing" selected>Designing</option>
                                                                                <option value="Development">Development</option>
                                                                            </select>
                                                                        </div> -->

                        <div>
                            <!-- <label for="choices-text-input" class="form-label">Services</label> -->
                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                data-choices-removeItem name="services[]" multiple>
                                @foreach ($services as $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Partners</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <!-- <label for="choices-multiple-remove-button" class="form-label">Partners</label> -->
                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                data-choices-removeItem name="partners[]" multiple>
                                @foreach ($parners as $value)
                                    <option value="{{ $value['id'] }}">
                                        {{ $value['partner'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <div>
                                <label class="form-label">Team Members</label>
                                <div class="avatar-group">
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                        <div class="avatar-xs">
                                            <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle img-fluid">
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded-circle text-bg-primary">
                                                S
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                        <div class="avatar-xs">
                                            <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle img-fluid">
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-placement="top" title="Add Members">
                                        <div class="avatar-xs" data-bs-toggle="modal" data-bs-target="#inviteMembersModal">
                                            <div
                                                class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                +
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card" id="order_id_div">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Order Number</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="number" name="order_number" class="form-control" id="project-order-input"
                                placeholder="Enter Order Number" value="{{ old('order_number') }}">
                        </div>
                    </div>
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </form>

@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/project-create.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/form-file-upload.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var content = $('#snow_editor').find('div:first').html();
            $('#snow_picker_content').val(content); // Update the hidden input field
            // console.log(content);

            $('#snow_editor').on('DOMSubtreeModified', function() {
                content = $(this).find('div:first').html();
                $('#snow_picker_content').val(content); // Update the hidden input field
                // console.log(content);
            });

            $('#inputPriority').on('change', function() {
                // Get the selected value from the first select element
                const selectedValue = $(this).val();
                // Clear the existing options
                $('#inputStatus').empty();

                // Add options based on the selected value
                if (selectedValue === '1') {
                    $("#order_id_div").show();
                    // Append the 'Public' option
                    $('#inputStatus').append($('<option>', {
                        value: '1',
                        text: 'Public'
                    }));
                    // console.log($('#inputStatus').html());
                } else if (selectedValue === '2') {
                    // Append the 'Public' option
                    $("#order_id_div").hide();
                    $('#inputStatus').append($('<option>', {
                        value: '1',
                        text: 'Public'
                    }));

                    // Append the 'Private' option
                    $('#inputStatus').append($('<option>', {
                        value: '2',
                        text: 'Private'
                    }));
                    // console.log($('#inputStatus').html());
                }
            });
        });
    </script>
@endsection
