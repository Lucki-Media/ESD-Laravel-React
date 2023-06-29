@extends('layouts.master')
@section('title') Update Heading @endsection
@section('content')
<div class="row">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Update Heading</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div>

            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form class="row g-3 needs-validation" method="POST"  action="{!!route('admin.heading_update')!!}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Heading</label>
                            <input type='hidden' name="type" value="{{$type}}">
                            <textarea class="form-control" id="validationTextarea" placeholder="Enter Heading Here..." name="heading"
                                required>{{ $heading }}</textarea>
                            <div class="invalid-feedback">
                                Please enter data in the textarea.
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
        <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
