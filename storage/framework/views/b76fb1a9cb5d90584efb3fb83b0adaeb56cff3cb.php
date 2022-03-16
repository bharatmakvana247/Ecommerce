    <div id="popular-product" class="tab-pane active show">
        <?php if(sizeof($most_visited_products) > 0): ?>

            <div class="row">
                <?php $__currentLoopData = $most_visited_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="product-item product-item-2">
                            <div class="product-img">
                                <a href="<?php echo e(route('userside.single_product', $item->product_list->id)); ?>">
                                    <img src="<?php echo e(url('uploads/' . $item->product_list->product_image)); ?> " alt="" />
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="single-product.html"><?php echo e($item->product_list->product_name); ?></a>
                                </h6>
                                <h6 class="brand-name"><?php echo e($item->product_list->brand->brand_name); ?></h6>
                                <h3 class="pro-price">&#8377 <?php echo $item->product_list->product_price; ?></h3>
                            </div>
                            <ul class="action-button">
                                <?php
                                    $wishlist = App\Models\Wishlist::where('product_id', $item->id)->get();
                                ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(sizeof($wishlist)): ?>
                                        <li>
                                            <a href="javascript:void(0)" title="Wishlist" class="wishlist_add active"
                                                data-id="<?php echo e($item->id); ?>"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="javascript:void(0)" title="Wishlist" data-id="<?php echo e($item->id); ?>"
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
                                        data-id="<?php echo e($item->id); ?>"><i class="zmdi zmdi-zoom-in"></i></a>
                                </li>
                                <?php if(auth()->guard()->check()): ?>
                                    <li>
                                        <a href="javascript:void(0)" title="Add to cart" class="cart_add"
                                            data-id="<?php echo e($item->id); ?>"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
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


            </div>
        <?php else: ?>
            <h4>No Data Found</h4>
        <?php endif; ?>

    </div>
<?php /**PATH /var/www/html/BHARAT/Laravel/Ecommerce/resources/views/user/theme/most_visited_prod.blade.php ENDPATH**/ ?>