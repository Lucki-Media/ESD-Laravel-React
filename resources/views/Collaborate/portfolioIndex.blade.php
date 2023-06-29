@extends('layouts.master')
@section('title') Collaborate @endsection
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
@slot('title')Collaborate @endslot
@endcomponent

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
                            <th data-ordering="false">ID</th>
                            <th data-ordering="false" width="50%">Title</th>
                            <th>Create Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (count($portfolio) == 0) { ?>
                        <tr>
                            <td colspan="6" style="text-align: center;"> Oopps! No Data Found!</td>
                        </tr>
                        <?php 
                        }else{ ?>
                        @foreach ($portfolio as $topic)
                        <tr>
                            <td>{{$topic['id']}}</td>
                            <td>{{$topic['title']}}</td>
                            <td><?php echo \Carbon\Carbon::parse($topic['created_at'])->format('d F,Y');?></td>
                            <td><span class="badge badge-soft-{{$topic['status'] == 'portfolio' ? 'success' : 'secondary'}}">{{$topic['status'] == 'portfolio' ? 'Portfolio' : 'Archive'}}</span></td>
                            <!-- <td><span class="badge badge-soft-success">New</span></td> -->
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button> 
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="{{url('admin/view_portfolio/'.$topic['id'])}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a href="{{url('admin/edit_portfolio/'.$topic['id'])}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <a href="{{url('admin/delete_portfolio/'.$topic['id'])}}" class="dropdown-item remove-item-btn">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
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
