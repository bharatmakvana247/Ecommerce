<html>

<head>
    <title>Admin - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Esteem" />

    <link href="<?php echo e(asset('admin/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('admin/css/component.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo e(asset('admin/css/font-awesome.css')); ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('admin.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
<script>
    <?php if(Session::has('message')): ?>
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.success("<?php echo e(session('message')); ?>");
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

</script>

</html>
<?php /**PATH E:\INFUSION\Ecommerce\resources\views/admin/layouts/auth.blade.php ENDPATH**/ ?>