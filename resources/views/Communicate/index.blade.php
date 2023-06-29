@extends('layouts.master')
@section('title') Communicate @endsection
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
@slot('title')Communicate @endslot
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
                <h5 class="card-title mb-0 flex-grow-1">Messages</h5>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th data-ordering="false">ID</th>
                            <th data-ordering="false">Full Name</th>
                            <th data-ordering="false">Company Name</th>
                            <th data-ordering="false">Email</th>
                            <th>Sent Date</th>
                            <th>View</th>
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
                        @foreach ($data as $topic)
                        <tr>
                            <td>{{$topic['id']}}</td>
                            <td>{{$topic['full_name']}}</td>
                            <td>{{$topic['company_name']}}</td>
                            <td>{{$topic['email']}}</td>
                            <td><?php echo \Carbon\Carbon::parse($topic['created_at'])->format('d F,Y');?></td>
                            <td>
                                <a class="btn btn-soft-primary btn-sm" href="{{url('admin/view_data/'.$topic['id'])}}" aria-expanded="false">
                                    <i class="ri-eye-fill"></i>
                                </a> 
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
