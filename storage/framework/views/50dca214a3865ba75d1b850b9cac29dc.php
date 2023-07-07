<?php $__env->startSection('title'); ?> Edit Portfolio <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.core.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.bubble.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.snow.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Portfolio <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<form class="row g-3 needs-validatin" method="POST"  enctype="multipart/form-data" action="<?php echo e(url('admin/update_portfolio/'.$portfolio['id'])); ?>" novalidate>
<?php echo csrf_field(); ?>
    
        
    <div class="row">
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="project-title-input">Project Title</label>
                        <input type="text"  name="title" class="form-control" id="project-title-input" placeholder="Enter project title" value="<?php echo e($portfolio['title']); ?>" required>
                        <div class="invalid-feedback">
                            Please enter data in the Title field.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>
                        <input class="form-control" id="project-thumbnail-img" type="file" name="logo_image"
                            accept="image/png, image/gif, image/jpeg">
                    </div>

                    <div class="mb-3">
                        <label for="validation" class="form-label">Content</label>
                        <div class="snow-editor"  id="snow_editor" style="height: 300px;">
                            <?php echo $portfolio['content']; ?>

                        </div> <!-- end Snow-editor-->
                        <input type="hidden" name="content" id="snow_picker_content">
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3 mb-lg-0">
                                <label for="choices-priority-input" class="form-label">Priority</label>
                                <select class="form-select" data-choices data-choices-search-false
                                    id="choices-priority-input" name="priority">
                                    <option value="1" selected>Portfolio</option>
                                    <option value="2">Archived</option>
                                </select>   
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3 mb-lg-0">
                                <label for="choices-status-input" class="form-label">Status</label>
                                <select class="form-select" data-choices data-choices-search-false
                                    id="choices-status-input" name="show_details">
                                    <option value="1" selected>Public</option>
                                    <option value="2">Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <label for="datepicker-deadline-input" class="form-label">Year</label>
                                <input type="text" class="form-control" name="year" placeholder="YYYY"
                                value="<?php echo e(old('year')); ?>" id="date-format " required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Attach Images</h5>
                </div>
                <div class="card-body">
                    <div>
                        <p class="text-muted">Add Images here.</p>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="image[]" type="file" accept="image/*" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                <!-- This is used as the file preview template -->
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img src="#" alt="Project-Image" data-dz-thumbnail
                                                    class="img-fluid rounded d-block" />
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
                </div>
            </div>
            <!-- end card -->
            <div class="text-end mb-4">
                <a href="<?php echo e(url('admin/collaborate_portfolio')); ?>" class="btn btn-danger w-sm">Cancel</a>
                <button type="submit" class="btn btn-primary w-sm">Create</button>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <!-- <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Privacy</h5>
                </div>
                <div class="card-body">
                    <div>
                        <label for="choices-privacy-status-input" class="form-label">Status</label>
                        <select class="form-select" data-choices data-choices-search-false
                            id="choices-privacy-status-input">
                            <option value="Private" selected>Private</option>
                            <option value="Team">Team</option>
                            <option value="Public">Public</option>
                        </select>
                    </div>
                </div>
            </div> -->
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Services</h5>
                </div>
                <div class="card-body">
                    <!-- <div class="mb-3">
                        <label for="choices-categories-input" class="form-label">Categories</label>
                        <select class="form-select" data-choices data-choices-search-false id="choices-categories-input">
                            <option value="Designing" selected>Designing</option>
                            <option value="Development">Development</option>
                        </select>
                    </div> -->

                    <div>
                        <!-- <label for="choices-text-input" class="form-label">Services</label> -->
                        <select class="form-control" id="choices-multiple-remove-button" data-choices
                            data-choices-removeItem name="services[]" multiple>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value['id']); ?>">
                                <?php echo e($value['service']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Partners</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <!-- <label for="choices-multiple-remove-button" class="form-label">Partners</label> -->
                        <select class="form-control" id="choices-multiple-remove-button" data-choices
                            data-choices-removeItem name="partners[]" multiple>
                            <?php $__currentLoopData = $parners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value['id']); ?>">
                                <?php echo e($value['partner']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- <div>
                        <label class="form-label">Team Members</label>
                        <div class="avatar-group">
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                <div class="avatar-xs">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-3.jpg')); ?>" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle text-bg-primary">
                                        S
                                    </div>
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                <div class="avatar-xs">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-4.jpg')); ?>" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Add Members">
                                <div class="avatar-xs" data-bs-toggle="modal" data-bs-target="#inviteMembersModal">
                                    <div
                                        class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                        +
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</form>



    <!-- Modal -->
    <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 ps-4 bg-soft-success">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Members</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                        <i class="ri-search-line search-icon"></i>
                    </div>

                    <div class="mb-4 d-flex align-items-center">
                        <div class="me-2">
                            <h5 class="mb-0 fs-13">Members :</h5>
                        </div>
                        <div class="avatar-group justify-content-center">
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                <div class="avatar-xs">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-3.jpg')); ?>" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                <div class="avatar-xs">
                                    <div class="avatar-title rounded-circle bg-secondary">
                                        S
                                    </div>
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                <div class="avatar-xs">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-4.jpg')); ?>" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                        <div class="vstack gap-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-2.jpg')); ?>" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                        HB
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry Baird</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-3.jpg')); ?>" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank Hook</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-4.jpg')); ?>" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer Carter</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-success text-success rounded-circle">
                                        AC
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="<?php echo e(URL::asset('build/images/users/avatar-7.jpg')); ?>" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a>
                                    </h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                        </div>
                        <!-- end list -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success w-xs">Invite</button>
                </div>
            </div>
            <!-- end modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- end modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/quill/quill.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-editor.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-validation.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/project-create.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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