<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.file-uploads'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/filepond/filepond.min.css')); ?>" type="text/css" />
    <link rel="stylesheet"
        href="<?php echo e(URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Forms
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            File Upload
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Dropzone</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">DropzoneJS is an open source library that provides drag’n’drop file uploads
                        with image previews.</p>

                    <div class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple="multiple">
                        </div>
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                            </div>

                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </div>

                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                        <li class="mt-2" id="dropzone-preview-list">
                            <!-- This is used as the file preview template -->
                            <div class="border rounded">
                                <div class="d-flex p-2">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm bg-light rounded">
                                            <img data-dz-thumbnail class="img-fluid rounded d-block" src="<?php echo e(URL::asset('build/images/new-document.png')); ?>"
                                                alt="Dropzone-Image" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="pt-1">
                                            <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                            <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 ms-3">
                                        <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- end dropzon-preview -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="justify-content-between d-flex align-items-center mb-3">
                <h5 class="mb-0 pb-1 text-decoration-underline">Filepond</h5>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Multiple File Upload</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <p class="text-muted">FilePond is a JavaScript library that
                                optimizes multiple images for faster uploads and offers a great, accessible, silky
                                smooth user experience.</p>
                            <input type="file" class="filepond filepond-input-multiple" multiple name="filepond"
                                data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Profile Picture Selection</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped file
                                upload variation.</p>
                            <div class="avatar-xl mx-auto">
                                <input type="file" class="filepond filepond-input-circle" name="filepond"
                                    accept="image/png, image/jpeg, image/gif" />
                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/filepond/filepond.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')); ?>">
    </script>
    <script
        src="<?php echo e(URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')); ?>">
    </script>
    <script
        src="<?php echo e(URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')); ?>">
    </script>
    <script src="<?php echo e(URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/form-file-upload.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/forms-file-uploads.blade.php ENDPATH**/ ?>