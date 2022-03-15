<!-- Placed JS at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="<?php echo e(asset('user/js/vendor/jquery-3.1.1.min.js')); ?>"></script>
<!-- Popper js -->
<script src="<?php echo e(asset('user/js/popper.min.js')); ?>"></script>
<!-- Bootstrap framework js -->
<script src="<?php echo e(asset('user/js/bootstrap.min.js')); ?>"></script>
<!-- jquery.nivo.slider js -->
<script src="<?php echo e(asset('user/lib/js/jquery.nivo.slider.js')); ?>"></script>
<!-- All js plugins included in this file. -->
<script src="<?php echo e(asset('user/js/plugins.js')); ?>"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="<?php echo e(asset('user/js/main.js')); ?>"></script>
<script>
    var Project_Url = '<?php echo e(env('Project_Url')); ?>';

</script>
<script src="<?php echo e(asset('js/feedback.js')); ?>"></script>
<script src="<?php echo e(asset('js/add_cart.js')); ?>"></script>

<script>
    $(document).on("click", "a.cart_add", function(e) {
        var row = $(this);
        var id = $(this).attr('data-id');
        var number = $(".number").val();
        $.ajax({
            url: "<?php echo e(route('userside.cart.store')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                number: number,
                id: id
            },
            success: function(msg) {
                if (msg.status == 'success') {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Your Product Successfully Added To Cart',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Your Product Dont Successfully Added To Cart',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                }
                // $('.testdata').html(msg);
                // $('#productModal').modal('show');
            },
            error: function() {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Plz Login',
                    showConfirmButton: false,
                    timer: 3000
                }).then(function() {
                    location.reload();
                });
                // alert("error");
                // swal("Error!", 'Error in Record Not Show', "error");
            }
        });
    });



    $(document).on("click", "a.cart_remove", function(e) {
        var row = $(this);
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo e(route('userside.cart.delete', [''])); ?>" + "/" + id,
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                id: id
            },
            success: function(msg) {
                if (msg.status == 'success') {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Your Product Removed Successfully',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Plz Check & Remove Product',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                }
            },
            error: function() {
                swal.fire("error");
            }
        });
    })


    $(document).on("click", "a.wishlist_remove", function(e) {
        var row = $(this);
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo e(route('userside.wishlist.delete', [''])); ?>" + "/" + id,
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                id: id
            },
            success: function(msg) {
                if (msg.status == 'success') {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Your Wishlist Remove',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Plz Chcek & Remove Wishlist',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                }
            },
            error: function() {
                swal.fire("error");
            }
        });
    })

    $(document).on("click", "a.add_to_cart", function(e) {
        alert("suc")
        var row = $(this);
        var id = $(this).attr('data-id');
        alert("CArt")
        $.ajax({
            url: "<?php echo e(route('userside.wishlist.addtocart', [''])); ?>" + "/" + id,
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                id: id
            },
            success: function(msg) {
                if (msg.status == 'success') {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Your Wishlist Remove',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Your Wishlist Dont Remove',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                }
            },
            error: function() {
                swal.fire("error");
            }
        });
    })

    $(document).on("click", "a.wishlist_add", function(e) {
        var row = $(this);
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo e(route('userside.wishlist.store', [''])); ?>" + "/" + id,
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                id: id
            },
            success: function(msg) {
                if (msg.status == 'success') {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Your Wishlist Addded',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Your Wishlist removed',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function() {
                        location.reload();
                    });
                }
            },
            error: function() {
                swal.fire("error");
            }
        });
    })

    $(document).on("click", "a.ShowProduct", function(e) {
        var row = $(this);
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo e(route('userside.product.show')); ?>",
            type: 'get',
            data: {
                id: id
            },
            success: function(msg) {
                $('.testdata').html(msg);
                $('#productModal').modal('show');
            },
            error: function() {
                swal.fire("Error!", 'Error in Record Not Show', "error");
            }
        });
    });

</script>


<?php echo $__env->yieldContent('scripts'); ?>
<?php /**PATH E:\INFUSION\Ecommerce\resources\views/user/theme/footer_script.blade.php ENDPATH**/ ?>