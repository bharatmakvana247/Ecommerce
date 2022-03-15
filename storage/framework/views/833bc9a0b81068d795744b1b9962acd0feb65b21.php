<li class="second logo">
    <h1><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
            <?php if(Auth::check()): ?>
                CDS - <?php echo e(Auth::user()->name); ?>

            <?php endif; ?>
        </a></h1>
</li>
<li class="second admin-pic">
    <ul class="top_dp_agile">
        <li class="dropdown profile_details_drop">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img">
                    <span class="prfil-img">
                        <?php if(Auth::check() && Auth::user()->avatar): ?>
                            <img src="<?php echo e(url('uploads/' . Auth::user()->avatar)); ?>" style="max-width: 50px; min-width: 50px;
                            max-height: 50px; min-height: 45px;" alt="<?php echo e(Auth::user()->name); ?>">
                        <?php else: ?>
                            <img src="<?php echo e(asset('admin/images/a2.jpg')); ?>" alt="">
                        <?php endif; ?>
                    </span>
                </div>
            </a>
            <ul class=" dropdown-menu drp-mnu">
                <li> <a href="<?php echo e(route('profile')); ?>"><i class="fa fa-user"></i> Profile</a> </li>
                <li> <a href="<?php echo e(route('logout')); ?>"><i class=" fa fa-sign-out"></i> Logout</a> </li>
            </ul>
        </li>
    </ul>
</li>




<?php /**PATH /var/www/html/BHARAT/CDS-2021/CDS/laravel/resources/views/admin/theme/header.blade.php ENDPATH**/ ?>