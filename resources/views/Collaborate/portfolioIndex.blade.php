@extends('layouts.master')
@section('title')  Portfolio @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title') Portfolio @endslot
@endcomponent
 
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ Session()->get('success') }}
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
    <div class="row g-4 mb-3">
        <div class="col-sm-auto">
            <div>
                <a href="{{url('admin/add_portfolio')}}" class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i> Add
                    New</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end gap-2">
                <form class="d-flex" action="{{url('admin/collaborate_portfolio')}}">
                <div class="search-box ms-2 me-2">
                    <input class="form-control me-2" type="search" name="search_project"  value="{{ $search_project }}"  placeholder="Search..." aria-label="Search">
                    <i class="ri-search-line search-icon"></i>
                </div>
                <button class="btn btn-outline-primary" type="submit">Search</button>

                <!-- <select class="form-control w-md" data-choices data-choices-search-false>
                    <option value="1" selected>All</option>
                    <option value="2">Today</option>
                    <option value="3">Yesterday</option>
                    <option value="4">Last 7 Days</option>
                    <option value="5">Last 30 Days</option>
                    <option value="6">This Month</option>
                    <option value="7">Last Year</option>
                </select> -->
                </form>
            </div>
            </div>
    </div>

    <div class="row">
        @foreach ($portfolio as $topic)
        <div class="col-xxl-3 col-sm-6 project-card">
            <div class="card card-height-100">
                <div class="card-body">
                    <div class="d-flex flex-column h-100">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted mb-4">Updated {{ Carbon\Carbon::parse($topic['updated_at'])->diffForHumans() }}</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-1 align-items-center">
                                    <div class="dropdown">
                                        <button class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i data-feather="more-horizontal" class="icon-sm"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="apps-projects-overview"><i
                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                View</a>
                                            <a class="dropdown-item" href="{{url('admin/edit_portfolio/'.$topic['id'])}}"><i
                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-project-id="{{ $topic['id'] }}" data-bs-target="#removeProjectModal"><i
                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-soft-warning rounded p-2">
                                        <img src="{{ URL::asset('build/images/brands/slack.png') }}" alt="" class="img-fluid p-1">
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1 fs-15"><a href="apps-projects-overview"
                                        class="text-dark">{{$topic['title']}}</a></h5>
                                <p class="text-muted text-truncate-two-lines mb-3">
                                    {!! Str::limit(strip_tags($topic['content']), 50) !!}
                                </p>
                            </div>
                        </div>
                        <div class="mt-auto">
                            <div class="d-flex mb-2">
                                <div class="flex-grow-1">
                                    <div>Services</div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div><i class="ri-list-check align-bottom me-1 text-muted"></i>
                                        {{count(explode(',', $topic['services']))}}/{{\App\Models\ServiceLinks::where('deleted_status', '1')->count()}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card body -->
                <div class="card-footer bg-transparent border-top-dashed py-2">
                    <div class="d-flex align-items-center">
                        <!-- <div class="flex-grow-1">
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-placement="top" title="Darline Williams">
                                    <div class="avatar-xxs">
                                        <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle img-fluid">
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-placement="top" title="Add Members">
                                    <div class="avatar-xxs">
                                        <div
                                            class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                            +
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                        <div class="flex-shrink-0">
                            <div class="text-muted">
                                <i class="ri-calendar-event-fill me-1 align-bottom"></i> {{$topic['year']}}
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end card footer -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        @endforeach

    </div>
    <!-- end row -->

    <div class="row g-0 text-center text-sm-start align-items-center mb-4">
        <!-- <div class="col-sm-6">
            <div>
                <p class="mb-sm-0 text-muted">Showing <span class="fw-semibold">1</span> to <span
                        class="fw-semibold">10</span> of <span class="fw-semibold text-decoration-underline">12</span>
                    entries</p>
            </div>
        </div> -->
        <!-- end col -->
        {{-- Pagination --}}
        <div class="d-flex justify-content-end mt-4 col-sm-12">
            {!! $portfolio->appends(['search_project' => $search_project])->links() !!}
        </div>
    </div><!-- end row -->

    <!-- END layout-wrapper -->
    <!-- removeProjectModal -->
    <div id="removeProjectModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Project ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                         <form id="removeProjectForm" method="GET" action="">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn w-sm btn-danger" id="remove-project">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/project-list.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#removeProjectModal').on('show.bs.modal', function(event) {
            var link = $(event.relatedTarget);
            var projectId = link.data('project-id');
            var modal = $(this);
            modal.find('#project_id').val(projectId);
            modal.find('#removeProjectForm').attr('action', '/admin/delete_portfolio/' + projectId);
        });

        $('#removeProjectForm').submit(function() {
            // Additional logic if needed before form submission
        });
    });
    </script>

@endsection
