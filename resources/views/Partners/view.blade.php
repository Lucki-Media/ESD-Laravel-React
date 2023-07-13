@extends('layouts.master')
@section('title') Partners @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Partners @endslot
@endcomponent

<div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg bg-transparent border-top">
            {{-- <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" /> --}}
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="{{ $data['logo_image'] == null ? URL::asset('images/user.png') : URL::asset('thumbnail/' . $data['logo_image']) }}"
                        alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{$data['partner']}}</h3>
                    <p class="text-white-75">{{$data['email']}}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{$data['location']}}</div>
                        <div><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{$data['country']}}
                        </div>
                        <div class="flex-shrink-0 position-absolute end-0">
                        <a href="{!!url('admin/edit_link/'.$data['id'])!!}" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> Edit Partner</a>
                    </div>
                    </div>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Full Name :</th>
                                                        <td class="text-muted">{{$data['partner']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile :</th>
                                                        <td class="text-muted">{{$data['contact']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted">{{$data['email']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location :</th>
                                                        <td class="text-muted">{{$data['location'] . ", ". $data['country']}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Zip Code : </th>
                                                        <td class="text-muted">{{$data['zip']}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Portfolio</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if($data['git'] != "")
                                            <div>
                                                <a href="https://github.com/{{$data['git']}}" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                        <i class="ri-github-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            @endif
                                            @if($data['twitter'] != "")
                                            <div>
                                                <a href="https://twitter.com/{{$data['twitter']}}" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-infp">
                                                        <i class="ri-twitter-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            @endif
                                            @if($data['facebook'] != "")
                                            <div>
                                                <a href="https://www.facebook.com/{{$data['facebook']}}" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                        <i class="ri-facebook-circle-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            @endif
                                            @if($data['instagram'] != "")
                                            <div>
                                                <a href="https://www.instagram.com/{{$data['instagram']}}" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                        <i class="ri-instagram-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Services</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                            <?php $serviceTag = explode(',', $data['services'])?>
                                            @foreach ($serviceTag as $value)
                                            <div class="badge badge-soft-primary">{{ \App\Models\ServiceLinks::where('id',$value)->value('title')}}</div>
                                            @endforeach
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">About</h5>
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div
                                                            class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                            <i class="ri-phone-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1">Contact :</p>
                                                        <h6 class="text-truncate mb-0">{{$data['contact']}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 col-md-4">
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                        <div
                                                            class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                            <i class="ri-global-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1">Website :</p>
                                                        <a href="{{$data['link']}}" target="_blank" class="fw-semibold">{{$data['link']}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Projects</h5>
                                        <!-- Swiper -->
                                        <?php $count = count(explode(',', $data['projects'])); ?>
                                        <div class="swiper project-swiper mt-n4">
                                            <div class="d-flex justify-content-end gap-2 mb-4">
                                                @if($count > 1)
                                                <div class="slider-button-prev">
                                                    <div class="avatar-title fs-18 rounded px-1">
                                                        <i class="ri-arrow-left-s-line"></i>
                                                    </div>
                                                </div>
                                                <div class="slider-button-next">
                                                    <div class="avatar-title fs-18 rounded px-1">
                                                        <i class="ri-arrow-right-s-line"></i>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="swiper-wrapper">
                                                @if(count(explode(',', $data['projects'])) > 0)
                                                @foreach (explode(',', $data['projects']) as $projectId)
                                                <?php $project = \App\Models\Portfolio::where('id',$projectId)->first();?>
                                                @if($project)
                                                <div class="swiper-slide">
                                                    <div class="card profile-project-card shadow-none profile-project-info mb-0">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 text-muted overflow-hidden">
                                                                    <h5 class="fs-14 text-truncate mb-1">
                                                                        <a href="#" class="text-dark">{{ $project['title']}}</a>
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        Year : <span class="fw-semibold text-dark">{{ $project['year']}}</span></p>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <!-- <div class="badge badge-soft-warning fs-10"> -->
                                                                        <!-- Inprogress</div> -->
                                                                    <div class="badge fs-10 badge-soft-{{$project['priority'] == '1' ? 'success' : 'primary'}}"><span class="">{{$project['priority'] == '1' ? 'Portfolio' : 'Archive'}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-4">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <div>
                                                                            <h5 class="fs-12 text-muted mb-0">
                                                                                Partners :</h5>
                                                                        </div>
                                                                        <div class="avatar-group">
                                                                            <?php $partnerTag = explode(',', $project['partners'])?>
                                                                            @if(count($partnerTag) > 0)
                                                                            @foreach ($partnerTag as $partner)
                                                                            <?php
                                                                            $partner_image = \App\Models\ConvergeLinks::where('id',$partner)->value('logo_image');
                                                                            if($partner_image != null){
                                                                                $image_path = URL::asset('thumbnail/'.$partner_image);
                                                                            }else{
                                                                                $image_path = URL::asset('images\user.png');
                                                                            } ?>
                                                                            <div class="avatar-group-item" data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover" data-bs-placement="top" title="{{ \App\Models\ConvergeLinks::where('id',$partner)->value('partner')}}">
                                                                                <div class="avatar-xxs">
                                                                                    <img src="<?php echo $image_path;?>" alt="" class="rounded-circle img-fluid">
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <!-- end card body -->
                                </div><!-- end card -->

                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
