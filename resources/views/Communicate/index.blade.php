@extends('layouts.master')
@section('title') @lang('translation.mailbox') @endsection
@section('content')




<div class="email-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="email-menu-sidebar border">
        <div class="p-4 d-flex flex-column h-100">
            <div class="pb-4 border-bottom border-bottom-dashed">
                <button type="button" class="btn btn-danger w-100" > Inquiries</button>
            </div>

            <div class="mx-n4 px-4 email-menu-sidebar-scroll" data-simplebar>
                <div>
                    <!-- <h5 class="fs-12 text-uppercase text-muted mt-4">Labels</h5> -->

                    <div class="mail-list mt-1">
                        <a href="#"><span class="ri-checkbox-blank-circle-line me-2 text-info"></span><span class="mail-list-link" data-type="label">Support</span> <span class="badge badge-soft-success ms-auto">3</span></a>
                        <a href="#"><span class="ri-checkbox-blank-circle-line me-2 text-warning"></span><span class="mail-list-link" data-type="label">Freelance</span></a>
                        <a href="#"><span class="ri-checkbox-blank-circle-line me-2 text-primary"></span><span class="mail-list-link" data-type="label">Social</span></a>
                        <a href="#"><span class="ri-checkbox-blank-circle-line me-2 text-danger"></span><span class="mail-list-link" data-type="label">Friends</span><span class="badge badge-soft-success ms-auto">2</span></a>
                        <a href="#"><span class="ri-checkbox-blank-circle-line me-2 text-success"></span><span class="mail-list-link" data-type="label">Family</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end email-menu-sidebar -->

    <div class="email-content borderless">
        <div class="p-4 pb-0">
            <div class="border-bottom border-bottom-dashed">
                <div class="row mt-n2 mb-3 mb-sm-0">
                    <div class="col col-sm-auto order-1 d-block d-lg-none">
                        <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 email-menu-btn">
                            <i class="ri-menu-2-fill align-bottom"></i>
                        </button>
                    </div>
                    <div class="col-sm order-3 order-sm-2"  style="display:none;">
                        <div class="hstack gap-sm-1 align-items-center flex-wrap email-topbar-link">
                            <div class="form-check fs-14 m-0">
                                <input class="form-check-input" type="checkbox" value="" id="checkall" style="display:none;">
                                <!-- <label class="form-check-label" for="checkall"></label> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-end">
                    <div class="col">
                        <div id="mail-filter-navlist">
                            <ul class="nav nav-tabs nav-tabs-custom nav-primary gap-1 text-center border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link fw-semibold active" id="pills-primary-tab" data-bs-toggle="pill" data-bs-target="#pills-primary" type="button" role="tab" aria-controls="pills-primary" aria-selected="true">
                                        <i class="ri-inbox-fill align-bottom d-inline-block"></i>
                                        <span class="ms-1 d-none d-sm-inline-block">Primary</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <button class="btn btn-ghost-secondary btn-icon btn-sm text-muted mb-2 fs-16" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-fill align-bottom"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" id="mark-all-read">Mark all as Read</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-auto">
                        <div class="text-muted mb-2">1-50 of 154</div>
                    </div> -->
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-primary" role="tabpanel" aria-labelledby="pills-primary-tab">
                    <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                        <div id="elmLoader">
                            <div class="spinner-border text-primary avatar-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <ul class="message-list" id="mail-list"></ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
                    <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                        <ul class="message-list" id="social-mail-list"></ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-promotions" role="tabpanel" aria-labelledby="pills-promotions-tab">
                    <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                        <ul class="message-list" id="promotions-mail-list"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end email-content -->

    <div class="email-detail-content border">
        <div class="p-4 d-flex flex-column h-100">
            <div class="pb-4 border-bottom border-bottom-dashed">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <button type="button" class="btn btn-soft-danger btn-icon btn-sm fs-16 close-btn-email" id="close-btn-email">
                                <i class="ri-close-fill align-bottom"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="hstack gap-sm-1 align-items-center flex-wrap email-topbar-link">
                            <!-- <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm fs-16 favourite-btn active">
                                <i class="ri-star-fill align-bottom"></i>
                            </button>
                            <button class="btn btn-ghost-secondary btn-icon btn-sm fs-16">
                                <i class="ri-printer-fill align-bottom"></i>
                            </button>
                            <button class="btn btn-ghost-secondary btn-icon btn-sm fs-16 remove-mail" data-remove-id=""  data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                <i class="ri-delete-bin-5-fill align-bottom"></i>
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-ghost-secondary btn-icon btn-sm fs-16" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-2-fill align-bottom"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Mark as Unread</a>
                                    <a class="dropdown-item" href="#">Mark as Important</a>
                                    <a class="dropdown-item" href="#">Add to Tasks</a>
                                    <a class="dropdown-item" href="#">Add Star</a>
                                    <a class="dropdown-item" href="#">Mute</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-n4 px-4 email-detail-content-scroll" data-simplebar>
                <div class="mt-4 mb-3">
                    <h5 class="fw-bold email-subject-title">New updates for Skote Theme</h5>
                </div>

                <div class="accordion accordion-flush">
                    <div class="accordion-item border-dashed left">
                        <div id="email-collapseOne" class="accordion-collapse collapse">
                            <div class="accordion-body text-body px-0">
                                <div>
                                    <p>Hi,</p>
                                    <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor.
                                    </p>
                                    <p>Sed elementum turpis eu lorem interdum, sed porttitor eros commodo. Nam eu venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed bibendum orci non tincidunt ultrices.</p>
                                    <p>Sincerly,</p>

                                    <div class="d-flex gap-3">
                                        <div class="border rounded avatar-xl h-auto">
                                            <img src="{{ URL::asset('build/images/small/img-2.jpg') }}" alt="" class="img-fluid rouned-top">
                                            <div class="py-2 text-center">
                                                <a href="" class="d-block fw-semibold">Download</a>
                                            </div>
                                        </div>
                                        <div class="border rounded avatar-xl h-auto">
                                            <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt="" class="img-fluid rouned-top">
                                            <div class="py-2 text-center">
                                                <a href="" class="d-block fw-semibold">Download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->

                    <div class="accordion-item border-dashed left">
                        <div class="accordion-header">
                            <a role="button" class="btn w-100 text-start px-0 bg-transparent shadow-none"
                                data-bs-toggle="collapse" href="#email-collapseThree"
                                aria-expanded="true" aria-controls="email-collapseThree">
                                <div class="d-flex align-items-center text-muted">
                                    <!-- <div class="flex-shrink-0 avatar-xs me-3">
                                        <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt="" class="img-fluid rounded-circle">
                                    </div> -->
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate email-user-name mb-0">Jack Davis</h5>
                                        <div class="text-truncate fs-12">to: me</div>
                                    </div>
                                    <div class="flex-shrink-0 align-self-start">
                                        <div class="text-muted fs-12">10 Jan 2022, 10:08 AM</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="email-collapseThree" class="accordion-collapse collapse show">
                            <div class="accordion-body text-body px-0">
                                <div>
                                    <p>Hi,</p>
                                    <p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar pronunciation.</p>
                                    <p>Thank you</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->
                </div>
                <!-- end accordion -->
            </div>
            </div>
    </div>
    <!-- end email-detail-content -->
</div>
<!-- end email wrapper -->

<!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you Sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@section('script')
<!-- <script src="{{ URL::asset('public/build/json/mail-list.init.json') }}"></script> -->
<script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/mailbox.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
