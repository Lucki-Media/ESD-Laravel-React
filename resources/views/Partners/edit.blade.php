@extends('layouts.master')
@section('title') Edit Partner @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Partners @endslot
@endcomponent

@if ($errors->any())
<div class="alert alert-danger mb-5">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
            @endforeach
    </ul>
</div>
@endif
        
<form class="" method="POST" action="{!!url('admin/update_link/'.$data['id'])!!}" enctype="multipart/form-data" novalidate>
@csrf
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ $data['cover_image'] == null ? URL::asset('images/background.jpg') : URL::asset('thumbnail/' . $data['cover_image']) }}" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" accept="image/*" class="profile-foreground-img-file-input" name="cover_image">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="{{ $data['logo_image'] == null ? URL::asset('images/user.png') : URL::asset('thumbnail/' . $data['logo_image']) }}"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" accept="image/*" class="profile-img-file-input" name="logo_image">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <!-- <h5 class="fs-16 mb-1">Anna Adame</h5>
                        <p class="text-muted mb-0">Lead Designer / Developer</p> -->
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Portfolio</h5>
                        </div>
                        <!-- <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-secondary fs-12"><i
                                    class="ri-add-fill align-bottom me-1"></i> Add</a>
                        </div> -->
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-dark text-dark">
                                <i class="ri-github-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="gitUsername" name="git" placeholder="Git Username"
                            value="{{$data['git']}}">

                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-info text-info">
                                <i class="ri-twitter-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="websiteInput" name="twitter" placeholder="Twitter Username"
                            value="{{$data['twitter']}}">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-primary text-primary">
                                <i class="ri-facebook-circle-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="dribbleName" name="facebook" placeholder="Facebook Username"
                            value="{{$data['facebook']}}">
                    </div>
                    <div class="d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-danger text-danger">
                                <i class="ri-instagram-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pinterestName" name="instagram" placeholder="Instagram Username" value="{{$data['instagram']}}">
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="firstnameInput" required
                                                placeholder="Enter name" name="partner" value="{{$data['partner']}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone
                                                Number</label>
                                            <input type="text" class="form-control" id="phonenumberInput" name="contact"
                                                placeholder="Enter phone number" value="{{$data['contact']}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email
                                                Address</label>
                                            <input type="email" class="form-control" id="emailInput" name="email"
                                                placeholder="Enter email" value="{{$data['email']}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="skillsInput" class="form-label">Services</label>
                                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                                data-choices-removeItem name="services[]" multiple>
                                                <?php $serviceTag = explode(',', $data['services'])?>
                                                @foreach ($services as $value)
                                                <option value="{{$value['id']}}"
                                                    {{(in_array($value['id'], $serviceTag))  ? 'selected' : ""}}>
                                                    {{$value['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="skillsInput" class="form-label">Projects</label>
                                            <select class="form-control" id="choices-multiple-remove-button" data-choices
                                                data-choices-removeItem name="projects[]" multiple>
                                                <?php $projectTag = explode(',', $data['projects'])?>
                                                @foreach ($projects as $project)
                                                <option value="{{$project['id']}}"
                                                    {{(in_array($project['id'], $projectTag))  ? 'selected' : ""}}>
                                                    {{$project['title']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="websiteInput1" class="form-label">Website</label>
                                            <input type="text" class="form-control" id="websiteInput1" name="link"
                                                placeholder="Enter Website Link" value="{{$data['link']}}" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">City</label>
                                            <input type="text" class="form-control" id="cityInput" name="location" placeholder="Enter City" value="{{$data['location']}}" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="countryInput" name="country" 
                                                placeholder="Enter Country" value="{{$data['country']}}" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Zip
                                                Code</label>
                                            <input type="text" class="form-control" minlength="5" maxlength="6" name="zip" 
                                                id="zipcodeInput" placeholder="Enter zipcode" value="{{$data['zip']}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="{{url('admin/partners')}}" class="btn btn-soft-secondary">Cancel</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>

@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
