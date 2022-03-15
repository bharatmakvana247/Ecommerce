
<?php $__env->startSection('content'); ?>
    <div class="pages_agile_info_w3l">
        <div class="over_lay_agile_pages_w3ls two">
            <div class="registration">
                <div class="signin-form profile">
                    <h2>Sign up Form</h2>
                    <div class="login-form">
                        <form action="<?php echo e(route('user.customRegister')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="name" placeholder="Username" value="<?php echo e(old('name')); ?>">
                            <?php if($errors->has('name')): ?>
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    <?php echo e($errors->first('name')); ?></div>
                            <?php endif; ?>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo e(old('email')); ?>">
                            <?php if($errors->has('email')): ?>
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    <?php echo e($errors->first('email')); ?></div>
                            <?php endif; ?>
                            <input type="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
                            <?php if($errors->has('password')): ?>
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    <?php echo e($errors->first('password')); ?></div>
                            <?php endif; ?>
                            <input type="password" name="password" placeholder="Confirm Password">
                            <?php if($errors->has('password')): ?>
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    <?php echo e($errors->first('password')); ?></div>
                            <?php endif; ?>

                            <input type="file" name="avatar">

                            <div class="tp">
                                <input type="submit" value="SIGN UP">
                            </div>
                        </form>
                    </div>
                    <h6><a href="<?php echo e(route('user.loginCreate')); ?>">Sing In?</a>
                        <h6>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\INFUSION\Ecommerce\resources\views/admin/user/register.blade.php ENDPATH**/ ?>