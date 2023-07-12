@extends('layouts.master')
@section('title') Edit Partner @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Partners @endslot
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
                <h4 class="card-title mb-0 flex-grow-1">Update Partner</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "><i
                                class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form class="row g-3 needs-validation" method="POST"
                        action="{!!url('admin/update_link/'.$data['id'])!!}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Partner</label>
                            <input type='text' name="partner" class="form-control" id="validationCustom01"
                                placeholder="Enter Partner Here..." value="{{$data['partner']}}" required>
                            <div class="invalid-feedback">
                                Please enter data in the Partner field.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">Link</label>
                            <input type='text' name="link" class="form-control" id="validationCustom02"
                                placeholder="Enter Link Here..." value="{{$data['link']}}" required>
                            <div class="invalid-feedback">
                                Please enter data in the Link field.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">Location</label>
                            <input type='text' name="location" class="form-control" id="validationCustom02"
                                placeholder="Enter Location Here..." value="{{$data['location']}}" required>
                            <div class="invalid-feedback">
                                Please enter data in the Location field.
                            </div>
                        </div>


                        <!-- <div class="mb-3">
                            <label for="cleave-date-format" class="form-label">Year</label>
                            <input type="text" class="form-control" name="year" placeholder="MM/YY"
                                value="{{$data['year']}}" id="cleave-date-format " required>
                            <div class="invalid-feedback">
                                Please enter data in the Year field.
                            </div>
                        </div> -->

                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label">Services</label>
                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                data-choices-removeItem name="services[]" multiple>
                                <?php $serviceTag = explode(',', $data['services'])?>
                                @foreach ($services as $value)
                                <option value="{{$value['id']}}"
                                    {{(in_array($value['id'], $serviceTag))  ? 'selected' : ""}}>
                                    {{$value['title']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label">Projects</label>
                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                data-choices-removeItem name="projects[]" multiple>
                                <?php $projectTag = explode(',', $data['projects'])?>
                                @foreach ($projects as $project)
                                <option value="{{$project['id']}}"
                                    {{(in_array($project['id'], $projectTag))  ? 'selected' : ""}}>
                                    {{$project['title']}}</option>
                                @endforeach
                            </select>
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
    <script src="{{ URL::asset('build/libs/cleave.js/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-masks.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection