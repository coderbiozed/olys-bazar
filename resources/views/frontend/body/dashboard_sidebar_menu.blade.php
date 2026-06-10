@php
    $route = Route::currentRouteName();
    $isActive = static fn (string ...$routes): string => in_array($route, $routes, true) ? 'active' : '';
@endphp

<div class="col-md-3">
    <div class="dashboard-menu">
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $isActive('dashboard') }}" href="{{ route('dashboard') }}">
                    <i class="fi-rs-settings-sliders mr-10"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $isActive('user.order.page') }}" href="{{ route('user.order.page') }}">
                    <i class="fi-rs-shopping-bag mr-10"></i>My Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $isActive('return.order.page') }}" href="{{ route('return.order.page') }}">
                    <i class="fi-rs-refresh mr-10"></i>Return Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $isActive('user.track.order') }}" href="{{ route('user.track.order') }}">
                    <i class="fi-rs-shopping-cart-check mr-10"></i>Track Order
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $isActive('wishlist') }}" href="{{ route('wishlist') }}">
                    <i class="fi-rs-heart mr-10"></i>Wishlist
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $isActive('user.account.page') }}" href="{{ route('user.account.page') }}">
                    <i class="fi-rs-user mr-10"></i>Account Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $isActive('user.change.password') }}" href="{{ route('user.change.password') }}">
                    <i class="fi-rs-key mr-10"></i>Change Password
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fi-rs-home mr-10"></i>Continue Shopping
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('page.contact') }}">
                    <i class="fi-rs-headphones mr-10"></i>Support
                </a>
            </li>
            <li class="nav-item mt-10">
                <a class="nav-link text-danger" href="{{ route('user.logout') }}">
                    <i class="fi-rs-sign-out mr-10"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</div>
