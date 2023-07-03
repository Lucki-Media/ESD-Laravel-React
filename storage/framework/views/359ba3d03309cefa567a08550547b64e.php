<?php $__env->startSection('title'); ?> Converge <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Converge <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

    <?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

    </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

<div class="row">
    <!-- Links Start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Links</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="<?php echo e(url('admin\add_converge_link')); ?>" class="btn btn-primary "><i class="ri-add-line  align-bottom me-1"></i> Add</a>
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
                                <?php $__currentLoopData = $link_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="align-top">
                                    <td><?php echo e($link['title']); ?> </td>
                                    <td><a href="<?php echo e($link['link']); ?>"><?php echo e($link['link']); ?></a></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="<?php echo e(url('admin/edit_link/'.$link['link_id'])); ?>" class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <a href="<?php echo e(url('admin/delete_link/'.$link['link_id'])); ?>" class="btn btn-sm btn-danger remove-item-btn">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Partners/index.blade.php ENDPATH**/ ?>