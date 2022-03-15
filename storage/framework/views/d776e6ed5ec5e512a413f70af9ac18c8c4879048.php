<div class="slider-area plr-185 mb-80 section">
    <div class="container-fluid">
        <div class="slider-content">
            <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                <?php $__currentLoopData = $slider_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12">
                        <div class="layer-1">
                            <div class="slider-img">
                                <a href="<?php echo e(route('userside.single_product', $val->id)); ?>">
                                    <img src="<?php echo e(url('uploads/' . $val->product_image)); ?>" alt=""
                                        style="width: 744px; height:558px;">
                                </a>
                            </div>
                            <div class="slider-info gray-bg">
                                <div class="slider-info-inner">
                                    <h1 class="slider-title-1 text-uppercase text-black-1">
                                        <?php echo e(Str::limit($val->product_name, 20)); ?>

                                    </h1>
                                    <div class="slider-brief text-black-2">
                                        <?php echo Str::limit($val->product_details, 586); ?>

                                    </div>

                                    <?php if(auth()->guard()->check()): ?>
                                        <a href="javascript:void(0)" title="Add to cart" data-id="<?php echo e($val->id); ?>"
                                            class="button extra-small button-black cart_add">
                                            <span class="text-uppercase">Buy now</span>
                                        </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal"
                                            class="button extra-small button-black ">
                                            <span class="text-uppercase">Buy now</span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\INFUSION\Ecommerce\resources\views/user/pages/slider/slider.blade.php ENDPATH**/ ?>