<header class="main-nav">
   <nav>
      <div class="main-navbar">
         <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
         <div id="mainnav">
            <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
            <div style="text-align: center; padding: 8px 0 5px 0; background-color: #f7f7fe">
               <a href="<?php echo e(route('shipments.create')); ?>" class="btn btn-primary btn-md" style="border-radius: 35px; color: white;">Add Shipment</a>
            </div>
            <?php endif; ?>
            <ul class="nav-menu custom-scrollbar">
               <li class="back-btn">
                  <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
               </li>

               <?php if(auth()->check() && auth()->user()->hasRole('admin|operation|customer')): ?>
               <li class="dropdown">
                  <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'index' ? 'active' : ''); ?>" href="<?php echo e(route('index')); ?>"><i data-feather="home"></i><span>Dashboard</span>
                  </a>
               </li>
               <?php endif; ?>

               <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
               <li class="dropdown">
                  <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'booked-scan' ? 'active' : ''); ?>" href="<?php echo e(route('booked-scan')); ?>"><i data-feather="file-text"></i><span>Scan Barcode</span>
                  </a>
               </li>

               
               <li class="dropdown">
                  <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/advices' ? 'active' : ''); ?>" href="#"><i data-feather="message-circle"></i><span>Return Advices</span>
                     <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/advices' ? 'down' : 'right'); ?>"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/advices' ? 'block;' : 'none'); ?>">
                     <li><a href="<?php echo e(route('notdone')); ?>" class="<?php echo e(Route::currentRouteName()=='notdone' ? 'active' : ''); ?>">Not Done</a></li>
                     <li><a href="<?php echo e(route('done')); ?>" class="<?php echo e(Route::currentRouteName()=='done' ? 'active' : ''); ?>">Done</a></li>
                  </ul>
               </li> 
               <?php endif; ?>

               <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/c-advices' ? 'active' : ''); ?>" href="#"><i data-feather="message-circle"></i><span>Return Advices</span>
                        <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/c-advices' ? 'down' : 'right'); ?>"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/c-advices' ? 'block;' : 'none'); ?>">
                        <li><a href="<?php echo e(route('customer.notdone')); ?>" class="<?php echo e(Route::currentRouteName()=='customer.notdone' ? 'active' : ''); ?>">Not Done</a></li>
                        <li><a href="<?php echo e(route('customer.done')); ?>" class="<?php echo e(Route::currentRouteName()=='customer.done' ? 'active' : ''); ?>">Done</a></li>
                     </ul>
                  </li> 

                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'customer-shipments' ? 'active' : ''); ?>" href="<?php echo e(route('customer-shipments')); ?>"><i data-feather="truck"></i><span>Shipments</span>
                     </a>
                  </li>

                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'customer.reports' ? 'active' : ''); ?>" href="<?php echo e(route('customer.reports')); ?>"><i data-feather="clipboard"></i><span>Reports</span>
                     </a>
                  </li>

                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/accounts' ? 'active' : ''); ?>" href="#"><i data-feather="settings"></i><span>Accounts</span>
                        <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/accounts' ? 'down' : 'right'); ?>"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/accounts' ? 'block;' : 'none'); ?>">
                        <li><a href="<?php echo e(route('pickups.index')); ?>" class="<?php echo e(Route::currentRouteName()=='pickups.index' ? 'active' : ''); ?>">Pickup Locations</a></li>
                     </ul>
                     <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/accounts' ? 'block;' : 'none'); ?>">
                        <li><a href="<?php echo e(route('services')); ?>" class="<?php echo e(Route::currentRouteName()=='services' ? 'active' : ''); ?>">Services</a></li>
                     </ul>
                  </li>
               <?php endif; ?>

               <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
               <li class="dropdown">
                  <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/shipment' ? 'active' : ''); ?>" href="#"><i data-feather="truck"></i><span>Shipments</span>
                     <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/shipment' ? 'down' : 'right'); ?>"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/shipment' ? 'block;' : 'none'); ?>">
                     <li><a href="<?php echo e(route('shipments.index')); ?>" class="<?php echo e(Route::currentRouteName()=='shipments.index' ? 'active' : ''); ?>">All Shipments</a></li>
                     <li><a href="<?php echo e(route('shipments.new')); ?>" class="<?php echo e(Route::currentRouteName()=='shipments.new' ? 'active' : ''); ?>">Booked Shipments</a></li>
                     <li><a href="<?php echo e(route('shipments.arrived')); ?>" class="<?php echo e(Route::currentRouteName()=='shipments.arrived' ? 'active' : ''); ?>">Arrived Shipments</a></li>
                     <li><a href="<?php echo e(route('shipments.in-transit')); ?>" class="<?php echo e(Route::currentRouteName()=='shipments.in-transit' ? 'active' : ''); ?>">In-Transit Shipments</a></li>
                     <li><a href="<?php echo e(route('shipments.delivered')); ?>" class="<?php echo e(Route::currentRouteName()=='shipments.delivered' ? 'active' : ''); ?>">Delivered Shipments</a></li>
                     <li><a href="<?php echo e(route('shipments.returned')); ?>" class="<?php echo e(Route::currentRouteName()=='shipments.returned' ? 'active' : ''); ?>">Returned Shipments</a></li>
                  </ul>
               </li> 
               <?php endif; ?>

               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_user')): ?>
                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/customer' ? 'active' : ''); ?>" href="#"><i data-feather="users"></i><span>Customers</span>
                        <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/customer' ? 'down' : 'right'); ?>"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/customer' ? 'block;' : 'none'); ?>">
                        <li><a href="<?php echo e(route('customer.create')); ?>" class="<?php echo e(Route::currentRouteName()=='customer.create' ? 'active' : ''); ?>">Create Customer</a></li>
                        <li><a href="<?php echo e(route('customer.index')); ?>" class="<?php echo e(Route::currentRouteName()=='customer.index' ? 'active' : ''); ?>">Show Customer</a></li>
                        <li><a href="<?php echo e(route('customer.bookingform')); ?>" class="<?php echo e(Route::currentRouteName()=='customer.bookingform' ? 'active' : ''); ?>">Booking Form</a></li>
                     </ul>
                  </li> 

                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/admin' ? 'active' : ''); ?>" href="#"><i data-feather="user"></i><span>Admin</span>
                        <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/admin' ? 'down' : 'right'); ?>"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/admin' ? 'block;' : 'none'); ?>">
                        <li><a href="<?php echo e(route('admin.create')); ?>" class="<?php echo e(Route::currentRouteName()=='admin.create' ? 'active' : ''); ?>">Create Admin</a></li>
                        <li><a href="<?php echo e(route('admin.index')); ?>" class="<?php echo e(Route::currentRouteName()=='admin.index' ? 'active' : ''); ?>">Show Admin</a></li>
                     </ul>
                  </li> 

                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/operation' ? 'active' : ''); ?>" href="#"><i data-feather="activity"></i><span>Operation</span>
                        <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/operation' ? 'down' : 'right'); ?>"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/operation' ? 'block;' : 'none'); ?>">
                        <li><a href="<?php echo e(route('operation.create')); ?>" class="<?php echo e(Route::currentRouteName()=='operation.create' ? 'active' : ''); ?>">Create Operation</a></li>
                        <li><a href="<?php echo e(route('operation.index')); ?>" class="<?php echo e(Route::currentRouteName()=='operation.index' ? 'active' : ''); ?>">Show Operation</a></li>
                     </ul>
                  </li>

                  <li class="dropdown">
                     <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/rider' ? 'active' : ''); ?>" href="#"><i data-feather="user"></i><span>Rider</span>
                        <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/rider' ? 'down' : 'right'); ?>"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/rider' ? 'block;' : 'none'); ?>">
                        <li><a href="<?php echo e(route('rider.create')); ?>" class="<?php echo e(Route::currentRouteName()=='rider.create' ? 'active' : ''); ?>">Create Rider</a></li>
                        <li><a href="<?php echo e(route('rider.index')); ?>" class="<?php echo e(Route::currentRouteName()=='rider.index' ? 'active' : ''); ?>">Show Rider</a></li>
                     </ul>
                  </li> 
               <?php endif; ?>

               <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
               <li class="dropdown">
                  <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'reports' ? 'active' : ''); ?>" href="<?php echo e(route('reports')); ?>"><i data-feather="clipboard"></i><span>Reports</span>
                  </a>
               </li>
               <?php endif; ?>

               <?php if(auth()->check() && auth()->user()->hasRole('admin|operation|rider')): ?>
               <li class="dropdown">
                  <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/generate' ? 'active' : ''); ?>" href="#"><i data-feather="file-text"></i><span>Generate</span>
                     <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/generate' ? 'down' : 'right'); ?>"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/generate' ? 'block;' : 'none'); ?>">
                     <li><a href="<?php echo e(route('sheets.index')); ?>" class="<?php echo e(Route::currentRouteName()=='sheets.index' ? 'active' : ''); ?>">Delivery Sheet</a></li>
                  </ul>
                  <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/generate' ? 'block;' : 'none'); ?>">
                     <li><a href="<?php echo e(route('ph2.index')); ?>" class="<?php echo e(Route::currentRouteName()=='ph2.index' ? 'active' : ''); ?>">PH2</a></li>
                  </ul>
               </li>
               <?php endif; ?>

               <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
               <li class="dropdown">
                  <a class="nav-link menu-title <?php echo e(request()->route()->getPrefix() == '/settings' ? 'active' : ''); ?>" href="#"><i data-feather="settings"></i><span>Settings</span>
                     <div class="according-menu"><i class="fa fa-angle-double-<?php echo e(request()->route()->getPrefix() == '/settings' ? 'down' : 'right'); ?>"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: <?php echo e(request()->route()->getPrefix() == '/settings' ? 'block;' : 'none'); ?>">
                     <li><a href="<?php echo e(route('notifications')); ?>" class="<?php echo e(Route::currentRouteName()=='notifications' ? 'active' : ''); ?>">Notifications</a></li>
                     <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                     <li><a href="<?php echo e(route('settings')); ?>" class="<?php echo e(Route::currentRouteName()=='settings' ? 'active' : ''); ?>">Settings</a></li>
                     <?php endif; ?>
                  </ul>
               </li>
               <?php endif; ?>
               
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
   </nav>
</header><?php /**PATH C:\xampp\htdocs\Zippy\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>