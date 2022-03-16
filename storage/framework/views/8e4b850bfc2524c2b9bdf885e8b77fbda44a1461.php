<?php $__env->startSection('title'); ?>
    404
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <div id="page-content" class="page-wrapper section">
        <div class="error-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error-404 box-shadow">
                            <img src="<?php echo e(asset('user/img/others/error.jpg')); ?>" alt="">
                            <div class="go-to-btn btn-hover-2">
                                <a href="<?php echo e(route('userside')); ?>">go to home page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/BHARAT/Laravel/Ecommerce/resources/views/user/pages/error/404.blade.php ENDPATH**/ ?>