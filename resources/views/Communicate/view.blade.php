@extends('layouts.master')
@section('title') Communicate @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Communicate @endslot
@endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Message Details</h4>
                 <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{ url()->previous() }}" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                     </div>
                </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="d-flex align-items-start text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Full Name</h5>
                                <p class="mb-1">{{$data['full_name']}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Company Name</h5>
                                <p class="mb-1">{{$data['company_name']}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-end text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Email</h5>
                                <p class="mb-1">{{$data['email']}}</p>
                            </div>
                        </div>

                        
                        <div class="d-flex align-items-start text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Contact Number</h5>
                                <p class="mb-1">{{$data['contact_number']}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Project</h5>
                                <p class="mb-1">{{$data['project']}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-end text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Message</h5>
                                <p class="mb-1">{{$data['message']}}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-end text-muted">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Sent date</h5>
                                <p class="mb-1"><?php echo \Carbon\Carbon::parse($data['created_at'])->format('d F,Y');?></p>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
