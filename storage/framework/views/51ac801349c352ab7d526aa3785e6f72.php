<?php $__env->startSection('title'); ?> Partners <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Partners <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg bg-transparent border-top">
            
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="<?php echo e($data['logo_image'] == null ? URL::asset('images/user.png') : URL::asset('thumbnail/' . $data['logo_image'])); ?>"
                        alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1"><?php echo e($data['partner']); ?></h3>
                    <p class="text-white-75"><?php echo e($data['email']); ?></p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i
                                class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i><?php echo e($data['location']); ?></div>
                        <div><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i><?php echo e($data['country']); ?>

                        </div>
                        <div class="flex-shrink-0 position-absolute end-0">
                        <a href="<?php echo url('admin/edit_link/'.$data['id']); ?>" class="btn btn-success"><i
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
                                                        <td class="text-muted"><?php echo e($data['partner']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile :</th>
                                                        <td class="text-muted"><?php echo e($data['contact']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted"><?php echo e($data['email']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location :</th>
                                                        <td class="text-muted"><?php echo e($data['location'] . ", ". $data['country']); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Zip Code : </th>
                                                        <td class="text-muted"><?php echo e($data['zip']); ?></td>
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
                                            <?php if($data['git'] != ""): ?>
                                            <div>
                                                <a href="https://github.com/<?php echo e($data['git']); ?>" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                        <i class="ri-github-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($data['twitter'] != ""): ?>
                                            <div>
                                                <a href="https://twitter.com/<?php echo e($data['twitter']); ?>" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-infp">
                                                        <i class="ri-twitter-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($data['facebook'] != ""): ?>
                                            <div>
                                                <a href="https://www.facebook.com/<?php echo e($data['facebook']); ?>" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                        <i class="ri-facebook-circle-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($data['instagram'] != ""): ?>
                                            <div>
                                                <a href="https://www.instagram.com/<?php echo e($data['instagram']); ?>" target="_blank" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                        <i class="ri-instagram-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Services</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                            <?php $serviceTag = explode(',', $data['services'])?>
                                            <?php $__currentLoopData = $serviceTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="badge badge-soft-primary"><?php echo e(\App\Models\ServiceLinks::where('id',$value)->value('title')); ?></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <h6 class="text-truncate mb-0"><?php echo e($data['contact']); ?></h6>
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
                                                        <a href="<?php echo e($data['link']); ?>" target="_blank" class="fw-semibold"><?php echo e($data['link']); ?></a>
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
                                                <?php if($count > 1): ?>
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
                                                <?php endif; ?>
                                            </div>
                                            <div class="swiper-wrapper">
                                                <?php $__currentLoopData = explode(',', $data['projects']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $project = \App\Models\Portfolio::where('id',$projectId)->first();?>
                                                <div class="swiper-slide">
                                                    <div class="card profile-project-card shadow-none profile-project-info mb-0">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex">
                                                                <div class="flex-grow-1 text-muted overflow-hidden">
                                                                    <h5 class="fs-14 text-truncate mb-1">
                                                                        <a href="#" class="text-dark"><?php echo e($project['title']); ?></a>
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        Year : <span class="fw-semibold text-dark"><?php echo e($project['year']); ?></span></p>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <!-- <div class="badge badge-soft-warning fs-10"> -->
                                                                        <!-- Inprogress</div> -->
                                                                    <div class="badge fs-10 badge-soft-<?php echo e($project['priority'] == '1' ? 'success' : 'primary'); ?>"><span class=""><?php echo e($project['priority'] == '1' ? 'Portfolio' : 'Archive'); ?></div>
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
                                                                            <?php $__currentLoopData = $partnerTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php
                                                                            $partner_image = \App\Models\ConvergeLinks::where('id',$partner)->value('logo_image');
                                                                            if($partner_image != null){
                                                                                $image_path = URL::asset('thumbnail/'.$partner_image);
                                                                            }else{
                                                                                $image_path = URL::asset('images\user.png');
                                                                            } ?>
                                                                            <div class="avatar-group-item" data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover" data-bs-placement="top" title="<?php echo e(\App\Models\ConvergeLinks::where('id',$partner)->value('partner')); ?>">
                                                                                <div class="avatar-xxs">
                                                                                    <img src="<?php echo $image_path;?>" alt="" class="rounded-circle img-fluid">
                                                                                </div>
                                                                            </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/profile.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Partners/view.blade.php ENDPATH**/ ?>