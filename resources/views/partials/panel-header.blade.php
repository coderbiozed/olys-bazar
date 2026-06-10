@php
    $panelUser = Auth::user();
    $panelPhoto = (!empty($userData->photo))
        ? url($photoFolder.'/'.$userData->photo)
        : url('upload/no_image.jpg');
    $notifications = $panelUser->notifications()->latest()->take(10)->get();
    $unreadCount = $panelUser->unreadNotifications()->count();
@endphp

<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand w-100">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>

            <div class="flex-grow-1 d-none d-md-block ps-3">
                <span class="text-muted">{{ $panelTitle ?? 'Dashboard' }}</span>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    @if(!empty($quickLinks))
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-grid-alt'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="row row-cols-3 g-3 p-3" style="min-width: 280px;">
                                    @foreach($quickLinks as $link)
                                        <div class="col text-center">
                                            <a href="{{ $link['url'] }}" @if(!empty($link['external'])) target="_blank" rel="noopener noreferrer" @endif class="text-decoration-none text-dark">
                                                <div class="app-box mx-auto {{ $link['class'] ?? 'bg-gradient-cosmic text-white' }}">
                                                    <i class='bx {{ $link['icon'] }}'></i>
                                                </div>
                                                <div class="app-title">{{ $link['label'] }}</div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if($unreadCount > 0)
                                <span class="alert-count">{{ $unreadCount }}</span>
                            @endif
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="msg-header px-3 py-2 border-bottom">
                                <p class="msg-header-title mb-0">Notifications</p>
                            </div>
                            <div class="header-notifications-list">
                                @forelse($notifications as $notification)
                                    <div class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-warning text-warning"><i class="bx bx-bell"></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name mb-1">
                                                    Alert
                                                    <span class="msg-time float-end">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                                                </h6>
                                                <p class="msg-info mb-0">{{ $notification->data['message'] ?? 'New notification' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="dropdown-item text-center text-muted py-4">
                                        No notifications yet.
                                    </div>
                                @endforelse
                            </div>
                            @if(!empty($notificationLink))
                                <a href="{{ $notificationLink }}">
                                    <div class="text-center msg-footer border-top">View related page</div>
                                </a>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>

            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ $panelPhoto }}" class="user-img" alt="{{ $panelUser->name }}">
                    <div class="user-info ps-3 d-none d-sm-block">
                        <p class="user-name mb-0">{{ $panelUser->name }}</p>
                        <p class="designattion mb-0">{{ $panelUser->username }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route($dashboardRoute) }}">
                            <i class='bx bx-home-circle'></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route($profileRoute) }}">
                            <i class="bx bx-user"></i><span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route($passwordRoute) }}">
                            <i class="bx bx-lock-alt"></i><span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">
                            <i class='bx bx-store'></i><span>View Storefront</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('page.contact') }}">
                            <i class='bx bx-support'></i><span>Support</span>
                        </a>
                    </li>
                    <li><div class="dropdown-divider mb-0"></div></li>
                    <li>
                        <a class="dropdown-item" href="{{ route($logoutRoute) }}">
                            <i class='bx bx-log-out-circle'></i><span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
