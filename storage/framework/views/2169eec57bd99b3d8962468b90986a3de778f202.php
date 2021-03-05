

<style>

    .nav-link.active{ 
      color: #eb8e4f !important; 
      border: 1px solid #eb8e4f;
    }
    .navbar-nav .nav-item .nav-link{
      font-size:12px;
      border-right:1px solid #eb8e4f;
    }
    .page-main-header .main-header-right .nav-right>ul>li {
      padding: 1px 12px !important;
      margin-right: 7px !important;
    }
    </style>
    
   
    
    <div class="page-main-header">
      <div class="main-header-right" style="padding-top:0px;">
        <div class="mobile-sidebar">
          <div class="media-body text-right switch-sm">
          </div>
        </div>
        <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
                <div style="text-align: center; padding: 8px 0 5px 0; background-color: #f7f7fe">
                   <a href="<?php echo e(route('shipments.create')); ?>" class="btn btn-primary btn-md" style="border-radius: 35px; color: white;"><b> Add Shipment </b> </a>
                </div>
                <?php endif; ?>
    
        <nav class="navbar navbar-expand-lg navbar-light " >
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" >
          <?php if(auth()->check() && auth()->user()->hasRole('admin|operation|customer|account')): ?>
                   <li class="nav-item active">
                      <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'index' ? 'active' : ''); ?>" href="<?php echo e(route('index')); ?>"><span> Dashboard</span>
                      </a>
                   </li>
                   <?php endif; ?>
                   <?php if(auth()->check() && auth()->user()->hasRole('operation')): ?>
                   <li class="nav-item active">
                    <a href="<?php echo e(route('customer.bookingform')); ?>" class="nav-link menu-title <?php echo e(Route::currentRouteName()=='customer.bookingform' ? 'active' : ''); ?>"><span>Booking Form</span></a>
                   </li>
                   <?php endif; ?>
                   <?php if(auth()->check() && auth()->user()->hasRole('operation')): ?>
                   <li class="nav-item active">
                      <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'booked-scan' ? 'active' : ''); ?>" href="<?php echo e(route('booked-scan')); ?>"><span>Arival</span>
                      </a>
                   </li>
                   <?php endif; ?>
                   <?php if(auth()->check() && auth()->user()->hasRole('operation')): ?>
                   <li class="nav-item active">
                      <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'reports' ? 'active' : ''); ?>" href=""><span>Mainifist</span>
                      </a>
                   </li>
                   <?php endif; ?>
                  
                   <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                   <li class="nav-item active">
                      <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'booked-scan' ? 'active' : ''); ?>" href="<?php echo e(route('booked-scan')); ?>"><span>Arival</span>
                      </a>
                   </li>
                   <?php endif; ?>
                  <!-----------------
                   <?php if(auth()->check() && auth()->user()->hasRole('admin|customer')): ?>
                   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Return Advices
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('notdone')); ?>">Not Done</a>
              <a class="dropdown-item" href="<?php echo e(route('done')); ?>">Done</a>
            </div>
          </li>
                   <?php endif; ?>
       ---------------------------->
      
                   <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
                      
                      <li class="nav-item active">
                         <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'customer-shipments' ? 'active' : ''); ?>" href="<?php echo e(route('customer-shipments')); ?>"></i><span>Shipments</span>
                         </a>
                      </li>
    
                      <li class="nav-item active">
                         <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'customer.reports' ? 'active' : ''); ?>" href="<?php echo e(route('customer.reports')); ?>"><span>Reports</span>
                         </a>
                      </li>
                      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('pickups.index')); ?>">Pickup Locations</a>
              <a class="dropdown-item" href="<?php echo e(route('services')); ?>">Services</a>
            </div>
          </li>
                   <?php endif; ?>
                   <?php if(auth()->check() && auth()->user()->hasRole('admin|')): ?>
                   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Shipments
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('shipments.index')); ?>">All Shipments</a>
              <a class="dropdown-item" href="<?php echo e(route('shipments.new')); ?>">Booked Shipments</a>
              <a class="dropdown-item" href="<?php echo e(route('shipments.arrived')); ?>">Arrived Shipments</a>
              <a class="dropdown-item" href="<?php echo e(route('shipments.in-transit')); ?>">In-Transit Shipments</a>
              <a class="dropdown-item" href="<?php echo e(route('shipments.delivered')); ?>">Delivered Shipments</a>
              <a class="dropdown-item" href="<?php echo e(route('shipments.returned')); ?>">Returned Shipments</a>
            </div>
          </li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_user')): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Customers
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('customer.create')); ?>">Create Customer</a>
              <a class="dropdown-item" href="<?php echo e(route('customer.index')); ?>" >Show Customer</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('admin.create')); ?>" >Create Admin</a>
              <a class="dropdown-item" href="<?php echo e(route('admin.index')); ?>" >Show Admin</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Operation
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('operation.create')); ?>" >Create Operation</a>
              <a class="dropdown-item" href="<?php echo e(route('operation.index')); ?>" >Show Operation</a>
            </div>
          </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Accountant
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('account.create')); ?>">Create account</a>
              <a class="dropdown-item" href="<?php echo e(route('account.index')); ?>">Show account</a>
              
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Rider
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('rider.create')); ?>" >Create Rider</a>
              <a class="dropdown-item" href="<?php echo e(route('rider.index')); ?>">Show Rider</a>
         
            </div>
          </li>
          <?php endif; ?>
          <?php if(auth()->check() && auth()->user()->hasRole('admin|operation|rider')): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Generate
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo e(route('sheets.index')); ?>">Delivery Sheet</a>
              <a class="dropdown-item" href="<?php echo e(route('ph2.index')); ?>">PH2</a>
            </div>
          </li>
          <?php endif; ?>
          <?php if(auth()->check() && auth()->user()->hasRole('account')): ?>
          <li class="nav-item active">
            <a class="nav-link menu-title" href="<?php echo e(route('collection')); ?>"><span>COD</span>
            </a>
         </li>
          
          <li class="nav-item active">
            <a class="nav-link menu-title" href="<?php echo e(route('account.generateslips')); ?>"><span>Generate Slips</span>
            </a>
         </li>
          <?php endif; ?>
          <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
          <li class="nav-item active">
           <a class="nav-link menu-title <?php echo e(Route::currentRouteName() == 'customer.reports' ? 'active' : ''); ?>" href="<?php echo e(route('customer.reports')); ?>"><span>Reports</span>
           </a>
        </li>
        <?php endif; ?>
     <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
     <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item"  href="<?php echo e(route('notifications')); ?>">Notifications</a>
              <a class="dropdown-item"href="<?php echo e(route('settings')); ?>">Settings</a>
            </div>
          </li>
                   <?php endif; ?>
                   
    
                  
        </ul>
      </div>
     
    </nav>
    
    <!-------------Navbar END---------------------->
    <div class="nav-right col pull-right right-menu">
          <ul class="nav-menus">
            <li class="px-0">
            </li>
            <li class="onhover-dropdown"><i data-feather="bell"></i>
              <ul class="notification-dropdown onhover-show-div">
                <?php if(auth()->check() && auth()->user()->hasRole('admin|')): ?>
                  <li>
                    <h6 class="f-w-600">Notifications</h6><span class="f-12">You have <?php echo e($noti_to_admin_count); ?> unread messages</span>
                  </li>
    
                  <?php $__currentLoopData = $noti_to_admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"> </i><a href="<?php echo e($notification->link); ?>"><?php echo e($notification->notification_text); ?></a><span class="pull-right"><?php echo e($notification->created_at->diffForHumans()); ?></span></p>
                    </li> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
                <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
                  <li>
                    <h6 class="f-w-600">Notifications</h6><span class="f-12">You have <?php echo e($noti_to_cust_count); ?> unread messages</span>
                  </li>
    
                  <?php $__currentLoopData = $noti_to_cust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"> </i><a href="<?php echo e($notification->link); ?>"><?php echo e($notification->notification_text); ?></a><span class="pull-right"><?php echo e($notification->created_at->diffForHumans()); ?></span></p>
                    </li> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <li></li>
                <li class="bg-light txt-dark" style="padding-top: 15px !important"><a href="<?php echo e(route('all-notifications')); ?>">All </a> notification</li>
              </ul>
    
              <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
              <div class="txt" style="background-color: green; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;"><?php echo e($noti_to_admin_count); ?></div>
              <?php endif; ?>
    
              <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
              <div class="txt" style="background-color: green; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;"><?php echo e($noti_to_cust_count); ?></div>
              <?php endif; ?>
            </li>
    
            
    
            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <li class="onhover-dropdown"><i data-feather="message-circle"></i>
              <div class="txt" style="background-color: red; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;"><?php echo e($admin_message_count); ?></div>
            </li>
            <?php endif; ?>
    
            <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
            <li class="onhover-dropdown"><i data-feather="message-circle"></i>
              <ul class="chat-dropdown onhover-show-div p-t-20 p-b-20">
                <?php $__currentLoopData = $advice_noti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <div class="media">
                      <span style="background-color: #ec6400; font-weight: 800; color: white; padding: 4px 5px; border-radius: 3px; margin-right: 10px;"><?php echo e($noti->consignment_no); ?></span>
                      <a href="<?php echo e(route('shipment.advice', $noti->id)); ?>">
                        <div class="media-body">
                          <p class="f-12 mb-0 light-font">Waiting for advice...</p>
                          <p class="f-12 mb-0 font-primary"><?php echo e($noti->updated_at->diffForHumans()); ?></p>
                        </div>
                      </a>
                    </div>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="light-font text-center"><a href="<?php echo e(route('customer.notdone')); ?>">View All</a></li>
              </ul>
              <div class="txt" style="background-color: red; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;"><?php echo e($advice_noti_count); ?></div>
            </li>
            <?php endif; ?>
            <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
            
            <li class="onhover-dropdown px-0"><span class="media user-header"><img class="mr-2 rounded-circle img-35" src="<?php echo e(asset('assets/images/zippy/icon-2-01.jpg')); ?>" width="35px" alt=""><span class="media-body"><span class="f-12 f-w-600"><?php echo e(Auth::user()->name); ?></span><span class="d-block"><?php echo e(Auth::User()->getRoleNames()->implode(' ')); ?></span></span></span>
              <ul class="profile-dropdown onhover-show-div">
                <a href="/profile"><li><i data-feather="user"> </i>Profile</li></a>
                <li><i data-feather="log-out"></i>
                  <a class="border-0 pl-0" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                  </a>
        
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo csrf_field(); ?>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
    
        
      </div>
    </div><?php /**PATH D:\Zippy\resources\views/layouts/simple/header2.blade.php ENDPATH**/ ?>