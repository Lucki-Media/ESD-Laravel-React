@extends('layouts.master')
@section('title') Add Partner @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') ERGOSUMDEUS @endslot
@slot('title')Partners @endslot
@endcomponent
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('images/background.jpg') }}" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
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
                            <img src="{{ URL::asset('images/user.png') }}"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
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
                        <input type="email" class="form-control" id="gitUsername" placeholder="Username"
                            value="@daveadame">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-info text-info">
                                <i class="ri-twitter-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com"
                            value="www.velzon.com">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-primary text-primary">
                                <i class="ri-facebook-circle-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="dribbleName" placeholder="Username"
                            value="@dave_adame">
                    </div>
                    <div class="d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-soft-danger text-danger">
                                <i class="ri-instagram-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pinterestName" placeholder="Username"
                            value="Advance Dave">
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
                                            <input type="text" class="form-control" id="firstnameInput"
                                                placeholder="Enter your firstname" value="Dave">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone
                                                Number</label>
                                            <input type="text" class="form-control" id="phonenumberInput"
                                                placeholder="Enter your phone number" value="+(1) 987 6543">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email
                                                Address</label>
                                            <input type="email" class="form-control" id="emailInput"
                                                placeholder="Enter your email" value="daveadame@velzon.com">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="skillsInput" class="form-label">Skills</label>
                                            <select class="form-control" name="skillsInput" data-choices
                                                data-choices-removeItem multiple id="skillsInput">
                                                <option value="illustrator">Illustrator</option>
                                                <option value="photoshop">Photoshop</option>
                                                <option value="css">CSS</option>
                                                <option value="html">HTML</option>
                                                <option value="javascript" selected>Javascript</option>
                                                <option value="python">Python</option>
                                                <option value="php">PHP</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="websiteInput1" class="form-label">Website</label>
                                            <input type="text" class="form-control" id="websiteInput1"
                                                placeholder="www.example.com" value="www.velzon.com" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">City</label>
                                            <input type="text" class="form-control" id="cityInput" placeholder="City"
                                                value="California" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="countryInput"
                                                placeholder="Country" value="United States" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Zip
                                                Code</label>
                                            <input type="text" class="form-control" minlength="5" maxlength="6"
                                                id="zipcodeInput" placeholder="Enter zipcode" value="90011">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                            <button type="button" class="btn btn-soft-secondary">Cancel</button>
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
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
