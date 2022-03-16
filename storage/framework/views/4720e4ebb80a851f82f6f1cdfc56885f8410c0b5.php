<footer id="footer" class="footer-area section">
    <div class="footer-top">
        <div class="container-fluid">
            <div class="plr-185">
                <div class="footer-top-inner gray-bg">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <div class="single-footer footer-about">
                                <div class="footer-logo">
                                    <img src="<?php echo e(asset('user/img/logo/logo.png')); ?>" alt="">
                                </div>
                                <div class="footer-brief">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem
                                        Ipsum has been the subas industry's standard dummy text ever since the
                                        1500s,
                                    </p>
                                    <p>When an unknown printer took a galley of type and If you are going to use a
                                        passage of Lorem Ipsum scrambled it to make.</p>
                                </div>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" href="#" title="Facebook"><i
                                                class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" href="#" title="Google Plus"><i
                                                class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#" title="Twitter"><i
                                                class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 d-block d-xl-block d-lg-none d-md-none">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">Shipping</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle"></i><span>New Products</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle"></i><span>Discount
                                                Products</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle"></i><span>Best Sell
                                                Products</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle"></i><span>Popular
                                                Products</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle"></i><span>Manufactirers</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle"></i><span>Suppliers</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-circle"></i><span>Special
                                                Products</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">my account</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="my-account.html"><i class="zmdi zmdi-circle"></i><span>My
                                                Account</span></a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html"><i class="zmdi zmdi-circle"></i><span>My
                                                Wishlist</span></a>
                                    </li>
                                    <li>
                                        <a href="cart.html"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
                                    </li>
                                    <li>
                                        <a href="login.html"><i class="zmdi zmdi-circle"></i><span>Sign
                                                In</span></a>
                                    </li>
                                    <li>
                                        <a href="login.html"><i
                                                class="zmdi zmdi-circle"></i><span>Registration</span></a>
                                    </li>
                                    <li>
                                        <a href="checkout.html"><i class="zmdi zmdi-circle"></i><span>Check
                                                out</span></a>
                                    </li>
                                    <li>
                                        <a href="order.html"><i class="zmdi zmdi-circle"></i><span>Oder
                                                Complete</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">Get in touch</h4>
                                <div class="footer-message">
                                    <form action="" method="POST" id="formFeedback">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="status" value="feedback">
                                        <input type="text" name="name" id="name" placeholder="Your name here...">
                                        <span class="alert-danger" role="alert" id="name_error"></span>

                                        <input type="text" name="email" id="email" placeholder="Your email here...">
                                        <span class="text-danger" id="email_error"></span>

                                        <textarea class="height-80" id="message" name="message"
                                            placeholder="Your messege here..."></textarea>
                                        <span class="text-danger" id="message_error"></span>

                                        <?php if($errors->has('message')): ?>
                                            <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                <?php echo e($errors->first('message')); ?>

                                            </div>
                                        <?php endif; ?>
                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">submit
                                            message</button>
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom black-bg">
        <div class="container-fluid">
            <div class="plr-185">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p class="copy-text"> © <?php echo e(date('Y')); ?> <strong>CDS</strong> Made With <i
                                        class="zmdi zmdi-favorite" style="color: red;" aria-hidden="true"></i> By <a
                                        class="company-name" href="http://127.0.0.1:8000/userside">
                                        <strong> Infusion Team</strong></a>.</p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-payment text-right">
                                <li>
                                    <a href="#"><img src="<?php echo e(asset('user/img/payment/1.jpg')); ?>" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo e(asset('user/img/payment/2.jpg')); ?>" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo e(asset('user/img/payment/3.jpg')); ?>" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo e(asset('user/img/payment/4.jpg')); ?>" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- START QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body testdata">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login -->
<!-- START QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade loginModal" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product clearfix">
                        <div class="product-info">
                            <form action="<?php echo e(route('user.customLogin')); ?>" method="post"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="login-account p-30 box-shadow">
                                    <p>If you have an account with us, Please log in.</p>
                                    <input type="text" name="email" placeholder="Email Address">
                                    <?php if($errors->has('email')): ?>
                                        <div class="alert alert-danger" role="alert" style="padding: 5px">
                                            <?php echo e($errors->first('email')); ?></div>
                                    <?php endif; ?>
                                    <input type="password" name="password" placeholder="Password">
                                    <?php if($errors->has('password')): ?>
                                        <div class="alert alert-danger" role="alert" style="padding: 5px">
                                            <?php echo e($errors->first('password')); ?></div>
                                    <?php endif; ?>
                                    
                                    <button class="submit-btn-1 btn-hover-1" type="submit">login</button>
                                </div>
                            </form>
                            

                        </div><!-- .product-info -->
                    </div><!-- .modal-product -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
</div>
<!-- END QUICKVIEW PRODUCT -->
<?php /**PATH /var/www/html/BHARAT/Laravel/Ecommerce/resources/views/user/theme/footer.blade.php ENDPATH**/ ?>