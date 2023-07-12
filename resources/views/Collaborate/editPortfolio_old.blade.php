@extends('layouts.master')
@section('title') Edit Portfolio @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
     <ink href="{{ URL::asset('build/libs/quill/quillbubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Portfolio @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">

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
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit Portfolio</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form class="row g-3 needs-validation" method="POST"  enctype="multipart/form-data" action="{{url('admin/update_portfolio/'.$portfolio['id'])}}" novalidate>
                        @csrf
                        <div class="">
                            <label for="validationCustom01" class="form-label">Title</label>
                            <input type='text' name="title" class="form-control" id="validationCustom01" placeholder="Enter Title Here..." value="{{$portfolio['title']}}" required>
                            <div class="invalid-feedback">
                                Please enter data in the Title field.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="validation" class="form-label">Content</label>
                            <div class="snow-editor"  id="snow_editor" style="height: 300px;">
                                {!!$portfolio['content']!!}
                            </div> <!-- end Snow-editor-->
                            <input type="hidden" name="content" id="snow_picker_content">
                        </div>

                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label">Partners</label>
                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                data-choices-removeItem name="partners[]" multiple>
                                <?php $partnerTag = explode(',', $portfolio['partners'])?>
                                @foreach ($parners as $value)
                                <option value="{{$value['id']}}" {{(in_array($value['id'], $partnerTag))  ? 'selected' : ""}}>
                                    {{$value['partner']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label">Services</label>
                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                data-choices-removeItem name="services[]" multiple>
                                <?php $serviceTag = explode(',', $portfolio['services'])?>
                                @foreach ($services as $value)
                                <option value="{{$value['id']}}"
                                    {{(in_array($value['id'], $serviceTag))  ? 'selected' : ""}}>
                                    {{$value['service']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date-format" class="form-label">Year</label>
                            <input type="text" class="form-control" name="year" placeholder="YYYY"
                                value="{{$portfolio['year']}}" id="date-format " required>
                            <div class="invalid-feedback">
                                Please enter data in the Year field.
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Multiple Files Input Example -->
                            <label for="formFileMultiple" class="form-label">Images</label>
                            <div style="margin-bottom: 15px;" class="row">
                                @foreach ($images as $value)
                                    <div class="col-md-4 col-lg-2 mb-3">
                                        <div class="card h-100 selected">
                                            <img  class="card-img-top"  src="{{ URL::asset('thumbnail/'.$value) }}"  />
                                            <div class="card-body p-1">
                                                <a href="{{url('admin/delete_image/'.$portfolio['id'].'/'.$value)}}" class="btn btn-outline-danger d-flex justify-content-center">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <input class="form-control" type="file"  name='image[]' id="formFileMultiple" accept="image/png, image/jpeg, image/gif" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Status</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="status" value="portfolio" id="status1" @if($portfolio['status'] == 'portfolio') checked @endif>
                                <label class="form-check-label" for="status1">
                                    Porfolio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="archive" id="status2" @if($portfolio['status'] == 'archive') checked @endif>
                                <label class="form-check-label" for="status2">
                                    Archived
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Show details or not ?</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="show_details" value="yes" id="show1" @if($portfolio['show_details'] == 'yes') checked @endif>
                                <label class="form-check-label" for="show1">
                                    Show
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="show_details" value="no" id="show2" @if($portfolio['show_details'] == 'no') checked @endif>
                                <label class="form-check-label" for="show2">
                                    Don't show
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    @endsection
    @section('script')
        <script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
        <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        $(document).ready(function() {
            var data = $("#feature_input").html();
            $('#add_feature').on( 'click', function () {
                var newData = data.replace(/value=".*?"/g, 'value=""');
                $('#feature_input').after(newData);
                // console.log(data);
            });
        });
        </script>
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
    @endsection