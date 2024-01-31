<?php $__env->startSection('title'); ?>
    Edit Portfolio
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.core.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.bubble.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.snow.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            ERGOSUMDEUS
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Portfolio
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <form class="row g-3 needs-validatin" method="POST" enctype="multipart/form-data"
        action="<?php echo e(url('admin/update_portfolio/' . $portfolio['id'])); ?>" novalidate>
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
                            <input type="text" name="title" class="form-control" id="project-title-input"
                                placeholder="Enter project title" value="<?php echo e($portfolio['title']); ?>" required>
                            <div class="invalid-feedback">
                                Please enter data in the Title field.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="project-thumbnail-img">Thumbnail Image</label>
                            <input class="form-control" id="project-thumbnail-img" type="file" name="logo_image"
                                accept="image/png, image/gif, image/jpeg" onchange="previewImage(event)">
                            <div style="margin-top: 15px;">
                                <div class="col-md-4 col-lg-2 mb-3">
                                    <?php
                                    if ($portfolio['logo_image'] != null) {
                                        $src = URL::asset('thumbnail/' . $portfolio['logo_image']);
                                    } else {
                                        $src = URL::asset('images\noimage.png');
                                    } ?>
                                    <div class="card">
                                        <img id="preview" class="card-img" width="100px" src="<?php echo $src; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="validation" class="form-label">Content</label>
                            <div class="snow-editor" id="snow_editor" style="height: 300px;">
                                <?php echo $portfolio['content']; ?>

                            </div> <!-- end Snow-editor-->
                            <input type="hidden" name="content" id="snow_picker_content">
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="choices-priority-input" class="form-label">Priority</label>
                                    <select class="form-select" data-choices-search-false id="inputPriority"
                                        name="priority">
                                        <option value="1" <?php if($portfolio['priority'] == '1'): ?> selected <?php endif; ?>>Portfolio
                                        </option>
                                        <option value="2" <?php if($portfolio['priority'] == '2'): ?> selected <?php endif; ?>>Archived
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="choices-status-input" class="form-label">Status</label>
                                    <select class="form-select" data-choices-search-false id="inputStatus"
                                        name="show_details">
                                        <option value="1" <?php if($portfolio['show_details'] == '1'): ?> selected <?php endif; ?>>Public
                                        </option>
                                        <?php if($portfolio['priority'] == '2'): ?>
                                            <option value="2" <?php if($portfolio['show_details'] == '2'): ?> selected <?php endif; ?>>Private
                                            </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="datepicker-deadline-input" class="form-label">Year</label>
                                    <input type="text" class="form-control" name="year" placeholder="YYYY"
                                        value="<?php echo e($portfolio['year']); ?>" id="date-format " required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <!-- <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Attach Images</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <p class="text-muted">Add Images here.</p>

                            <div class="dropzone">
                                <div class="fallback">
                                    <input name="image[]" type="file" accept="image/*" multiple="multiple" >
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    </div>

                                    <h5>Drop files here or click to upload.</h5>
                                </div>
                            </div>

                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="mt-2" id="dropzone-preview-list">
                                    <div class="border rounded">
                                        <div class="d-flex p-2">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm bg-light rounded">
                                                    <img src="<?php echo e(URL::asset('thumbnail/' . $value)); ?>" alt="Project-Image" data-dz-thumbnail
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!-- end card -->
                <div class="text-end mb-4">
                    <a href="<?php echo e(url('admin/collaborate_portfolio')); ?>" class="btn btn-danger w-sm">Cancel</a>
                    <button type="submit" class="btn btn-primary w-sm">Update</button>
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
                                <?php $serviceTag = explode(',', $portfolio['services']); ?>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value['id']); ?>"
                                        <?php echo e(in_array($value['id'], $serviceTag) ? 'selected' : ''); ?>>
                                        <?php echo e($value['title']); ?></option>
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
                                <?php $partnerTag = explode(',', $portfolio['partners']); ?>
                                <?php $__currentLoopData = $parners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value['id']); ?>"
                                        <?php echo e(in_array($value['id'], $partnerTag) ? 'selected' : ''); ?>>
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
                <div class="card" id="order_id_div">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Order Number</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="number" name="order_number" class="form-control" id="project-order-input"
                                placeholder="Enter Order Number" value="<?php echo e($portfolio['order_number']); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </form>

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



            var priority = <?php echo json_encode($portfolio['priority']); ?>;
            // console.log(priority);
            priority == '1' ? $("#order_id_div").show() : $("#order_id_div").hide();
            $('#inputPriority').on('change', function() {
                // Get the selected value from the first select element
                const selectedValue = $(this).val();
                // Clear the existing options
                $('#inputStatus').empty();

                // Add options based on the selected value
                if (selectedValue === '1') {
                    $("#order_id_div").show();
                    // Append the 'Public' option
                    $('#inputStatus').append($('<option>', {
                        value: '1',
                        text: 'Public'
                    }));
                    // console.log($('#inputStatus').html());
                } else if (selectedValue === '2') {
                    $("#order_id_div").hide();
                    // Append the 'Public' option
                    $('#inputStatus').append($('<option>', {
                        value: '1',
                        text: 'Public'
                    }));

                    // Append the 'Private' option
                    $('#inputStatus').append($('<option>', {
                        value: '2',
                        text: 'Private'
                    }));
                    // console.log($('#inputStatus').html());
                }
            });

        });
    </script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Collaborate/editPortfolio.blade.php ENDPATH**/ ?>