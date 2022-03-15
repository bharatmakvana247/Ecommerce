
<?php $__env->startSection('title'); ?>
    Product Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <div class="wrapper">
        <div id="page-content" class="page-wrapper section">
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="shop-content">
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="nav shop-tab f-left" role="tablist">
                                        <li>
                                            <a class="active" href="#grid-view" data-toggle="tab"><i
                                                    class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li>
                                            <a href="#list-view" data-toggle="tab"><i
                                                    class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- short-by -->
                                    <?php if(sizeof($categories) > 0): ?>
                                        <div class="short-by f-left text-center">
                                            <span>Sort by :</span>

                                            <select id="category_list">
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($categories_list->id); ?>">
                                                        <?php echo e($categories_list->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <!-- showing -->
                                    <div class="showing f-right text-right record">
                                        Total Showing : <?php echo e($count_records); ?>

                                        
                                    </div>
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    <?php if(sizeof($products)): ?>
                                        <div id="grid-view" class="tab-pane active show" role="tabpanel">
                                            <div class="row bidst">
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="product-item">
                                                            <div class="product-img">
                                                                <a
                                                                    href="<?php echo e(route('userside.single_product', $product->id)); ?>">
                                                                    <img src="<?php echo e(url('uploads/' . $product->product_image)); ?>"
                                                                        alt="<?php echo e($product->product_image); ?>"
                                                                        style="max-height: 262px;">
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a
                                                                        href="<?php echo e(route('userside.single_product', $product->id)); ?>"><?php echo e($product->product_name); ?></a>
                                                                </h6>
                                                                <div class="pro-rating">
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                                </div>
                                                                <h3 class="pro-price">$<?php echo number_format((float) $product->product_price, 2); ?></h3>
                                                                <ul class="action-button">
                                                                    <?php
                                                                        $wishlist = App\Models\Wishlist::where('product_id', $product->id)->get();
                                                                    ?>
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                        <?php if(sizeof($wishlist)): ?>
                                                                            <li
                                                                                style="background: #FF7F00; border-color: #FF7F00; color: #fff; border-radius: 50%;">
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    class="wishlist_add"
                                                                                    data-id="<?php echo e($product->id); ?>"
                                                                                    style="background: transparent;border: 1px solid #ddd;border-radius: 50%;color: #FFF;display: block;font-size: 14px;height: 30px;text-align: center;width: 30px;"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        <?php else: ?>
                                                                            <li>
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    data-id="<?php echo e($product->id); ?>"
                                                                                    class="wishlist_add"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-favorite"></i></a>
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <li>
                                                                        <a href="javascript:void(0)" class="ShowProduct"
                                                                            title="Quickview"
                                                                            data-id="<?php echo e($product->id); ?>"><i
                                                                                class="zmdi zmdi-zoom-in"></i></a>
                                                                    </li>
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                        <li>
                                                                            <a href="javascript:void(0)" title="Add to cart"
                                                                                class="cart_add"
                                                                                data-id="<?php echo e($product->id); ?>"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    <?php endif; ?>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <!-- product-item end -->
                                            </div>
                                            <div class="row bids" style="display: none">

                                            </div>
                                        </div>
                                        <!-- list-view -->
                                        <div id="list-view" class="tab-pane" role="tabpanel">
                                            <div class="row">
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-12">
                                                        <div class="shop-list product-item">
                                                            <div class="product-img">
                                                                <a
                                                                    href="<?php echo e(route('userside.single_product', $product->id)); ?>">
                                                                    <img src="<?php echo e(url('uploads/' . $product->product_image)); ?>"
                                                                        alt="" style="max-height: 262px;">
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="clearfix">
                                                                    <h6 class="product-title f-left">
                                                                        <a
                                                                            href="<?php echo e(route('userside.single_product', $product->id)); ?>"><?php echo e($product->product_name); ?>

                                                                        </a>
                                                                    </h6>
                                                                    <div class="pro-rating f-right">
                                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                                        <a href="#"><i
                                                                                class="zmdi zmdi-star-outline"></i></a>
                                                                    </div>
                                                                </div>
                                                                <h6 class="brand-name mb-30">
                                                                    <?php echo e($product->brand->brand_name); ?>

                                                                </h6>
                                                                <h3 class="pro-price">$<?php echo number_format((float) $product->product_price, 2); ?></h3>
                                                                <p><?php echo Str::limit($product->product_details, 10); ?></p>
                                                                <ul class="action-button">
                                                                    <?php
                                                                        $wishlist = App\Models\Wishlist::where('product_id', $product->id)->get();
                                                                    ?>
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                        <?php if(sizeof($wishlist)): ?>
                                                                            <li
                                                                                style="background: #FF7F00; border-color: #FF7F00; color: #fff; border-radius: 50%;">
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    class="wishlist_add"
                                                                                    data-id="<?php echo e($product->id); ?>"
                                                                                    style="background: transparent;border: 1px solid #ddd;border-radius: 50%;color: #FFF;display: block;font-size: 14px;height: 30px;text-align: center;width: 30px;"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        <?php else: ?>
                                                                            <li>
                                                                                <a href="javascript:void(0)" title="Wishlist"
                                                                                    data-id="<?php echo e($product->id); ?>"
                                                                                    class="wishlist_add"><i
                                                                                        class="zmdi zmdi-favorite"></i></a>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-favorite"></i></a>
                                                                        </li>
                                                                    <?php endif; ?>

                                                                    <li>
                                                                        <a href="javascript:void(0)" class="ShowProduct"
                                                                            title="Quickview"
                                                                            data-id="<?php echo e($product->id); ?>"><i
                                                                                class="zmdi zmdi-zoom-in"></i></a>
                                                                    </li>
                                                                    <?php if(auth()->guard()->check()): ?>
                                                                        <li>
                                                                            <a href="javascript:void(0)" title="Add to cart"
                                                                                class="cart_add"
                                                                                data-id="<?php echo e($product->id); ?>"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li>
                                                                            <a href="javascript:void(0)" data-toggle="modal"
                                                                                data-target=".loginModal" title="Quickview"><i
                                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('product_Admin/comingsoon.jpg')); ?>" alt=""
                                            style="height: 500px;width: 500px;margin-left: 197px;margin-bottom: 15px;">
                                    <?php endif; ?>

                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                <ul
                                    class="shop-pagination box-shadow text-center ptblr-10-30 pagination pagination-md justify-content-center">
                                    <?php echo e($products->links('pagination::bootstrap-4')); ?>

                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <?php echo $__env->make('user.theme.fliter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/product_category.js')); ?>"></script>
    <script src="<?php echo e(asset('js/product_range.js')); ?>"></script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\INFUSION\Ecommerce\resources\views/user/pages/product/product.blade.php ENDPATH**/ ?>