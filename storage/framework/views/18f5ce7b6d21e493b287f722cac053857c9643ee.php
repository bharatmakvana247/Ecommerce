    
    <?php $__env->startSection('content'); ?>
        <div class="pages_agile_info_w3l">
            <div class="over_lay_agile_pages_w3ls">
                <div class=" registration">
                    <div class="signin-form profile">
                        <h2>Sign in Form</h2>
                        <div class="login-form">
                            <form action="<?php echo e(route('user.customLogin')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="email" name="email" placeholder="E-mail">
                                <?php if($errors->has('email')): ?>
                                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                                        <?php echo e($errors->first('email')); ?></div>
                                <?php endif; ?>
                                <input type="password" name="password" placeholder="Password">
                                <?php if($errors->has('password')): ?>
                                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                                        <?php echo e($errors->first('password')); ?></div>
                                <?php endif; ?>
                                <div class="tp">
                                    <input type="submit" value="SIGN IN">
                                </div>
                            </form>
                        </div>
                        <div class="login-social-grids">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo e(route('login.google')); ?>"><i class="fa fa-google"></i></a></li>
                                <li><a href="<?php echo e(route('login.github')); ?>"><i class="fa fa-github"></i></a></li>
                            </ul>
                        </div>
                        <p><a href="<?php echo e(route('forget.create')); ?>"> Forget Password?</a></p>
                        <h6><a href="<?php echo e(route('User.RegisterCreate')); ?>"> Sing Up?</a></h6>
                    </div>
                </div>
            </div>
        </div>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/BHARAT/CDS-2021/CDS/laravel/resources/views/admin/user/login.blade.php ENDPATH**/ ?>