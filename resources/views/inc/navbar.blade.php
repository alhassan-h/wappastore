<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Wappahstore</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ ucwords($data['page_name']) }}</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">{{ ucwords($data['page_name']) }}</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
                <label class="form-label">Type here...</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>

            <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                </a>
            </li>
            
            @if(Auth::user()->isAdmin())  
            <li class="nav-item dropdown pe-3 d-flex align-items-center">
                <a href="{{route('orders')}}" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-cart-arrow-down"></i>
                    @if(App\Models\Order::hasNewOrders())
                    <i class="fa fa-circle position-absolute text-danger fs-sm"></i>
                    @endif
                </a>
            </li>
            @endif

            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="profiledropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">{{ ucwords(Auth::user()->name) }}</span>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-1 me-sm-n4" aria-labelledby="profiledropdown">
                    @if(!Auth::user()->isAdmin())    
                    <li class="">
                        <a class="dropdown-item border-radius-md" href="{{ route('profile') }}">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">My Profile</span>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endif
                    <li class="">
                        <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">Logout</span>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    </div>
</nav>