@extends('layouts.master')
@section('title') Converge @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Converge @endslot
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
                        <a href="{{url('admin\update_heading').'/converge'}}" class="btn btn-primary "><i class="ri-edit-box-line  align-bottom me-1"></i> Edit</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted">{{ \App\Models\Headings::where('type','converge')->value('heading')}}</p>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <!-- Heading Quote End -->
    
    <!-- Topics Start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Topics</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{url('admin\add_converge_topic')}}" class="btn btn-primary "><i class="ri-add-line  align-bottom me-1"></i> Add</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col"  width="20%">Title</th>
                                    <th scope="col"  width="60%">Description</th>
                                    <th scope="col"  width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (count($topic_data) == 0) { ?>
                                <tr>
                                    <td colspan="3" style="text-align: center;"> Oopps! No Data Found!</td>
                                </tr>
                                <?php 
                                }else{ ?>
                                @foreach ($topic_data as $topic)
                                <tr class="align-top">
                                    <td>{{$topic['title']}} </td>
                                    <td class="description__class">{!!$topic['description']!!} </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="{{url('admin/edit_topic/'.$topic['topic_id'])}}" class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <a href="{{url('admin/delete_topic/'.$topic['topic_id'])}}" class="btn btn-sm btn-danger remove-item-btn">Remove</a>
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
    <!-- Topics End -->

    <!-- Links Start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Links</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{url('admin\add_converge_link')}}" class="btn btn-primary "><i class="ri-add-line  align-bottom me-1"></i> Add</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-bordered nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col"  width="20%">Title</th>
                                    <th scope="col"  width="60%">Link</th>
                                    <th scope="col"  width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (count($link_data) == 0) { ?>
                                <tr>
                                    <td colspan="3" style="text-align: center;"> Oopps! No Data Found!</td>
                                </tr>
                                <?php 
                                }else{ ?>
                                @foreach ($link_data as $link)
                                <tr class="align-top">
                                    <td>{{$link['title']}} </td>
                                    <td><a href="{{$link['link']}}">{{$link['link']}}</a></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="{{url('admin/edit_link/'.$link['link_id'])}}" class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <a href="{{url('admin/delete_link/'.$link['link_id'])}}" class="btn btn-sm btn-danger remove-item-btn">Remove</a>
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
