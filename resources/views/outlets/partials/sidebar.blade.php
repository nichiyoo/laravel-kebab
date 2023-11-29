<aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('img/logo.png') }}" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image">
                <span class="navbar-brand-title">{{ config('app.name', 'Laravel') }}</span>
            </a>
        </h1>


        <div class="navbar-nav flex-row d-lg-none">
            {{-- empty --}}
        </div>

        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-home icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Home
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown {{ request()->routeIs('products.*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-package icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Produk
                        </span>
                    </a>
                    <div class="dropdown-menu {{ request()->routeIs('products.*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a href="{{ route('products.index') }}"
                                    class="dropdown-item {{ request()->routeIs('products.index') ? 'active' : '' }}">
                                    All Produk
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-shopping-cart icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Order
                        </span>
                    </a>
                    <div class="dropdown-menu {{ request()->routeIs('orders.*') ? 'show' : '' }}">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a href="{{ route('orders.current') }}"
                                    class="dropdown-item {{ request()->routeIs('orders.current') ? 'active' : '' }}">
                                    Current Order
                                </a>
                            </div>
                            <div class="dropdown-menu-column">
                                <a href="{{ route('orders.index') }}"
                                    class="dropdown-item {{ request()->routeIs('orders.index') && !request()->query('group') ? 'active' : '' }}">
                                    All Order
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-user icon"></i>
                        </span>
                        <span class="nav-link-title">
                            Other
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item w-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
