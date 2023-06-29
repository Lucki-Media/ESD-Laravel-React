<?php $__env->startSection('title'); ?> Portfolio <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Collaborate <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class=" d-flex align-items-center mb-4">
                <h5 class="card-title pb-1 mb-0 flex-grow-1 text-decoration-underline">Portfolio Details</h5>
                <div class="flex-shrink-0">
                     <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                 </div>
                <div>
                    <a href="<?php echo e(url('admin/edit_portfolio/'.$portfolio['id'])); ?>" class="btn btn-primary "><i class="ri-edit-box-line  align-bottom me-1"></i> Edit</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if(count($images) != 0){?>
                                <div class="swiper default-swiper rounded">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($images as $value){?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo e(URL::asset('thumbnail/'.$value)); ?>" alt="" class="img-fluid" />
                                        </div>
                                            <?php } ?>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                    <h2 class="text-center mt-1">No Image Found !</h2>
                                    <hr>
                                <?php } ?>

                                <?php if(count($features) != 0): ?>
                                <ul class="list-group mb-4 mt-4 ms-2">
                                <h5 class="text-center">Features</h5>
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><i class="mdi mdi-check-bold align-middle lh-1 me-2"></i><?php echo e($value); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><?php echo e($portfolio['title']); ?></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-2"><?php echo $portfolio['content']; ?></p>                                    
                                    <p class="card-text"><small class="text-muted"><?php echo \Carbon\Carbon::parse($portfolio['created_at'])->format('d F,Y');?></small></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->
    </div><!-- end row -->

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/pages/card.init.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/pages/swiper.init.js')); ?>"></script>

        <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Collaborate/view.blade.php ENDPATH**/ ?>