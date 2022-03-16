<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>

    <body class="wide-layout">
        <div class="wrapper">
            
            <?php echo $__env->make('user.pages.slider.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section id="page-content" class="page-wrapper section">
                <div class="banner-section ptb-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-item banner-2">
                                    <div class="banner-img">
                                        <a href="#"><img src="<?php echo e(asset('user/img/banner/2.jpg')); ?>" alt=""></a>
                                    </div>
                                    <h3 class="banner-title-2"><a href="#">sony smartphone</a></h3>
                                    <h3 class="pro-price">&#8377 869.00</h3>
                                    <div class="banner-button">
                                        <a href="#">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="banner-item banner-3">
                                    <div class="banner-img">
                                        <a href="#"><img src="<?php echo e(asset('user/img/banner/3.jpg')); ?>" alt=""></a>
                                    </div>
                                    <div class="banner-info">
                                        <h3 class="banner-title-2"><a href="#">Product Name</a></h3>
                                        <ul class="banner-featured-list">
                                            <li><i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span></li>
                                            <li><i class="zmdi zmdi-check"></i><span>amet, consectetur</span></li>
                                            <li><i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span></li>
                                            <li><i class="zmdi zmdi-check"></i><span>eiusmod tempor</span></li>
                                            <li><i class="zmdi zmdi-check"></i><span>labore et dolore.</span></li>
                                        </ul>
                                        <div class="banner-button">
                                            <a href="#">Discover <i class="zmdi zmdi-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 d-block d-md-none d-lg-block">
                                <div class="banner-item banner-4">
                                    <div class="banner-img">
                                        <a href="#"><img src="<?php echo e(asset('user/img/banner/4.jpg')); ?>" alt=""></a>
                                    </div>
                                    <h3 class="banner-title-2"><a href="#">phone name</a></h3>
                                    <div class="banner-button">
                                        <a href="#">Shop now <i class="zmdi zmdi-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($products)): ?>
                    <div class="featured-product-section section-bg-tb pt-80 pb-55">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title text-left mb-20">
                                        <h2 class="uppercase">new products</h2>
                                        <h6>There are many variations of passages of brands available,</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-product">
                                <div class="row active-featured-product slick-arrow-2">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product-item product-item-2">
                                            <div class="product-img" id="back_img">
                                                <a href="<?php echo e(route('userside.single_product', $product->id)); ?>">
                                                    <img src="<?php echo e(url('uploads/' . $product->product_image)); ?> "
                                                        style="height: 150px; width:260px" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="<?php echo e(route('userside.single_product', $product->id)); ?>"><?php echo e($product->product_name); ?>

                                                    </a>
                                                </h6>
                                                <h6 class="brand-name"><?php echo e($product->brand->brand_name); ?></h6>
                                                <h3 class="pro-price">&#8377 <?php echo number_format((float) $product->product_price, 2); ?></h3>
                                            </div>
                                            <ul class="action-button">
                                                <?php
                                                    $wishlist = App\Models\Wishlist::where('product_id', $product->id)
                                                        ->orWhere('user_id', Auth::user()->id)
                                                        ->get();
                                                    
                                                ?>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <?php if(sizeof($wishlist)): ?>
                                                        <li>
                                                            <a href="javascript:void(0)" title="Wishlist"
                                                                class="wishlist_add active" data-id="<?php echo e($product->id); ?>"><i
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
                                                    <a href="javascript:void(0)" class="ShowProduct" title="Quickview"
                                                        data-id="<?php echo e($product->id); ?>"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <li>
                                                        <a href="javascript:void(0)" title="Add to cart" class="cart_add"
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        </div>
        <div class="up-comming-product-section ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="up-comming-pro gray-bg up-comming-pro-2 clearfix">
                            <div class="up-comming-pro-img f-left">
                                <a href="#">
                                    <img src="<?php echo e(asset('user/img/up-comming/2.jpg')); ?>" alt="">
                                </a>
                            </div>
                            <div class="up-comming-pro-info f-left">
                                <h3><a href="#">Dummy Product Name</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do eiusmod
                                    tempor incididunt
                                    ut labore et dolores top magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exer citation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. laborum. </p>
                                <div class="up-comming-time-2 clearfix">
                                    <div data-countdown="2019/01/15"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-block d-md-none d-lg-block">
                        <div class="banner-item banner-1">
                            <div class="ribbon-price">
                                <span>&#8377 896.00</span>
                            </div>
                            <div class="banner-img">
                                <a href="#"><img src="<?php echo e(asset('user/img/banner/1.jpg')); ?>" alt=""></a>
                            </div>
                            <div class="banner-info">
                                <h3><a href="#">Product Name</a></h3>
                                <ul class="banner-featured-list">
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                                    </li>
                                    <li>
                                        <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-section section-bg-tb pt-80 pb-55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title text-left mb-40">
                            <h2 class="uppercase">product list</h2>
                            <h6>There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-tab pro-tab-menu pro-tab-menu-2 text-right">
                            <ul class="nav">
                                <li><a class="active" href="#popular-product" data-toggle="tab">Most Visited Products
                                    </a></li>
                                <li><a href="#new-arrival" data-toggle="tab">New Arrival</a></li>
                                <li><a href="#best-seller" data-toggle="tab">Best Seller</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <?php echo $__env->make('user.theme.most_visited_prod', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('user.theme.new_arrival_prod', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('user.theme.best_seller_prod', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <?php echo $__env->make('user.theme.latest_blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="newsletter-section section-bg-tb pt-60 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter">
                            <div class="newsletter-info text-center">
                                <h2 class="newsletter-title">get a newsletter</h2>
                                <p>Make sure that you never miss our interesting news <br class="hidden-xs">by
                                    joining our
                                    newsletter program.</p>
                            </div>
                            <div class="subcribe clearfix">
                                <form action="#">
                                    <input type="text" name="email" placeholder="Enter your email here..." />
                                    <button class="submit-btn-2 btn-hover-2" type="submit">subcribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        </div>
    </body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        #back_img {
            background-image: url('product_Admin/white.png');
            background-position: right bottom, left top;
            background-repeat: no-repeat, repeat;
            padding: 15px;
        }


        .product-item-2 .action-button>li>.active {
            color: #ff7f00
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/BHARAT/Laravel/Ecommerce/resources/views/user/layouts/index.blade.php ENDPATH**/ ?>