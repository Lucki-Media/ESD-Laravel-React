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

<div class="row">
    <!-- Links Start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Partners</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{url('admin\add_converge_link')}}" class="btn btn-primary "><i
                                class="ri-add-line  align-bottom me-1"></i> Add</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" width="20%">Partner</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Location</th>
                                    <!-- <th scope="col">Year</th> -->
                                    <th scope="col">Services</th>
                                    <th scope="col">Projects</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (count($link_data) == 0) { ?>
                                <tr>
                                    <td colspan="9" style="text-align: center;"> Oopps! No Data Found!</td>
                                </tr>
                                <?php 
                                }else{ ?>
                                @foreach ($link_data as $link)
                                <tr class="align-top">
                                    <td>{{$link['partner']}} </td>
                                    <td><a href="{{$link['link']}}">{{$link['link']}}</a></td>
                                    <td>{{$link['location']}} </td>
                                    <!-- <td>{{$link['year']}} </td> -->
                                    <td>
                                        <?php $serviceTag = explode(',', $link['services'])?>
                                        @foreach ($serviceTag as $tag)
                                        <h5><span
                                                class="badge text-bg-primary">{{ \App\Models\Service::where('id',$tag)->value('service')}}</span>
                                        </h5>
                                        @endforeach
                                    </td>
                                    <td>
                                        <?php $projectTag = explode(',', $link['projects'])?>
                                        @foreach ($projectTag as $project)
                                        <h5><span
                                                class="badge text-bg-primary">{{ \App\Models\Portfolio::where('id',$project)->value('title')}}</span>
                                        </h5>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="{{url('admin/edit_link/'.$link['id'])}}"
                                                    class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <a href="{{url('admin/delete_link/'.$link['id'])}}"
                                                    class="btn btn-sm btn-danger remove-item-btn">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- Links End -->
</div>
<!--end row-->
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection