@extends('layouts.master')
@section('title') Add Service Link @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Service Links @endslot
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
                <h4 class="card-title mb-0 flex-grow-1">Add Service Link</h4>
                 <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form class="row g-3 needs-validation" method="POST"  action="{!!route('admin.save_serviceLink')!!}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Service</label>
                             <select class="form-select" required aria-label="select example" name="service">
                                <option value="">Select Service</option>
                                @foreach($services as $service)
                                    <option value="{{$service['id']}}" {{$service['id'] == old('service') ? 'selected' : ""}}>{{$service['service']}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select any Service.
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Title</label>
                            <input type='text' name="title" class="form-control" id="validationCustom01" placeholder="Enter Title Here..." value="{{old('title')}}" required>
                            <div class="invalid-feedback">
                                Please enter data in the Title field.
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">Link</label>
                            <input type='text' name="link" class="form-control" id="validationCustom02" placeholder="Enter Link Here..." value="{{old('link')}}" required>
                            <div class="invalid-feedback">
                                Please enter data in the Link field.
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
    @endsection
