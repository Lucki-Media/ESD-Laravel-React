@extends('layouts.master')
@section('title') Collaborate @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Collaborate @endslot
@endcomponent

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

<div class="row">
    <!-- Heading Quote Start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Heading Quote</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{url('admin\update_heading').'/collaborate'}}" class="btn btn-primary "><i class="ri-edit-box-line  align-bottom me-1"></i> Edit</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted">{{ \App\Models\Headings::where('type','collaborate')->value('heading')}}</p>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <!-- Heading Quote End -->
</div>
<!--end row-->
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
