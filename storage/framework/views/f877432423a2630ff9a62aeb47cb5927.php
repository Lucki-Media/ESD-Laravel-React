<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.dashboard'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Dashboard <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col">
        <div class="h-100">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Projects</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary "><span class="counter-value" data-target="<?php echo e(\App\Models\Portfolio::count()); ?>">0</span> </h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-primary rounded fs-3">
                                        <i class="bx bx-task text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Portfolio Projects</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="<?php echo e(\App\Models\Portfolio::where('status','portfolio')->count()); ?>">0</span></h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-primary rounded fs-3">
                                        <i class='bx bxs-user-detail text-primary' ></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Archived Projects</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="<?php echo e(\App\Models\Portfolio::where('status','archive')->count()); ?>">0</span> </h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-primary rounded fs-3">
                                        <i class='bx bx-archive-in text-primary' ></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Messages</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="<?php echo e(\App\Models\Communicate::count()); ?>">0</span> </h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-primary rounded fs-3">
                                        <i class="bx bx-chat text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Latest 5 Portfolio</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th data-ordering="false">ID</th>
                                            <th data-ordering="false">Title</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $portfolio = \App\Models\Portfolio::latest()->limit(5)->get()->toArray();
                                        if (count($portfolio) == 0) { ?>
                                        <tr>
                                            <td colspan="6" style="text-align: center;"> Oopps! No Data Found!</td>
                                        </tr>
                                        <?php 
                                        }else{ ?>
                                        <?php $__currentLoopData = $portfolio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($topic['id']); ?></td>
                                            <td><?php echo e($topic['title']); ?></td>
                                            <td><?php echo \Carbon\Carbon::parse($topic['created_at'])->format('d F,Y');?></td>
                                            <td><span class="badge badge-soft-<?php echo e($topic['status'] == 'portfolio' ? 'success' : 'secondary'); ?>"><?php echo e($topic['status'] == 'portfolio' ? 'Portfolio' : 'Archive'); ?></span></td>
                                            <!-- <td><span class="badge badge-soft-success">New</span></td> -->
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <a class="btn btn-soft-primary btn-sm dropdown" href="<?php echo e(url('admin/view_portfolio/'.$topic['id'])); ?>" >
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </a> 
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Latest 5 messages</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-centered table-hover align-middle table-nowrap mb-0">
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
                                        $data = \App\Models\Communicate::latest()->limit(5)->get()->toArray();
                                        if (count($data) == 0) { ?>
                                        <tr>
                                            <td colspan="6" style="text-align: center;"> Oopps! No Data Found!</td>
                                        </tr>
                                        <?php 
                                        }else{ ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($topic['id']); ?></td>
                                            <td><?php echo e($topic['full_name']); ?></td>
                                            <td><?php echo e($topic['company_name']); ?></td>
                                            <td><?php echo e($topic['email']); ?></td>
                                            <td><?php echo \Carbon\Carbon::parse($topic['created_at'])->format('d F,Y');?></td>
                                            <td>
                                                <a class="btn btn-soft-primary btn-sm" href="<?php echo e(url('admin/view_data/'.$topic['id'])); ?>" aria-expanded="false">
                                                    <i class="ri-eye-fill"></i>
                                                </a> 
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php } ?>
                                    </tbody>
                                </table><!-- end table -->
                            </div>
                        </div> <!-- .card-body-->
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

        </div> <!-- end .h-100-->
    </div> <!-- end col -->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/dashboard/index.blade.php ENDPATH**/ ?>