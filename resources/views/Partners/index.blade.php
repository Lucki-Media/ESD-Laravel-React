@extends('layouts.master')
@section('title') Partners @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
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
    <div class="col-lg-12">
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
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1">Portfolio</h5>
                <div>
                    <a href="{{url('admin\add_portfolio')}}" class="btn btn-primary "><i class="ri-add-line  align-bottom me-1"></i> Add</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
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
    </div>
    <!--end col-->
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> 
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

<script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection