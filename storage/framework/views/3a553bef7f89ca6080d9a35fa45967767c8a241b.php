 <li class="gn-trigger">
     <a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
     <nav class="gn-menu-wrapper">
         <div class="gn-scroller scrollbar1">
             <ul class="gn-menu agile_menu_drop">
                 <li><a href="<?php echo e(route('dashboard')); ?>"> <i class="fa fa-tachometer"></i> Dashboard</a></li>

                 <li>
                     <?php if(Auth::check()): ?>
                         <a href="<?php echo e(route('product.index')); ?>" class="productIndex"> <i class="fa fa-product-hunt"
                                 aria-hidden="true"></i>Product <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     <?php endif; ?>

                     
                 </li>

                 <li>
                     <a href="<?php echo e(route('category_index')); ?>"> <i class="fa fa-list-alt"
                             aria-hidden="true"></i>Category <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     
                 </li>


                 <li>
                     <a href="<?php echo e(route('brand_index')); ?>"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>Brand
                         <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     
                 </li>

                 
             </ul>
         </div><!-- /gn-scroller -->
     </nav>
 </li>
 <!-- //nav_agile_w3l -->
<?php /**PATH /var/www/html/BHARAT/Laravel/Ecommerce/resources/views/admin/theme/sidebar.blade.php ENDPATH**/ ?>