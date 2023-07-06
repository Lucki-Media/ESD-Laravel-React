<?php $__env->startSection('title'); ?> Content <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Content <?php $__env->endSlot(); ?>
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
<?php //echo $page;exit;?>
<div class="row">
    <!-- Heading Quote Start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Heading Quote for <?php echo e($page); ?></h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="<?php echo e(url('admin\update_heading').'/'.$page); ?>" class="btn btn-primary "><i
                                class="ri-edit-box-line  align-bottom me-1"></i> Edit</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted"><?php echo e(\App\Models\Headings::where('type',$page)->value('heading')); ?></p>

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
                        <a href="<?php echo e(url('admin\add_content').'/'.$page); ?>" class="btn btn-primary "><i
                                class="ri-add-line  align-bottom me-1"></i> Add</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- <div class="live-preview"> -->
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped align-middle" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" >ID</th>
                                    <th scope="col" >Title</th>
                                    <th scope="col" width="50%">Description</th>
                                    <th scope="col" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (count($data) == 0) { ?>
                                <tr>
                                    <td colspan="3" style="text-align: center;"> Oopps! No Data Found!</td>
                                </tr>
                                <?php 
                                }else{ ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="align-top">
                                    <td><?php echo e($topic['id']); ?> </td>
                                    <td><?php echo e($topic['title']); ?> </td>
                                    <td class="description__class">
                                        <?php if($topic['type'] == 'content'){ ?>
                                        <?php echo $topic['description']; ?>

                                    <?php }else{?>
                                        <span class="badge text-bg-primary fs-6" ><?php echo e($topic['module']); ?></span>
                                        
                                    <?php }?>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="<?php echo e(url('admin/edit_content/'.$page.'/'.$topic['id'])); ?>"
                                                    class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <a href="<?php echo e(url('admin/delete_content/'.$page.'/'.$topic['id'])); ?>"
                                                    class="btn btn-sm btn-danger remove-item-btn">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <!-- </div> -->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- Topics End -->

</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> 
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Content/index.blade.php ENDPATH**/ ?>