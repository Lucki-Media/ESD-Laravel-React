@extends('layouts.master')
@section('title') Partners @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Partners @endslot
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

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-4">
                <div class="search-box">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Search for name or designation...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <!--end col-->
            <div class="col-sm-auto ms-auto">
                <div class="list-grid-nav hstack gap-1">
                    <button type="button" id="grid-view-button" class="btn btn-soft-secondary nav-link btn-icon fs-14 active filter-button"><i class="ri-grid-fill"></i></button>
                    <button type="button" id="list-view-button" class="btn btn-soft-secondary nav-link  btn-icon fs-14 filter-button"><i class="ri-list-unordered"></i></button>
                    <!-- <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                        <li><a class="dropdown-item" href="#">All</a></li>
                        <li><a class="dropdown-item" href="#">Last Week</a></li>
                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                    </ul> -->
                    <a href="{{url('admin\add_converge_link')}}" class="btn btn-primary addMembers-modal" ><i class="ri-add-fill me-1 align-bottom"></i> Add Partners</a >
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div>

            <div id="teamlist">
                <div class="team-list grid-view-filter row" id="team-member-list">
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-end mt-4 col-sm-12">
                    {{-- {!! $portfolio->appends(['search_project' => $search_project])->links() !!} --}}
                </div>
                <!-- <div class="text-center mb-3">
                    <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </a>
                </div> -->
            </div>
            <div class="py-4 mt-4 text-center" id="noresult" style="display: none;">
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
                <h5 class="mt-4">Sorry! No Result Found</h5>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!--end row-->

@endsection
@section('script')
<script src="{{ URL::asset('build/js/pages/team.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
