

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
        @hasrole('customer')
                <div style="text-align: center; padding: 8px 0 5px 0; background-color: #f7f7fe">
                   <a href="{{route('shipments.create')}}" class="btn btn-primary btn-md" style="border-radius: 35px; color: white;"><b> Add Shipment </b> </a>
                </div>
                @endhasrole
    
        <nav class="navbar navbar-expand-lg navbar-light " >
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" >
          @hasrole('admin|operation|customer|account')
                   <li class="nav-item active">
                      <a class="nav-link menu-title {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" href="{{route('index')}}"><span> Dashboard</span>
                      </a>
                   </li>
                   @endhasrole
                   @hasrole('operation')
                   <li class="nav-item active">
                    <a href="{{route('customer.bookingform')}}" class="nav-link menu-title {{ Route::currentRouteName()=='customer.bookingform' ? 'active' : '' }}"><span>Booking Form</span></a>
                   </li>
                   @endhasrole
                   @hasrole('operation')
                   <li class="nav-item active">
                      <a class="nav-link menu-title {{ Route::currentRouteName() == 'booked-scan' ? 'active' : '' }}" href="{{route('booked-scan')}}"><span>Arival</span>
                      </a>
                   </li>
                   @endhasrole
                   @hasrole('operation')
                   <li class="nav-item active">
                      <a class="nav-link menu-title {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}" href=""><span>Mainifist</span>
                      </a>
                   </li>
                   @endhasrole
                  
                   @hasrole('admin')
                   <li class="nav-item active">
                      <a class="nav-link menu-title {{ Route::currentRouteName() == 'booked-scan' ? 'active' : '' }}" href="{{route('booked-scan')}}"><span>Arival</span>
                      </a>
                   </li>
                   @endhasrole
                  <!-----------------
                   @hasrole('admin|customer')
                   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Return Advices
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('notdone')}}">Not Done</a>
              <a class="dropdown-item" href="{{route('done')}}">Done</a>
            </div>
          </li>
                   @endhasrole
       ---------------------------->
      
                   @hasrole('customer')
                      
                      <li class="nav-item active">
                         <a class="nav-link menu-title {{ Route::currentRouteName() == 'customer-shipments' ? 'active' : '' }}" href="{{route('customer-shipments')}}"></i><span>Shipments</span>
                         </a>
                      </li>
    
                      <li class="nav-item active">
                         <a class="nav-link menu-title {{ Route::currentRouteName() == 'customer.reports' ? 'active' : '' }}" href="{{route('customer.reports')}}"><span>Reports</span>
                         </a>
                      </li>
                      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('pickups.index')}}">Pickup Locations</a>
              <a class="dropdown-item" href="{{route('services')}}">Services</a>
            </div>
          </li>
                   @endhasrole
                   @hasrole('admin|')
                   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Shipments
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('shipments.index')}}">All Shipments</a>
              <a class="dropdown-item" href="{{route('shipments.new')}}">Booked Shipments</a>
              <a class="dropdown-item" href="{{route('shipments.arrived')}}">Arrived Shipments</a>
              <a class="dropdown-item" href="{{route('shipments.in-transit')}}">In-Transit Shipments</a>
              <a class="dropdown-item" href="{{route('shipments.delivered')}}">Delivered Shipments</a>
              <a class="dropdown-item" href="{{route('shipments.returned')}}">Returned Shipments</a>
            </div>
          </li>
          @endhasrole
          @can('add_user')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Customers
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('customer.create')}}">Create Customer</a>
              <a class="dropdown-item" href="{{route('customer.index')}}" >Show Customer</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('admin.create')}}" >Create Admin</a>
              <a class="dropdown-item" href="{{route('admin.index')}}" >Show Admin</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Operation
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('operation.create')}}" >Create Operation</a>
              <a class="dropdown-item" href="{{route('operation.index')}}" >Show Operation</a>
            </div>
          </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Accountant
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('account.create')}}">Create account</a>
              <a class="dropdown-item" href="{{route('account.index')}}">Show account</a>
              
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Rider
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('rider.create')}}" >Create Rider</a>
              <a class="dropdown-item" href="{{route('rider.index')}}">Show Rider</a>
         
            </div>
          </li>
          @endcan
          @hasrole('admin|operation|rider')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Generate
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('sheets.index')}}">Delivery Sheet</a>
              <a class="dropdown-item" href="{{route('ph2.index')}}">PH2</a>
            </div>
          </li>
          @endhasrole
          @hasrole('account')
          <li class="nav-item active">
            <a class="nav-link menu-title" href="{{route('collection')}}"><span>COD</span>
            </a>
         </li>
          
          <li class="nav-item active">
            <a class="nav-link menu-title" href="{{ route('account.generateslips') }}"><span>Generate Slips</span>
            </a>
         </li>
          @endhasrole
          @hasrole('admin')
          <li class="nav-item active">
           <a class="nav-link menu-title {{ Route::currentRouteName() == 'customer.reports' ? 'active' : '' }}" href="{{route('customer.reports')}}"><span>Reports</span>
           </a>
        </li>
        @endhasrole
     @hasrole('admin')
     <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item"  href="{{route('notifications')}}">Notifications</a>
              <a class="dropdown-item"href="{{route('settings')}}">Settings</a>
            </div>
          </li>
                   @endhasrole
                   {{-- @hasrole('operation')
                   <li class="nav-item active">
                      <a class="nav-link menu-title {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}" href=""><span>Handover</span>
                      </a>
                   </li>
                   @endhasrole
             
                   @hasrole('operation')
                   <li class="nav-item active">
                      <a class="nav-link menu-title {{ Route::currentRouteName() == 'reports' ? 'active' : '' }}" href=""><span>Manual CN</span>
                      </a>
                   </li>
                   @endhasrole --}}
    
                  
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
                @hasrole('admin|')
                  <li>
                    <h6 class="f-w-600">Notifications</h6><span class="f-12">You have {{$noti_to_admin_count}} unread messages</span>
                  </li>
    
                  @foreach ($noti_to_admin as $notification)
                    <li>
                      <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"> </i><a href="{{$notification->link}}">{{$notification->notification_text}}</a><span class="pull-right">{{$notification->created_at->diffForHumans()}}</span></p>
                    </li> 
                  @endforeach
                @endhasrole
                
                @hasrole('customer')
                  <li>
                    <h6 class="f-w-600">Notifications</h6><span class="f-12">You have {{$noti_to_cust_count}} unread messages</span>
                  </li>
    
                  @foreach ($noti_to_cust as $notification)
                    <li>
                      <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"> </i><a href="{{$notification->link}}">{{$notification->notification_text}}</a><span class="pull-right">{{$notification->created_at->diffForHumans()}}</span></p>
                    </li> 
                  @endforeach
                @endhasrole
                <li></li>
                <li class="bg-light txt-dark" style="padding-top: 15px !important"><a href="{{route('all-notifications')}}">All </a> notification</li>
              </ul>
    
              @hasrole('admin')
              <div class="txt" style="background-color: green; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;">{{$noti_to_admin_count}}</div>
              @endhasrole
    
              @hasrole('customer')
              <div class="txt" style="background-color: green; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;">{{$noti_to_cust_count}}</div>
              @endhasrole
            </li>
    
            {{-- @hasrole('admin')
            <li class="onhover-dropdown"><i data-feather="message-circle"></i>
            </li>
            @endhasrole --}}
    
            @hasrole('admin')
            <li class="onhover-dropdown"><i data-feather="message-circle"></i>
              <div class="txt" style="background-color: red; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;">{{$admin_message_count}}</div>
            </li>
            @endhasrole
    
            @hasrole('customer')
            <li class="onhover-dropdown"><i data-feather="message-circle"></i>
              <ul class="chat-dropdown onhover-show-div p-t-20 p-b-20">
                @foreach ($advice_noti as $noti)
                  <li>
                    <div class="media">
                      <span style="background-color: #ec6400; font-weight: 800; color: white; padding: 4px 5px; border-radius: 3px; margin-right: 10px;">{{$noti->consignment_no}}</span>
                      <a href="{{route('shipment.advice', $noti->id)}}">
                        <div class="media-body">
                          <p class="f-12 mb-0 light-font">Waiting for advice...</p>
                          <p class="f-12 mb-0 font-primary">{{$noti->updated_at->diffForHumans()}}</p>
                        </div>
                      </a>
                    </div>
                  </li>
                @endforeach
                <li class="light-font text-center"><a href="{{route('customer.notdone')}}">View All</a></li>
              </ul>
              <div class="txt" style="background-color: red; position: absolute; padding: 3px 0; top: 16px; left: 28px;border-radius: 50%; font-size: 11px; color: white; height: 22px; width: 22px; text-align: center;">{{$advice_noti_count}}</div>
            </li>
            @endhasrole
            <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
            {{-- <li class="theme-setting"><i data-feather="settings"></i></li> --}}
            <li class="onhover-dropdown px-0"><span class="media user-header"><img class="mr-2 rounded-circle img-35" src="{{asset('assets/images/zippy/icon-2-01.jpg')}}" width="35px" alt=""><span class="media-body"><span class="f-12 f-w-600">{{ Auth::user()->name }}</span><span class="d-block">{{Auth::User()->getRoleNames()->implode(' ')}}</span></span></span>
              <ul class="profile-dropdown onhover-show-div">
                <a href="/profile"><li><i data-feather="user"> </i>Profile</li></a>
                <li><i data-feather="log-out"></i>
                  <a class="border-0 pl-0" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
        
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
    
        
      </div>
    </div>