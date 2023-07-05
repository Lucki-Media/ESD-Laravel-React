@extends('layouts.master')
@section('title') Cogitate @endsection
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
@slot('title')Cogitate @endslot
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
                <h5 class="card-title mb-0 flex-grow-1">Services</h5>
                <div>
                    <a href="{{url('admin\add_service')}}" class="btn btn-primary "><i class="ri-add-line  align-bottom me-1"></i> Add</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th data-ordering="false">ID</th>
                            <th data-ordering="false" width="30%">Service</th>
                            <th data-ordering="false" width="30%">Sub Service</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (count($data) == 0) { ?>
                        <tr>
                            <td colspan="6" style="text-align: center;"> Oopps! No Data Found!</td>
                        </tr>
                        <?php 
                        }else{ ?>
                        @foreach ($data as $value)
                        <tr>
                            <td>{{$value['id']}}</td>
                            <td>{{$value['service']}}</td>
                            <!-- <td>{{$value['service']}}</td> -->
                            <td>
                                @foreach (explode(',',$value['sub_service']) as $tag)
                                    <h5><span class="badge text-bg-primary">{{$tag}}</span></h5>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        <a href="{{url('admin/edit_service/'.$value['id'])}}" class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                    </div>
                                    <div class="remove">
                                        <a href="{{url('admin/delete_service/'.$value['id'])}}" class="btn btn-sm btn-danger remove-item-btn">Remove</a>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">
    function JSconfirm(id){
        // console.log('hiii');
        swal({
            title: `Are you sure ?`,
            text: "Are you sure you want to delete this service ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm){
                window.location = "{{url('admin/delete_service')}}"+'/'+id;
            }
            else{
                window.location.reload();
            }
        });
    }
</script>    

@endsection
