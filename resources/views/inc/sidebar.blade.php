<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('home') }}">
        <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Wappah Store</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
 
          <a @class(['nav-link', 'text-white','active bg-gradient-primary' => $data['page_name']=='dashboard'])" href="{{ route('dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
 
          <a @class(['nav-link', 'text-white','active bg-gradient-primary' => $data['page_name']=='products'])" href="@if(Auth::user()->isAdmin()) {{route('products')}} @else {{route('customer.products')}} @endif">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">@if(!Auth::user()->isAdmin())My @endif Products</span>
          </a>
        </li>

        <li class="nav-item">
 
          <a @class(['nav-link', 'text-white','active bg-gradient-primary' => $data['page_name']=='orders'])" href="@if(Auth::user()->isAdmin()) {{route('orders')}} @else {{route('customer.orders')}} @endif">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">@if(!Auth::user()->isAdmin())My @endif Orders</span>
          </a>
        </li>

        @if(Auth::user()->isAdmin())
        <li class="nav-item">
          <a @class(['nav-link', 'text-white','active bg-gradient-primary' => $data['page_name']=='customers']) href="{{ route('customers') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">people</i>
            </div>
            <span class="nav-link-text ms-1">Customers</span>
          </a>
        </li>
        @endif       

      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3 my-2">
          <ul class="navbar-nav">
            @if(!Auth::user()->isAdmin())
            <li class="nav-item">
              <a @class(['nav-link', 'text-white','active bg-gradient-primary' => $data['page_name']=='profile']) href="{{ route('profile') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
              </a>
            </li>
            @endif

            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">logout</i>
                </div>
                <span class="nav-link-text ms-1">Sign Out</span>
              </a>
            </li>
          </ul>
      </div>
    </div>
  </aside>