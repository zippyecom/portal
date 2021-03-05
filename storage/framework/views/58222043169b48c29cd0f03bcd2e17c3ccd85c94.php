<div class="page-main-header">
  <div class="main-header-right">
    <div class="mobile-sidebar">
      <div class="media-body text-right switch-sm">
        <label class="switch">
          <input id="sidebar-toggle" type="checkbox" data-toggle=".container" checked="checked"><span class="switch-state"></span>
        </label>
      </div>
    </div>
    <div class="main-header-left ml-2">
      <div class="logo-wrapper"><a href="<?php echo e(route('/')); ?>"><img width="200px" height="40" src="/images/logos/<?php echo e($main_logo); ?>" alt=""></a></div>
    </div>
    <div class="nav-right col pull-right right-menu">
      <ul class="nav-menus">
        <li class="px-0">
        </li>
        <li class="onhover-dropdown"><i data-feather="bell"></i>
          <ul class="notification-dropdown onhover-show-div">
            <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
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

          <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
          <div class="txt" style="background-color: green; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;"><?php echo e($noti_to_admin_count); ?></div>
          <?php endif; ?>

          <?php if(auth()->check() && auth()->user()->hasRole('customer')): ?>
          <div class="txt" style="background-color: green; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;"><?php echo e($noti_to_cust_count); ?></div>
          <?php endif; ?>
        </li>

        

        <?php if(auth()->check() && auth()->user()->hasRole('admin|operation')): ?>
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
</div><?php /**PATH C:\Users\BitsnIO-2\Videos\Zippy\resources\views/layouts/simple/header1.blade.php ENDPATH**/ ?>