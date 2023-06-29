<?php $__env->startSection('title'); ?> Update Heading <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Update Heading</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div>

            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form class="row g-3 needs-validation" method="POST"  action="<?php echo route('admin.heading_update'); ?>" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Heading</label>
                            <input type='hidden' name="type" value="<?php echo e($type); ?>">
                            <textarea class="form-control" id="validationTextarea" placeholder="Enter Heading Here..." name="heading"
                                required><?php echo e($heading); ?></textarea>
                            <div class="invalid-feedback">
                                Please enter data in the textarea.
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/pages/form-validation.init.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Heading/edit.blade.php ENDPATH**/ ?>