@php
    $id = Auth::user()->id;
    $userData = App\Models\User::find($id);
    $isActiveVendor = $userData->status === 'active';

    $quickLinks = [
        [
            'url' => route('vendor.dashobard'),
            'icon' => 'bx-home-circle',
            'label' => 'Home',
            'class' => 'bg-gradient-cosmic text-white',
        ],
    ];

    if ($isActiveVendor) {
        $quickLinks[] = [
            'url' => route('vendor.all.product'),
            'icon' => 'bx-package',
            'label' => 'Products',
            'class' => 'bg-gradient-burning text-white',
        ];
        $quickLinks[] = [
            'url' => route('vendor.order'),
            'icon' => 'bx-cart',
            'label' => 'Orders',
            'class' => 'bg-gradient-lush text-white',
        ];
        $quickLinks[] = [
            'url' => route('vendor.all.review'),
            'icon' => 'bx-star',
            'label' => 'Reviews',
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

    $quickLinks[] = [
        'url' => route('page.contact'),
        'icon' => 'bx-support',
        'label' => 'Support',
        'class' => 'bg-gradient-moonlit text-white',
    ];
@endphp

@include('partials.panel-header', [
    'panelTitle' => $isActiveVendor ? 'Vendor Panel' : 'Vendor Panel (Pending)',
    'photoFolder' => 'upload/vendor_images',
    'userData' => $userData,
    'quickLinks' => $quickLinks,
    'notificationLink' => null,
    'dashboardRoute' => 'vendor.dashobard',
    'profileRoute' => 'vendor.profile',
    'passwordRoute' => 'vendor.change.password',
    'logoutRoute' => 'vendor.logout',
])
