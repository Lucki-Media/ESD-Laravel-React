@extends('layouts.master')
@section('title') Add Topic @endsection
@section('css')
<link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Topic @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">

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
                <h4 class="card-title mb-0 flex-grow-1">Add Topic</h4>
                <div class="flex-shrink-0">
                    <div class="for-check form-switch form-switch-right form-switch-md">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form class="row g-3 needs-validation" method="POST"
                        action="{!!route('admin.set_content')!!}" novalidate>
                        @csrf
                        <input type='hidden' name="page"  value="{{$page}}">
                        <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Type</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="type" value="content" id="type1" required>
                                <label class="form-check-label" for="type1">
                                    Content
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="type" value="module" id="type2" required>
                                <label class="form-check-label" for="type2">
                                    Module
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="form" id="type3" required>
                                <label class="form-check-label" for="type3">
                                    Contact Form
                                </label>
                                <div class="invalid-feedback">Choose one of the type</div>
                            </div>
                        </div>

                        
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Title</label>
                            <input type='text' name="title" class="form-control" id="validationCustom01"
                                placeholder="Enter Title Here..." value="{{old('title')}}">
                            <div class="invalid-feedback">Please enter data in the Title field.</div>
                        </div>

                        <div id="show_content" style="display:none;">
                            <div class="mb-3">
                                <label for="validation" class="form-label">Description</label>
                                <div class="snow-editor" id="snow_editor" style="height: 300px;">
                                    <p><span>Hello World!</span></p>
                                </div> <!-- end Snow-editor-->
                                <input type="hidden" name="snow_picker_content" id="snow_picker_content">
                            </div>
                        </div>

                        <div id="show_module" style="display:none;">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Module</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="module" value="portfolio" id="module1">
                                    <label class="form-check-label" for="module1">
                                        Portfolio
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="module" value="archive" id="module4">
                                    <label class="form-check-label" for="module4">
                                        Archive
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="module" value="service" id="module2">
                                    <label class="form-check-label" for="module2">
                                        Service
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="module" value="partner" id="module3">
                                    <label class="form-check-label" for="module3">
                                        Partner
                                    </label>
                                    <div class="invalid-feedback">Choose one of the module</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    @endsection
    @section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

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

        $('input[type=radio][name=type]').change(function() {
            if (this.value == 'content') {
                $('#show_content').show();
                $('#show_module').hide();
            }
            else if (this.value == 'module') {
                $('#show_content').hide();
                $('#show_module').show();
            } else if (this.value == 'form') {
                $('#show_content').hide();
                $('#show_module').hide();
            } 
        });
    });
    </script>
    @endsection