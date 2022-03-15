<div id="new-arrival" class="tab-pane" role="tabpanel">
    <div class="row">
        <?php if(sizeof($new_arrival_products) > 0): ?>
            <?php $__currentLoopData = $new_arrival_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_arrival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4">
                    <div class="product-item product-item-2">
                        <div class="product-img">
                            <a href="<?php echo e(route('userside.single_product', $new_arrival->id)); ?>">
                                <img src="<?php echo e(url('uploads/' . $new_arrival->product_image)); ?> "
                                    style="height: 150px; width:260px" alt="" />
                            </a>
                        </div>
                        <div class="product-info">
                            <h6 class="product-title">
                                <a
                                    href="<?php echo e(route('userside.single_product', $new_arrival->id)); ?>"><?php echo e($new_arrival->product_name); ?></a>
                            </h6>
                            <h6 class="brand-name"><?php echo e($new_arrival->brand->brand_name); ?></h6>
                            <h3 class="pro-price">$<?php echo number_format((float) $new_arrival->product_price, 2); ?></h3>
                        </div>
                        <ul class="action-button">
                            <?php
                                $wishlist = App\Models\Wishlist::where('product_id', $new_arrival->id)->get();
                            ?>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(sizeof($wishlist)): ?>
                                    <li>
                                        <a href="javascript:void(0)" title="Wishlist" class="wishlist_add active"
                                            data-id="<?php echo e($new_arrival->id); ?>"><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="javascript:void(0)" title="Wishlist" data-id="<?php echo e($new_arrival->id); ?>"
                                            class="wishlist_add"><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal"
                                        title="Quickview"><i class="zmdi zmdi-favorite"></i></a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="javascript:void(0)" class="ShowProduct" title="Quickview"
                                    data-id="<?php echo e($new_arrival->id); ?>"><i class="zmdi zmdi-zoom-in"></i></a>
                            </li>
                            <?php if(auth()->guard()->check()): ?>
                                <li>
                                    <a href="javascript:void(0)" title="Add to cart" class="cart_add"
                                        data-id="<?php echo e($new_arrival->id); ?>"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal"
                                        title="Quickview"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    </div>
</div>
<?php /**PATH E:\INFUSION\Ecommerce\resources\views/user/theme/new_arrival_prod.blade.php ENDPATH**/ ?>