 <li class="gn-trigger">
     <a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
     <nav class="gn-menu-wrapper">
         <div class="gn-scroller scrollbar1">
             <ul class="gn-menu agile_menu_drop">
                 <li><a href="{{ route('dashboard') }}"> <i class="fa fa-tachometer"></i> Dashboard</a></li>

                 <li>
                     @if (Auth::check())
                         <a href="{{ route('product.index') }}" class="productIndex"> <i class="fa fa-product-hunt"
                                 aria-hidden="true"></i>Product <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     @endif

                     {{-- <ul class="gn-submenu">
                         <li class="mini_list_agile"><a href="{{ route('product.create') }}"><i
                                     class="fa fa-caret-right" aria-hidden="true"></i> Add Product</a></li>
                         <li class="mini_list_w3"><a href="{{ route('product.index') }}"><i class="fa fa-caret-right"
                                     aria-hidden="true"></i> View Product</a></li>
                     </ul> --}}
                 </li>

                 <li>
                     <a href="{{ route('category_index') }}"> <i class="fa fa-list-alt"
                             aria-hidden="true"></i>Category <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     {{-- <ul class="gn-submenu">
                         <li class="mini_list_agile"><a href="{{ route('category_create') }}"><i
                                     class="fa fa-caret-right" aria-hidden="true"></i> Add Category</a></li>
                         <li class="mini_list_w3"><a href="{{ route('category_index') }}"><i class="fa fa-caret-right"
                                     aria-hidden="true"></i> View Category</a></li>
                     </ul> --}}
                 </li>


                 <li>
                     <a href="{{ route('brand_index') }}"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>Brand
                         <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                     {{-- <ul class="gn-submenu">
                         <li class="mini_list_agile"><a href="{{ route('brand_create') }}"><i
                                     class="fa fa-caret-right" aria-hidden="true"></i> Add Brand</a></li>
                         <li class="mini_list_w3"><a href="{{ route('brand_index') }}"><i class="fa fa-caret-right"
                                     aria-hidden="true"></i> View Brand</a></li>
                     </ul> --}}
                 </li>

                 {{-- <li>
                     <a href="#"> <i class="fa fa-suitcase" aria-hidden="true"></i>More <i class="fa fa-angle-down"
                             aria-hidden="true"></i></a>
                     <ul class="gn-submenu">
                         <li class="mini_list_agile"><a href="faq.html"> <i class="fa fa-caret-right"
                                     aria-hidden="true"></i> Faq</a></li>
                         <li class="mini_list_w3"><a href="blank.html"> <i class="fa fa-caret-right"
                                     aria-hidden="true"></i> Blank Page</a></li>
                     </ul>
                 </li> --}}
             </ul>
         </div><!-- /gn-scroller -->
     </nav>
 </li>
 <!-- //nav_agile_w3l -->
