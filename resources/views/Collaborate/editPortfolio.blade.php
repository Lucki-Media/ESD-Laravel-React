@extends('layouts.master')
@section('title') Edit Portfolio @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Portfolio @endslot
@endcomponent
<form class="row g-3 needs-validatin" method="POST"  enctype="multipart/form-data" action="{{url('admin/update_portfolio/'.$portfolio['id'])}}" novalidate>
@csrf
    
        
    <div class="row">
        @if(session()->has('success'))
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
                        <input type="text"  name="title" class="form-control" id="project-title-input" placeholder="Enter project title" value="{{$portfolio['title']}}" required>
                        <div class="invalid-feedback">
                            Please enter data in the Title field.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>
                        <input class="form-control" id="project-thumbnail-img" type="file" name="logo_image"
                            accept="image/png, image/gif, image/jpeg"  onchange="previewImage(event)">
                        <div style="margin-top: 15px;">
                            <div class="col-md-4 col-lg-2 mb-3">
                                <?php
                                if($portfolio['logo_image'] != null){
                                    $src = URL::asset('thumbnail/'.$portfolio['logo_image']);
                                }else{
                                    $src = URL::asset('images\noimage.png');
                                } ?>
                                <div class="card">
                                    <img id="preview"  class="card-img" width="100px"  src="<?php echo $src;?>"  />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="validation" class="form-label">Content</label>
                        <div class="snow-editor"  id="snow_editor" style="height: 300px;">
                            {!!$portfolio['content']!!}
                        </div> <!-- end Snow-editor-->
                        <input type="hidden" name="content" id="snow_picker_content">
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3 mb-lg-0">
                                <label for="choices-priority-input" class="form-label">Priority</label>
                                <select class="form-select" data-choices data-choices-search-false
                                    id="choices-priority-input" name="priority">
                                    <option value="1" @if($portfolio['priority'] == '1') selected @endif>Portfolio</option>
                                    <option value="2" @if($portfolio['priority'] == '2') selected @endif>Archived</option>
                                </select>   
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3 mb-lg-0">
                                <label for="choices-status-input" class="form-label">Status</label>
                                <select class="form-select" data-choices data-choices-search-false
                                    id="choices-status-input" name="show_details">
                                    <option value="1"  @if($portfolio['show_details'] == '1') selected @endif>Public</option>
                                    <option value="2"  @if($portfolio['show_details'] == '1') selected @endif>Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <label for="datepicker-deadline-input" class="form-label">Year</label>
                                <input type="text" class="form-control" name="year" placeholder="YYYY"
                                value="{{$portfolio['year']}}" id="date-format " required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <!-- <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Attach Images</h5>
                </div>
                <div class="card-body">
                    <div>
                        <p class="text-muted">Add Images here.</p>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="image[]" type="file" accept="image/*" multiple="multiple" >
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            @foreach ($images as $value)
                            <li class="mt-2" id="dropzone-preview-list">
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img src="{{ URL::asset('thumbnail/'.$value) }}" alt="Project-Image" data-dz-thumbnail
                                                    class="img-fluid rounded d-block" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- end card -->
            <div class="text-end mb-4">
                <a href="{{url('admin/collaborate_portfolio')}}" class="btn btn-danger w-sm">Cancel</a>
                <button type="submit" class="btn btn-primary w-sm">Update</button>
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
                            <?php $serviceTag = explode(',', $portfolio['services'])?>
                                @foreach ($services as $value)
                                <option value="{{$value['id']}}"
                                    {{(in_array($value['id'], $serviceTag))  ? 'selected' : ""}}>
                                    {{$value['title']}}</option>
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
                            <?php $partnerTag = explode(',', $portfolio['partners'])?>
                                @foreach ($parners as $value)
                                <option value="{{$value['id']}}" {{(in_array($value['id'], $partnerTag))  ? 'selected' : ""}}>
                                    {{$value['partner']}}</option>
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
        });
        </script>
<script>
function previewImage(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var preview = document.getElementById('preview');
    preview.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
