@php($page_name = isset($data['page_name'])?$data['page_name']:[])
<nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid ps-2 pe-0">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 @if($page_name == 'home') text-primary @endif " href="{{ route('home') }}">
        Wappah Store
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link me-2" href="{{ route('dashboard') }}">
                <i class="fa fa-institution opacity-6 me-1"></i>
                Dashboard
                </a>
            </li>
            @endif
            {{--
                <li class="nav-item">
                    <a class="nav-link @if($page_name == 'shop') text-primary @endif me-2" href="{{ route('shop') }}">
                    <i class="fa fa-cart-arrow-down opacity-6 me-1"></i>
                    Shop
                    </a>
                </li>
            --}}
            <li class="nav-item">
                <a class="nav-link @if($page_name == 'store') text-primary @endif me-2" href="{{ route('store') }}">
                <i class="fa fa-shopping-bag opacity-6 me-1"></i>
                Shop
                </a>
            </li>
            @if (Auth::check() && !Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link @if($page_name == 'cart') text-primary @endif me-2" href="{{ route('cart') }}">
                <i class="fa fa-cart-plus opacity-6 me-1"></i>
                Cart
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link @if($page_name == 'about') text-primary @endif me-2" aria-current="page" href="{{ route('about') }}">
                <i class="fa fa-info-circle opacity-6 me-1"></i>
                About Us
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($page_name == 'contact') text-primary @endif me-2" aria-current="page" href="{{ route('contact') }}">
                <i class="fa fa-envelope opacity-6 me-1"></i>
                Contact Us
                </a>
            </li>
            @if (!Auth::check())
            <li class="nav-item">
                <a class="nav-link @if($page_name == 'login') text-primary @endif me-2" href="{{ route('login') }}">
                    <i class="fas fa-user-circle opacity-6 me-1"></i>
                    Login
                </a>
            </li>
            @endif
            @if (!Auth::check())
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link me-2  @if($page_name == 'register') text-primary @endif " href="{{ route('register') }}">
                    <i class="fas fa-key opacity-6 me-1"></i>
                    {{ __('Register') }}
                    </a>
                </li>
                @endif
            @endif
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link me-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                <i class="fa fa-sign-out opacity-6 me-1"></i>
                Logout
                </a>
            </li>
            @endif
        </ul>
    </div>
    </div>
</nav>