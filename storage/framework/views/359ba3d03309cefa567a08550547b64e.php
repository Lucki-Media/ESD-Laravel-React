<?php $__env->startSection('title'); ?> Partners <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Partners <?php $__env->endSlot(); ?>
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

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-4">
                <div class="search-box">
                    <input type="text" class="form-control" id="searchMemberList" placeholder="Search for name or designation...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <!--end col-->
            <div class="col-sm-auto ms-auto">
                <div class="list-grid-nav hstack gap-1">
                    <button type="button" id="grid-view-button" class="btn btn-soft-secondary nav-link btn-icon fs-14 active filter-button"><i class="ri-grid-fill"></i></button>
                    <button type="button" id="list-view-button" class="btn btn-soft-secondary nav-link  btn-icon fs-14 filter-button"><i class="ri-list-unordered"></i></button>
                    <!-- <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                        <li><a class="dropdown-item" href="#">All</a></li>
                        <li><a class="dropdown-item" href="#">Last Week</a></li>
                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                    </ul> -->
                    <a href="<?php echo e(url('admin\add_converge_link')); ?>" class="btn btn-primary addMembers-modal" ><i class="ri-add-fill me-1 align-bottom"></i> Add Partners</a >
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div>

            <div id="teamlist">
                <div class="team-list grid-view-filter row" id="team-member-list">
                </div>
                
                <div class="d-flex justify-content-end mt-4 col-sm-12">
                    
                </div>
                <!-- <div class="text-center mb-3">
                    <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </a>
                </div> -->
            </div>
            <div class="py-4 mt-4 text-center" id="noresult" style="display: none;">
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
                <h5 class="mt-4">Sorry! No Result Found</h5>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!--end row-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/js/pages/team.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Partners/index.blade.php ENDPATH**/ ?>