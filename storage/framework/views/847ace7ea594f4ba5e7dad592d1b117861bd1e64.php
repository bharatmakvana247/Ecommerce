<!doctype html>
<html class="no-js" lang="en">
<?php echo $__env->make('user.theme.header_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="wide-layout">
    <div class="wrapper">
        <?php echo $__env->make('user.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section id="page-content" class="page-wrapper section">
            <?php if(Route::current()->uri() != 'userside'): ?>
                <?php echo $__env->make('user.theme.bread', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php echo $__env->yieldContent('mainContent'); ?>
        </section>
        <?php echo $__env->make('user.theme.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('user.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('user.theme.footer_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /var/www/html/BHARAT/CDS-2021/CDS/laravel/resources/views/user/layouts/app.blade.php ENDPATH**/ ?>