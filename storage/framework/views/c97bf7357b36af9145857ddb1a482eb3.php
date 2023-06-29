<?php $__env->startSection('title'); ?> Communicate <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Communicate <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Message Details</h4>
                 <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                     </div>
                </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="d-flex align-items-start text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Full Name</h5>
                                <p class="mb-1"><?php echo e($data['full_name']); ?></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Company Name</h5>
                                <p class="mb-1"><?php echo e($data['company_name']); ?></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-end text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Email</h5>
                                <p class="mb-1"><?php echo e($data['email']); ?></p>
                            </div>
                        </div>

                        
                        <div class="d-flex align-items-start text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Contact Number</h5>
                                <p class="mb-1"><?php echo e($data['contact_number']); ?></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Project</h5>
                                <p class="mb-1"><?php echo e($data['project']); ?></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-end text-muted mb-4">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Message</h5>
                                <p class="mb-1"><?php echo e($data['message']); ?></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-end text-muted">
                            <div class="flex-grow-1">
                                <h5 class="fs-14">Sent date</h5>
                                <p class="mb-1"><?php echo \Carbon\Carbon::parse($data['created_at'])->format('d F,Y');?></p>
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Communicate/view.blade.php ENDPATH**/ ?>