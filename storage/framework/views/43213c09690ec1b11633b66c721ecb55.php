<?php $__env->startSection('title'); ?> Portfolio <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?> ERGOSUMDEUS <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?> Portfolio <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4 card-border-effect-none">
                <div class="bg-soft-primary">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            <?php
                                            if($portfolio['logo_image'] != null){
                                                $src = URL::asset('thumbnail/'.$portfolio['logo_image']);
                                            }else{
                                                $src = URL::asset('images\noimage.png');
                                            } ?>
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="<?php echo $src;?>" alt="" class="avatar-md rounded">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold"><?php echo e($portfolio['title']); ?></h4>
                                            <!-- <div class="hstack gap-3 flex-wrap">
                                                <div><i class="ri-building-line align-bottom me-1"></i> Themesbrand</div>
                                                <div class="vr"></div>
                                                <div>Create Date : <span class="fw-medium">15 Sep, 2021</span></div>
                                                <div class="vr"></div>
                                                <div>Due Date : <span class="fw-medium">29 Dec, 2021</span></div>
                                                <div class="vr"></div>
                                                <div class="badge rounded-pill bg-info fs-12">New</div>
                                                <div class="badge rounded-pill bg-danger fs-12">High</div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-auto">
                                <div class="hstack gap-1 flex-wrap">
                                    <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                        <i class="ri-star-fill"></i>
                                    </button>
                                    <button type="button" class="btn py-0 fs-16 text-body">
                                        <i class="ri-share-line"></i>
                                    </button>
                                    <button type="button" class="btn py-0 fs-16 text-body">
                                        <i class="ri-flag-line"></i>
                                    </button>
                                </div>
                            </div> -->
                        </div>

                        <!-- <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview"
                                    role="tab">
                                    Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-documents" role="tab">
                                    Documents
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-activities" role="tab">
                                    Activities
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-team" role="tab">
                                    Team
                                </a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content text-muted">
                <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-muted">
                                        <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>
                                        <?php echo $portfolio['content']; ?>


                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                            <div class="row">

                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Create Date :</p>
                                                        <h5 class="fs-15 mb-0"><?php echo \Carbon\Carbon::parse($portfolio['created_at'])->format('d F,Y');?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Year :</p>
                                                        <h5 class="fs-15 mb-0"><?php echo e($portfolio['year']); ?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Priority :</p>
                                                        <div class="badge fs-12 text-bg-<?php echo e($portfolio['priority'] == '1' ? 'success' : 'primary'); ?>"><span class=""><?php echo e($portfolio['priority'] == '1' ? 'Portfolio' : 'Archive'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Status :</p>
                                                        <div class="badge fs-12 text-bg-<?php echo e($portfolio['status'] == '1' ? 'success' : 'primary'); ?>"><span class=""><?php echo e($portfolio['status'] == '1' ? 'Public' : 'Private'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                            <div class="card-header justify-content-between d-flex">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Attachments</h6>
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#varyingcontentModal"><i class="ri-upload-2-fill me-1 align-bottom"></i> Upload</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="border m-2 rounded">
                                                        <div class=" align-items-center card-body position-relative">
                                                            <img src="<?php echo e(URL::asset('thumbnail/'.$value)); ?>" alt="" class="img-fluid" width="150px" />
                                                            <a class="btn btn-icon text-muted btn-sm fs-18 position-absolute fs-5 top-0 end-0 mt-0 me-0" href="<?php echo e(url('admin/delete_image/'.$portfolio['id'].'/'.$value)); ?>" style=" transform: translate(10px,-10px);" aria-expanded="false"> <i class="ri-close-fill"></i>  </a>
                                                        </div>
                                                    </div> 
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <!-- end row -->
                                        </div>

                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- ene col -->
                        <div class="col-xl-3 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Services</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-16">
                                        <?php $serviceTag = explode(',', $portfolio['services'])?>
                                        <?php if(count($serviceTag) != 0): ?>
                                            <?php $__currentLoopData = $serviceTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="badge fw-medium badge-soft-primary"><?php echo e(\App\Models\Service::where('id',$tag)->value('service')); ?></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header align-items-center d-flex border-bottom-dashed">
                                    <h4 class="card-title mb-0 flex-grow-1">Partners</h4>
                                    <!-- <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#inviteMembersModal"><i
                                                class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                    </div> -->
                                </div>

                                <div class="card-body">
                                    <div data-simplebar class="mx-n3 px-3">
                                        <div class="vstack gap-3">
                                            <?php $partnerTag = explode(',', $portfolio['partners'])?>
                                            <?php if(count($partnerTag) != 0): ?>
                                                <?php $__currentLoopData = $partnerTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $partner_image = \App\Models\ConvergeLinks::where('id',$value)->value('logo_image');
                                                if($partner_image != null){
                                                    $image_path = URL::asset('thumbnail/'.$partner_image);
                                                }else{
                                                    $image_path = URL::asset('images\user.png');
                                                } ?>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="<?php echo $image_path;?>" alt=""
                                                                class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block"><?php echo e(\App\Models\ConvergeLinks::where('id',$value)->value('partner')); ?></a></h5>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                            <!-- end member item -->
                                        </div>
                                        <!-- end list -->
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end tab pane -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- Varying modal content -->
    <div class="modal fade" id="varyingcontentModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST"  enctype="multipart/form-data" action="<?php echo e(url('admin/image_upload/'.$portfolio['id'])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Upload New Images</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="customer-image" class="col-form-label">Select Images:</label>
                            <input class="form-control" id="" type="file" name="image[]"
                            accept="image/png, image/gif, image/jpeg" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/pages/modal.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/project-overview.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_7.4\htdocs\ESD-Laravel\resources\views/Collaborate/view.blade.php ENDPATH**/ ?>