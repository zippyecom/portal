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
     <!--  <div class="logo-wrapper"><a href="{{route('/')}}"><img width="200px" height="40" src="/images/logos/{{$main_logo}}" alt=""></a></div> -->
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('customer/customer_bookingform')}}">Order Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Deliver</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tracking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Calculator</a>
        </li>
      </ul>
    </div>
    <div class="nav-right col pull-right right-menu">
      <ul class="nav-menus">
        
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