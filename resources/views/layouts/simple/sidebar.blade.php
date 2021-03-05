<!-------------------
<header class="main-nav">
   <nav>
      <div class="main-navbar">
         <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
         <div id="mainnav">
            @hasrole('customer')
            <div style="text-align: center; padding: 8px 0 5px 0; background-color: #f7f7fe">
               <a href="{{route('shipments.create')}}" class="btn btn-primary btn-md" style="border-radius: 35px; color: white;">Add Shipment</a>
            </div>
            @endhasrole
            <ul class="nav-menu custom-scrollbar">
               <li class="back-btn">
                  <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
               </li>

               @hasrole('admin|operation|customer|account')
               <li class="dropdown">
                  <a class="nav-link menu-title {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" href="{{route('index')}}"><i data-feather="home"></i><span>Dashboard</span>
                  </a>
               </li>
               @endhasrole

               @hasrole('admin|operation')
               <li class="dropdown">
                  <a class="nav-link menu-title {{ Route::currentRouteName() == 'booked-scan' ? 'active' : '' }}" href="{{route('booked-scan')}}"><i data-feather="file-text"></i><span>Scan Barcode</span>
                  </a>
               </li>
               <li class="dropdown">
                  <a class="nav-link menu-title {{ Route::currentRouteName() == 'collection' ? 'active' : '' }}" href="{{route('collection')}}"><i data-feather="file-text"></i><span>Collection</span>
                  </a>
               </li>
               <li class="dropdown">
                  <a class="nav-link menu-title {{request()->route()->getPrefix() == '/advices' ? 'active' : '' }}" href="#"><i data-feather="message-circle"></i><span>Return Advices</span>
                     <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/advices' ? 'down' : 'right' }}"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/advices' ? 'block;' : 'none' }}">
                     <li><a href="{{route('notdone')}}" class="{{ Route::currentRouteName()=='notdone' ? 'active' : '' }}">Not Done</a></li>
                     <li><a href="{{route('done')}}" class="{{ Route::currentRouteName()=='done' ? 'active' : '' }}">Done</a></li>
                  </ul>
               </li> 
               @endhasrole

               @hasrole('customer')
                  <li class="dropdown">
                     <a class="nav-link menu-title {{request()->route()->getPrefix() == '/c-advices' ? 'active' : '' }}" href="#"><i data-feather="message-circle"></i><span>Return Advices</span>
                        <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/c-advices' ? 'down' : 'right' }}"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/c-advices' ? 'block;' : 'none' }}">
                        <li><a href="{{route('customer.notdone')}}" class="{{ Route::currentRouteName()=='customer.notdone' ? 'active' : '' }}">Not Done</a></li>
                        <li><a href="{{route('customer.done')}}" class="{{ Route::currentRouteName()=='customer.done' ? 'active' : '' }}">Done</a></li>
                     </ul>
                  </li> 

                  <li class="dropdown">
                     <a class="nav-link menu-title {{ Route::currentRouteName() == 'customer-shipments' ? 'active' : '' }}" href="{{route('customer-shipments')}}"><i data-feather="truck"></i><span>Shipments</span>
                     </a>
                  </li>

                  <li class="dropdown">
                     <a class="nav-link menu-title {{ Route::currentRouteName() == 'customer.reports' ? 'active' : '' }}" href="{{route('customer.reports')}}"><i data-feather="clipboard"></i><span>Reports</span>
                     </a>
                  </li>

                  <li class="dropdown">
                     <a class="nav-link menu-title {{request()->route()->getPrefix() == '/accounts' ? 'active' : '' }}" href="#"><i data-feather="settings"></i><span>Accounts</span>
                        <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/accounts' ? 'down' : 'right' }}"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/accounts' ? 'block;' : 'none' }}">
                        <li><a href="{{route('pickups.index')}}" class="{{ Route::currentRouteName()=='pickups.index' ? 'active' : '' }}">Pickup Locations</a></li>
                     </ul>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/accounts' ? 'block;' : 'none' }}">
                        <li><a href="{{route('services')}}" class="{{ Route::currentRouteName()=='services' ? 'active' : '' }}">Services</a></li>
                     </ul>
                  </li>
               @endhasrole

               @hasrole('admin|operation')
               <li class="dropdown">
                  <a class="nav-link menu-title {{request()->route()->getPrefix() == '/shipment' ? 'active' : '' }}" href="#"><i data-feather="truck"></i><span>Shipments</span>
                     <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/shipment' ? 'down' : 'right' }}"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/shipment' ? 'block;' : 'none' }}">
                     <li><a href="{{route('shipments.index')}}" class="{{ Route::currentRouteName()=='shipments.index' ? 'active' : '' }}">All Shipments</a></li>
                     <li><a href="{{route('shipments.new')}}" class="{{ Route::currentRouteName()=='shipments.new' ? 'active' : '' }}">Booked Shipments</a></li>
                     <li><a href="{{route('shipments.arrived')}}" class="{{ Route::currentRouteName()=='shipments.arrived' ? 'active' : '' }}">Arrived Shipments</a></li>
                     <li><a href="{{route('shipments.in-transit')}}" class="{{ Route::currentRouteName()=='shipments.in-transit' ? 'active' : '' }}">In-Transit Shipments</a></li>
                     <li><a href="{{route('shipments.delivered')}}" class="{{ Route::currentRouteName()=='shipments.delivered' ? 'active' : '' }}">Delivered Shipments</a></li>
                     <li><a href="{{route('shipments.returned')}}" class="{{ Route::currentRouteName()=='shipments.returned' ? 'active' : '' }}">Returned Shipments</a></li>
                  </ul>
               </li> 
               @endhasrole

               @can('add_user')
                  <li class="dropdown">
                     <a class="nav-link menu-title {{request()->route()->getPrefix() == '/customer' ? 'active' : '' }}" href="#"><i data-feather="users"></i><span>Customers</span>
                        <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/customer' ? 'down' : 'right' }}"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/customer' ? 'block;' : 'none' }}">
                        <li><a href="{{route('customer.create')}}" class="{{ Route::currentRouteName()=='customer.create' ? 'active' : '' }}">Create Customer</a></li>
                        <li><a href="{{route('customer.index')}}" class="{{ Route::currentRouteName()=='customer.index' ? 'active' : '' }}">Show Customer</a></li>
                        <li><a href="{{route('customer.bookingform')}}" class="{{ Route::currentRouteName()=='customer.bookingform' ? 'active' : '' }}">Booking Form</a></li>
                     </ul>
                  </li> 

                  <li class="dropdown">
                     <a class="nav-link menu-title {{request()->route()->getPrefix() == '/admin' ? 'active' : '' }}" href="#"><i data-feather="user"></i><span>Admin</span>
                        <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/admin' ? 'down' : 'right' }}"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/admin' ? 'block;' : 'none' }}">
                        <li><a href="{{route('admin.create')}}" class="{{ Route::currentRouteName()=='admin.create' ? 'active' : '' }}">Create Admin</a></li>
                        <li><a href="{{route('admin.index')}}" class="{{ Route::currentRouteName()=='admin.index' ? 'active' : '' }}">Show Admin</a></li>
                     </ul>
                  </li> 

                  <li class="dropdown">
                     <a class="nav-link menu-title {{request()->route()->getPrefix() == '/operation' ? 'active' : '' }}" href="#"><i data-feather="activity"></i><span>Operation</span>
                        <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/operation' ? 'down' : 'right' }}"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/operation' ? 'block;' : 'none' }}">
                        <li><a href="{{route('operation.create')}}" class="{{ Route::currentRouteName()=='operation.create' ? 'active' : '' }}">Create Operation</a></li>
                        <li><a href="{{route('operation.index')}}" class="{{ Route::currentRouteName()=='operation.index' ? 'active' : '' }}">Show Operation</a></li>
                     </ul>
                  </li>

                  <li class="dropdown">
                     <a class="nav-link menu-title {{request()->route()->getPrefix() == '/account' ? 'active' : '' }}" href="#"><i data-feather="activity"></i><span>Account</span>
                        <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/account' ? 'down' : 'right' }}"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/account' ? 'block;' : 'none' }}">
                        <li><a href="{{route('account.create')}}" class="{{ Route::currentRouteName()=='account.create' ? 'active' : '' }}">Create account</a></li>
                        <li><a href="{{route('account.index')}}" class="{{ Route::currentRouteName()=='account.index' ? 'active' : '' }}">Show account</a></li>
                     </ul>
                  </li>

                  <li class="dropdown">
                     <a class="nav-link menu-title {{request()->route()->getPrefix() == '/rider' ? 'active' : '' }}" href="#"><i data-feather="user"></i><span>Rider</span>
                        <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/rider' ? 'down' : 'right' }}"></i></div>
                     </a>
                     <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/rider' ? 'block;' : 'none' }}">
                        <li><a href="{{route('rider.create')}}" class="{{ Route::currentRouteName()=='rider.create' ? 'active' : '' }}">Create Rider</a></li>
                        <li><a href="{{route('rider.index')}}" class="{{ Route::currentRouteName()=='rider.index' ? 'active' : '' }}">Show Rider</a></li>
                     </ul>
                  </li> 
               @endcan

               @hasrole('admin|operation')
               <li class="dropdown">
                  <a class="nav-link menu-title {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}" href="{{route('reports')}}"><i data-feather="clipboard"></i><span>Reports</span>
                  </a>
               </li>
               @endhasrole

               @hasrole('admin|operation|rider|account')
               <li class="dropdown">
                  <a class="nav-link menu-title {{request()->route()->getPrefix() == '/generate' ? 'active' : '' }}" href="#"><i data-feather="file-text"></i><span>Generate</span>
                     <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/generate' ? 'down' : 'right' }}"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/generate' ? 'block;' : 'none' }}">
                     <li><a href="{{route('sheets.index')}}" class="{{ Route::currentRouteName()=='sheets.index' ? 'active' : '' }}">Delivery Sheet</a></li>
                  </ul>
                  <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/generate' ? 'block;' : 'none' }}">
                     <li><a href="{{route('ph2.index')}}" class="{{ Route::currentRouteName()=='ph2.index' ? 'active' : '' }}">PH2</a></li>
                  </ul>
                  
               </li>
               @endhasrole

               @hasrole('admin|operation')
               <li class="dropdown">
                  <a class="nav-link menu-title {{request()->route()->getPrefix() == '/settings' ? 'active' : '' }}" href="#"><i data-feather="settings"></i><span>Settings</span>
                     <div class="according-menu"><i class="fa fa-angle-double-{{request()->route()->getPrefix() == '/settings' ? 'down' : 'right' }}"></i></div>
                  </a>
                  <ul class="nav-submenu menu-content" style="display: {{ request()->route()->getPrefix() == '/settings' ? 'block;' : 'none' }}">
                     <li><a href="{{route('notifications')}}" class="{{ Route::currentRouteName()=='notifications' ? 'active' : '' }}">Notifications</a></li>
                     @hasrole('admin')
                     <li><a href="{{route('settings')}}" class="{{ Route::currentRouteName()=='settings' ? 'active' : '' }}">Settings</a></li>
                     @endhasrole
                  </ul>
               </li>
               @endhasrole
               
            </ul>
         </div>
         <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
   </nav>
</header>