<div id="best-seller" class="tab-pane" role="tabpanel">
    <div class="row">
        <?php $__currentLoopData = $best_sellerproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($product['checkout_list']); ?>

            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php /**PATH /var/www/html/BHARAT/CDS-2021/CDS/laravel/resources/views/user/theme/best_seller_prod.blade.php ENDPATH**/ ?>