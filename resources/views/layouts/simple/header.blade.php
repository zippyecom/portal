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
      <div class="logo-wrapper"><a href="{{route('/')}}"><img width="200px" height="40" src="/images/logos/{{$main_logo}}" alt=""></a></div>
    </div>
    <div class="nav-right col pull-right right-menu">
      <ul class="nav-menus">
        <li class="px-0">
        </li>
        <li class="onhover-dropdown"><i data-feather="bell"></i>
          <ul class="notification-dropdown onhover-show-div">
            @hasrole('admin|operation')
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

          @hasrole('admin|operation')
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

        @hasrole('admin|operation')
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