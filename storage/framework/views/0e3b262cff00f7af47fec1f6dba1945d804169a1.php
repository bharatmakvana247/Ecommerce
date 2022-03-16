<div class="col-lg-3 order-lg-1 order-2">
    <!-- widget-search -->
    <aside class="widget-search mb-30">
        <form action="" class="autocomplete" name="autocomplete">
            
            <input type="text" placeholder="Search here..." name="search" id="jayminmodi" autocomplete="off">
            <button type="submit"><i class="zmdi zmdi-search"></i></button>
        </form>
    </aside>
    <!-- widget-categories -->
    <aside class="widget widget-categories box-shadow mb-30">
        <h6 class="widget-title border-left mb-20">Categories</h6>
        <div id="cat-treeview" class="product-cat">
            <ul>
                <?php if(sizeof($category_list) > 0): ?>
                    <?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php if($list->id == $filterkey): ?> open <?php else: ?> closed <?php endif; ?>"><a href="javascript:void(0)"><?php echo e($list->category_name); ?></a>
                            <?php if(sizeof($list->product_list) > 0): ?>
                                <ul>
                                    <?php $__currentLoopData = $list->product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a
                                                href="<?php echo e(route('userside.single_product', $product->id)); ?>"><?php echo e($product->product_name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
    </aside>
    <!-- shop-filter -->
    <aside class="widget shop-filter box-shadow mb-30">
        <h6 class="widget-title border-left mb-20">Price</h6>
        <div class="price_filter">
            <div class="price_slider_amount">
                <input type="submit" value="Your range :">
                <input type="hidden" id="amount_min" name="price" placeholder="Add Your Price">
                <input type="hidden" id="amount_max" name="price" placeholder="Add Your Price">
                <input type="text" id="amount" name="price" placeholder="Add Your Price" disabled>
            </div>
            <div id="slider-range"> </div>

        </div>
    </aside>

    <!-- widget-product -->
    <aside class="widget widget-product box-shadow">
        <h6 class="widget-title border-left mb-20">recent products</h6>
        <!-- product-item start -->
        <?php $__currentLoopData = $recent_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-item">
                <div class="product-img">
                    <a href="<?php echo e(route('userside.single_product', $product->id)); ?>">
                        <img src="<?php echo e(url('uploads/' . $product->product_image)); ?> "
                            alt="<?php echo e(url('uploads/' . $product->product_image)); ?> " alt=""
                            style="max-height: 71px; max-width: 78px;" />
                    </a>
                </div>
                <div class="product-info">
                    <h6 class="product-title">
                        <a
                            href="<?php echo e(route('userside.single_product', $product->id)); ?>"><?php echo e($product->product_name); ?></a>
                    </h6>
                    <h3 class="pro-price">$<?php echo number_format((float) $product->product_price, 2); ?></h3>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </aside>
</div>
<?php /**PATH /var/www/html/BHARAT/Laravel/Ecommerce/resources/views/user/theme/fliter.blade.php ENDPATH**/ ?>