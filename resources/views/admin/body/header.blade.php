@php
    $id = Auth::user()->id;
    $userData = App\Models\User::find($id);

    $quickLinks = [];

    if (Auth::user()->can('order.menu')) {
        $quickLinks[] = [
            'url' => route('pending.order'),
            'icon' => 'bx-cart',
            'label' => 'Orders',
            'class' => 'bg-gradient-cosmic text-white',
        ];
    }

    if (Auth::user()->can('vendor.menu')) {
        $quickLinks[] = [
            'url' => route('inactive.vendor'),
            'icon' => 'bx-store',
            'label' => 'Vendors',
            'class' => 'bg-gradient-burning text-white',
        ];
    }

    if (Auth::user()->can('product.menu')) {
        $quickLinks[] = [
            'url' => route('all.product'),
            'icon' => 'bx-package',
            'label' => 'Products',
            'class' => 'bg-gradient-lush text-white',
        ];
    }

    if (Auth::user()->can('site.menu')) {
        $quickLinks[] = [
            'url' => route('site.setting'),
            'icon' => 'bx-cog',
            'label' => 'Settings',
            'class' => 'bg-gradient-kyoto text-dark',
        ];
    }

    $quickLinks[] = [
        'url' => url('/'),
        'icon' => 'bx-globe',
        'label' => 'Store',
        'class' => 'bg-gradient-blues text-dark',
        'external' => true,
    ];
@endphp

@include('partials.panel-header', [
    'panelTitle' => 'Admin Panel',
    'photoFolder' => 'upload/admin_images',
    'userData' => $userData,
    'quickLinks' => $quickLinks,
    'notificationLink' => Auth::user()->can('vendor.menu') ? route('inactive.vendor') : null,
    'dashboardRoute' => 'admin.dashobard',
    'profileRoute' => 'admin.profile',
    'passwordRoute' => 'admin.change.password',
    'logoutRoute' => 'admin.logout',
])
