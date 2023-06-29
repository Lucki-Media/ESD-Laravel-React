<?php $__env->startSection('title'); ?> Edit Portfolio <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.core.css')); ?>" rel="stylesheet" type="text/css" />
     <ink href="<?php echo e(URL::asset('build/libs/quill/quillbubble.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.snow.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Collaborate Portfolio <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">

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
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit Collaborate Portfolio</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary "><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form class="row g-3 needs-validation" method="POST"  enctype="multipart/form-data" action="<?php echo e(url('admin/update_portfolio/'.$portfolio['id'])); ?>" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="">
                            <label for="validationCustom01" class="form-label">Title</label>
                            <input type='text' name="title" class="form-control" id="validationCustom01" placeholder="Enter Title Here..." value="<?php echo e($portfolio['title']); ?>" required>
                            <div class="invalid-feedback">
                                Please enter data in the Title field.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="validation" class="form-label">Content</label>
                            <div class="snow-editor"  id="snow_editor" style="height: 300px;">
                                <?php echo $portfolio['content']; ?>

                            </div> <!-- end Snow-editor-->
                            <input type="hidden" name="content" id="snow_picker_content">
                        </div>
                        
                        <div class="">
                            <div class="d-flex align-items-center">
                                <label class="flex-grow-1 form-label">Features</label>
                                <div class="mb-2">
                                    <button class="btn btn-primary" id="add_feature" type="button">Add one more</button>
                                </div>
                            </div>
                            <?php if(count($features) != 0){?>
                                <?php foreach ($features as $value){?>
                                    <div id="feature_input">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="features[]" value="<?php echo e($value); ?>" placeholder="Enter Feature Here...">
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php }else{ ?>
                                <div id="feature_input">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="features[]" placeholder="Enter Feature Here...">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="mb-3">
                            <!-- Multiple Files Input Example -->
                            <label for="formFileMultiple" class="form-label">Images</label>
                            <div style="margin-bottom: 15px;" class="row">
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4 col-lg-2 mb-3">
                                        <div class="card h-100 selected">
                                            <img  class="card-img-top"  src="<?php echo e(URL::asset('thumbnail/'.$value)); ?>" />
                                            <div class="card-body p-1">
                                                <a href="<?php echo e(url('admin/delete_image/'.$portfolio['id'].'/'.$value)); ?>" class="btn btn-outline-danger d-flex justify-content-center">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <input class="form-control" type="file"  name='image[]' id="formFileMultiple" accept="image/png, image/jpeg, image/gif" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Status</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="status" value="portfolio" id="status1" <?php if($portfolio['status'] == 'portfolio'): ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="status1">
                                    Porfolio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="archive" id="status2" <?php if($portfolio['status'] == 'archive'): ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="status2">
                                    Archived
                                </label>
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
        <script src="<?php echo e(URL::asset('build/libs/quill/quill.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/pages/form-editor.init.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        $(document).ready(function() {
            var data = $("#feature_input").html();
            $('#add_feature').on( 'click', function () {
                var newData = data.replace(/value=".*?"/g, 'value=""');
                $('#feature_input').after(newData);
                // console.log(data);
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            var content = $('#snow_editor').find('div:first').html();
            $('#snow_picker_content').val(content); // Update the hidden input field
            // console.log(content);

            $('#snow_editor').on('DOMSubtreeModified', function() {
                content = $(this).find('div:first').html();
                $('#snow_picker_content').val(content); // Update the hidden input field
                // console.log(content);
            });
        });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Collaborate/editPortfolio.blade.php ENDPATH**/ ?>