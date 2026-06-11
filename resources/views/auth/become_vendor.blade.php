@extends('frontend.master_dashboard')

@section('title')
Become a Vendor — {{ $siteName }}
@endsection

@section('main')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/info-pages.css?v=1.0') }}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/become-vendor.css?v=1.1') }}" />

@php
    $asset = fn (string $path) => asset('frontend/assets/imgs/' . ltrim($path, '/'));
    $heroImage = file_exists(public_path('frontend/assets/imgs/banner/banner-9.png'))
        ? $asset('banner/banner-9.png')
        : $asset('slider/slider-1.png');
    $joinYears = range((int) date('Y'), 2020);
@endphp

<script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

<div class="bv-page ip-page">

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Become a Vendor
            </div>
        </div>
    </div>

    {{-- Hero --}}
    <section class="bv-hero" aria-labelledby="bv-hero-heading">
        <div class="container">
            <div class="bv-hero__inner wow animate__animated animate__fadeIn">
                <div>
                    <div class="bv-hero__eyebrow"><span aria-hidden="true"></span> Open for new sellers</div>
                    <h1 id="bv-hero-heading">Grow your business on {{ $siteName }}</h1>
                    <p class="bv-hero__lead">
                        Join 500+ verified vendors selling groceries, fashion, electronics, farm produce, and more to customers across all 64 districts of Bangladesh.
                    </p>
                    <div class="bv-hero__actions">
                        <a href="#vendor-register" class="btn btn-fill-out">Apply Now</a>
                        <a href="{{ route('vendor.login') }}" class="btn btn-outline">Vendor Login</a>
                    </div>
                </div>
                <div class="bv-hero__visual">
                    <img src="{{ $heroImage }}" alt="Sell on {{ $siteName }} marketplace" width="540" height="380" loading="eager" />
                    <div class="bv-hero__badge wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <strong>৳0</strong>
                        <span>Setup fee — start free</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="bv-stats" aria-label="Marketplace vendor highlights">
        <div class="container">
            <div class="bv-stats__grid">
                <div class="bv-stat wow animate__animated animate__fadeInUp">
                    <span class="bv-stat__value">500+</span>
                    <span class="bv-stat__label">Active vendors</span>
                </div>
                <div class="bv-stat wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <span class="bv-stat__value">100K+</span>
                    <span class="bv-stat__label">Monthly shoppers</span>
                </div>
                <div class="bv-stat wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <span class="bv-stat__value">64</span>
                    <span class="bv-stat__label">Districts reached</span>
                </div>
                <div class="bv-stat wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <span class="bv-stat__value">5–12%</span>
                    <span class="bv-stat__label">Competitive commission</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Benefits --}}
    <section class="bv-section bv-section--tight" aria-labelledby="bv-benefits-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">Why sell with us</span>
                <h2 id="bv-benefits-heading">Everything you need to sell online</h2>
                <p>We handle the platform, payments infrastructure, and customer reach — you focus on great products and service.</p>
            </div>
            <div class="bv-benefits">
                <article class="bv-benefit wow animate__animated animate__fadeInUp">
                    <div class="bv-benefit__icon"><img src="{{ $asset('theme/icons/icon-location.svg') }}" alt="" /></div>
                    <h4>Nationwide reach</h4>
                    <p>Sell beyond your local area — deliver to customers in every division through our logistics network.</p>
                </article>
                <article class="bv-benefit wow animate__animated animate__fadeInUp" data-wow-delay=".05s">
                    <div class="bv-benefit__icon"><img src="{{ $asset('theme/icons/icon-cart.svg') }}" alt="" /></div>
                    <h4>Vendor dashboard</h4>
                    <p>Manage products, orders, inventory, and earnings from one easy-to-use seller panel.</p>
                </article>
                <article class="bv-benefit wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <div class="bv-benefit__icon"><img src="{{ $asset('theme/icons/payment-visa.svg') }}" alt="" /></div>
                    <h4>Secure payments</h4>
                    <p>Accept bKash, Nagad, cards, and COD. We process payments and settle your earnings on schedule.</p>
                </article>
                <article class="bv-benefit wow animate__animated animate__fadeInUp" data-wow-delay=".15s">
                    <div class="bv-benefit__icon"><img src="{{ $asset('theme/icons/icon-2.svg') }}" alt="" /></div>
                    <h4>Delivery support</h4>
                    <p>Partner couriers and delivery guidelines help you ship reliably — see our <a href="{{ route('page.delivery') }}">delivery policy</a>.</p>
                </article>
                <article class="bv-benefit wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <div class="bv-benefit__icon"><img src="{{ $asset('theme/icons/icon-hot.svg') }}" alt="" /></div>
                    <h4>Promotions &amp; deals</h4>
                    <p>Get featured in flash sales, homepage banners, and seasonal campaigns to boost visibility.</p>
                </article>
                <article class="bv-benefit wow animate__animated animate__fadeInUp" data-wow-delay=".25s">
                    <div class="bv-benefit__icon"><img src="{{ $asset('theme/icons/icon-headphone.svg') }}" alt="" /></div>
                    <h4>Dedicated vendor support</h4>
                    <p>Onboarding help, listing reviews, and a seller support line for account and order issues.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- How it works --}}
    @php
        $onboardingSteps = [
            [
                'icon' => 'theme/icons/icon-contact.svg',
                'label' => 'Apply online',
                'time' => '~5 min',
                'title' => 'Submit your application',
                'desc' => 'Fill out the registration form below with your shop name, contact details, and business info.',
                'tips' => ['Shop / business name & username', 'Email, phone & optional address', 'Agree to terms and submit'],
            ],
            [
                'icon' => 'theme/icons/icon-clock.svg',
                'label' => 'Admin review',
                'time' => '1–3 days',
                'title' => 'Account review by our team',
                'desc' => 'Our vendor team verifies your details and may request documents such as NID or trade license.',
                'tips' => ['Keep your phone available for calls', 'Check email for update requests', 'Typical review: 1–3 business days'],
            ],
            [
                'icon' => 'theme/icons/icon-user.svg',
                'label' => 'Get approved',
                'time' => 'Instant access',
                'title' => 'Account activated',
                'desc' => 'Once approved, your vendor status becomes active and you gain full access to the seller dashboard.',
                'tips' => ['Approval email notification sent', 'Login via vendor portal', 'Complete your shop profile'],
            ],
            [
                'icon' => 'theme/icons/icon-cart.svg',
                'label' => 'List products',
                'time' => 'Same day',
                'title' => 'Add your product catalog',
                'desc' => 'Upload product images, set prices, stock levels, and categories from your vendor panel.',
                'tips' => ['High-quality photos on plain backgrounds', 'Accurate prices & stock counts', 'Listings reviewed for quality'],
            ],
            [
                'icon' => 'theme/icons/icon-hot.svg',
                'label' => 'Start selling',
                'time' => 'Ongoing',
                'title' => 'Receive orders & get paid',
                'desc' => 'Customers discover your shop on ' . $siteName . '. Fulfill orders and receive weekly settlements.',
                'tips' => ['Process orders within stated times', 'Hand off to courier partners', 'Weekly payouts via bKash or bank'],
            ],
        ];
    @endphp
    <section class="bv-section bv-onboarding-section" aria-labelledby="bv-steps-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">Onboarding</span>
                <h2 id="bv-steps-heading">How to become a vendor</h2>
                <p>Five simple steps from application to your first sale — click any step to learn more.</p>
            </div>

            <div class="bv-onboarding wow animate__animated animate__fadeInUp">
                <div class="bv-onboarding__progress" aria-hidden="true">
                    <div class="bv-onboarding__progress-fill" id="bv-onboarding-progress" style="width: 20%"></div>
                </div>

                <div class="bv-onboarding__track" role="tablist" aria-label="Vendor onboarding steps">
                    @foreach($onboardingSteps as $index => $step)
                        <button
                            type="button"
                            class="bv-onboarding__step {{ $index === 0 ? 'is-active' : '' }}"
                            role="tab"
                            aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-controls="bv-onboarding-panel-{{ $index }}"
                            data-bv-step="{{ $index }}"
                        >
                            <span class="bv-onboarding__icon-wrap">
                                <img src="{{ $asset($step['icon']) }}" alt="" width="28" height="28" />
                                <span class="bv-onboarding__badge">{{ $index + 1 }}</span>
                            </span>
                            <span class="bv-onboarding__label">{{ $step['label'] }}</span>
                            <span class="bv-onboarding__time">{{ $step['time'] }}</span>
                        </button>
                    @endforeach
                </div>

                <div class="bv-onboarding__panels">
                    @foreach($onboardingSteps as $index => $step)
                        <article
                            id="bv-onboarding-panel-{{ $index }}"
                            class="bv-onboarding__panel {{ $index === 0 ? 'is-active' : '' }}"
                            role="tabpanel"
                            data-bv-panel="{{ $index }}"
                            @if($index !== 0) hidden @endif
                        >
                            <div class="bv-onboarding__panel-head">
                                <div class="bv-onboarding__panel-icon">
                                    <img src="{{ $asset($step['icon']) }}" alt="" width="32" height="32" />
                                </div>
                                <div class="bv-onboarding__panel-copy">
                                    <span class="bv-onboarding__panel-step">Step {{ $index + 1 }} of {{ count($onboardingSteps) }}</span>
                                    <h4>{{ $step['title'] }}</h4>
                                    <p>{{ $step['desc'] }}</p>
                                </div>
                            </div>
                            <ul class="bv-onboarding__tips">
                                @foreach($step['tips'] as $tip)
                                    <li>{{ $tip }}</li>
                                @endforeach
                            </ul>
                            @if($index === 0)
                                <a href="#vendor-register" class="btn btn-sm btn-fill-out bv-onboarding__cta">Go to registration form</a>
                            @endif
                        </article>
                    @endforeach
                </div>

                <div class="bv-onboarding__nav">
                    <button type="button" class="bv-onboarding__nav-btn" id="bv-onboarding-prev" disabled aria-label="Previous step">
                        ← Previous
                    </button>
                    <span class="bv-onboarding__nav-count" id="bv-onboarding-count">1 / 5</span>
                    <button type="button" class="bv-onboarding__nav-btn" id="bv-onboarding-next" aria-label="Next step">
                        Next →
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Categories --}}
    <section class="bv-section" aria-labelledby="bv-categories-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">Categories</span>
                <h2 id="bv-categories-heading">What you can sell</h2>
                <p>Select a category to see guidelines. Multi-category sellers are welcome.</p>
            </div>
            <div class="ip-tabs wow animate__animated animate__fadeInUp">
                <div class="ip-tabs__nav" role="tablist">
                    <button type="button" class="ip-tabs__btn is-active" role="tab" data-panel="cat-grocery">Grocery &amp; Food</button>
                    <button type="button" class="ip-tabs__btn" role="tab" data-panel="cat-fashion">Fashion</button>
                    <button type="button" class="ip-tabs__btn" role="tab" data-panel="cat-electronics">Electronics</button>
                    <button type="button" class="ip-tabs__btn" role="tab" data-panel="cat-farm">Farm &amp; Fresh</button>
                </div>
                <div id="cat-grocery" class="ip-tabs__panel is-active ip-glass-card" role="tabpanel">
                    <h3>Grocery &amp; daily essentials</h3>
                    <p>Rice, dal, oil, snacks, beverages, household items, and packaged foods. Ideal for local shops and distributors.</p>
                    <ul>
                        <li>Clear expiry dates required on all food items</li>
                        <li>Proper packaging for fragile goods</li>
                        <li>Same-day dispatch recommended for perishables in Dhaka</li>
                    </ul>
                </div>
                <div id="cat-fashion" class="ip-tabs__panel ip-glass-card" role="tabpanel" hidden>
                    <h3>Fashion &amp; lifestyle</h3>
                    <p>Clothing, footwear, bags, accessories, and beauty products from brands or your own label.</p>
                    <ul>
                        <li>Accurate size charts and material descriptions</li>
                        <li>High-quality product photos on plain backgrounds</li>
                        <li>Authentic products only — no counterfeits</li>
                    </ul>
                </div>
                <div id="cat-electronics" class="ip-tabs__panel ip-glass-card" role="tabpanel" hidden>
                    <h3>Electronics &amp; gadgets</h3>
                    <p>Mobile accessories, home appliances, computer peripherals, and consumer electronics.</p>
                    <ul>
                        <li>Manufacturer warranty information required</li>
                        <li>Serial numbers for high-value items</li>
                        <li>Secure packaging for fragile electronics</li>
                    </ul>
                </div>
                <div id="cat-farm" class="ip-tabs__panel ip-glass-card" role="tabpanel" hidden>
                    <h3>Farm &amp; fresh produce</h3>
                    <p>Fresh vegetables, fruits, dairy, eggs, and farm-direct products. See also our <a href="{{ route('page.farm') }}">Farm Business</a> page.</p>
                    <ul>
                        <li>Harvest or production date on fresh items</li>
                        <li>Cold-chain guidelines for dairy and meat</li>
                        <li>Local sourcing and quality standards apply</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Requirements --}}
    <section class="bv-section" aria-labelledby="bv-requirements-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">Eligibility</span>
                <h2 id="bv-requirements-heading">Vendor requirements</h2>
                <p>Make sure you meet these criteria before applying.</p>
            </div>
            <div class="bv-requirements wow animate__animated animate__fadeInUp">
                <article class="bv-req-card">
                    <h4>Who can apply</h4>
                    <ul class="bv-req-list">
                        <li>Registered businesses, shops, farms, or individual sellers aged 18+</li>
                        <li>Valid Bangladeshi mobile number and email address</li>
                        <li>Ability to fulfill orders within stated processing times</li>
                        <li>Products that comply with Bangladeshi laws and marketplace policies</li>
                        <li>Commitment to accurate listings and responsive customer service</li>
                    </ul>
                </article>
                <article class="bv-req-card">
                    <h4>Documents we may request</h4>
                    <ul class="bv-req-list">
                        <li>National ID (NID) or passport of business owner</li>
                        <li>Trade license or business registration (if applicable)</li>
                        <li>Bank or bKash account details for settlements</li>
                        <li>Shop address and proof of business location</li>
                        <li>Product samples or photos for quality verification</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    {{-- Commission --}}
    <section class="bv-section" aria-labelledby="bv-pricing-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">Fees &amp; payouts</span>
                <h2 id="bv-pricing-heading">Transparent seller economics</h2>
                <p>No hidden charges. Commission varies by category — details shared during onboarding.</p>
            </div>
            <div class="bv-pricing-grid wow animate__animated animate__fadeInUp">
                <article class="bv-pricing-card bv-pricing-card--highlight">
                    <h4>Registration</h4>
                    <div class="bv-pricing-card__price">Free</div>
                    <p>No setup fee, no monthly subscription to join the marketplace.</p>
                </article>
                <article class="bv-pricing-card">
                    <h4>Commission</h4>
                    <div class="bv-pricing-card__price">5–12%</div>
                    <p>Per successful sale, depending on product category. Deducted at settlement.</p>
                </article>
                <article class="bv-pricing-card">
                    <h4>Payouts</h4>
                    <div class="bv-pricing-card__price">Weekly</div>
                    <p>Earnings transferred to bKash or bank after order completion and return window.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- Vendor tools --}}
    <section class="bv-section" aria-labelledby="bv-tools-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">Seller tools</span>
                <h2 id="bv-tools-heading">Your vendor dashboard includes</h2>
            </div>
            <div class="bv-tools wow animate__animated animate__fadeInUp">
                <article class="bv-tool">
                    <img src="{{ $asset('theme/icons/icon-cart.svg') }}" alt="" />
                    <h5>Order management</h5>
                    <p>View, confirm, and track every order in real time.</p>
                </article>
                <article class="bv-tool">
                    <img src="{{ $asset('theme/icons/icon-1.svg') }}" alt="" />
                    <h5>Product catalog</h5>
                    <p>Add, edit, and bulk-manage your listings.</p>
                </article>
                <article class="bv-tool">
                    <img src="{{ $asset('theme/icons/icon-print.svg') }}" alt="" />
                    <h5>Invoices &amp; reports</h5>
                    <p>Download sales reports and transaction history.</p>
                </article>
                <article class="bv-tool">
                    <img src="{{ $asset('theme/icons/icon-user.svg') }}" alt="" />
                    <h5>Profile &amp; shop page</h5>
                    <p>Customize your public vendor storefront.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="bv-section" aria-labelledby="bv-faq-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">FAQ</span>
                <h2 id="bv-faq-heading">Vendor questions answered</h2>
            </div>
            <div class="ip-faq wow animate__animated animate__fadeInUp">
                <div class="ip-faq__item is-open">
                    <button type="button" class="ip-faq__question" aria-expanded="true">
                        How long does approval take?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Most applications are reviewed within 1–3 business days. You'll receive an email once your account is approved or if we need additional information.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        Do I need a trade license to sell?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Individual sellers can start with NID verification. Registered businesses should provide a trade license. Requirements may vary by category and sales volume.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        Who handles delivery?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Vendors pack and hand off orders to our courier partners. You set processing times; we provide delivery network coverage. See <a href="{{ route('page.delivery') }}">Delivery Information</a> for zones and timelines.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        What happens if a customer returns a product?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Returns follow our marketplace policy. Eligible refunds are processed according to category rules. Commission is adjusted on refunded orders. Contact vendor support for dispute resolution.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        Can I sell on other platforms too?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Yes. There is no exclusivity requirement. We ask that pricing and stock on {{ $siteName }} stay accurate and competitive.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        How do I get vendor support?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Email
                            @if($setting?->email)
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            @else
                                our support team
                            @endif
                            with subject "Vendor Support", visit the <a href="{{ route('page.support') }}">Support Center</a>, or call
                            @if($setting?->phone_one)
                                {{ $setting->phone_one }}.
                            @else
                                our helpline.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Registration form --}}
    <section class="bv-section" id="vendor-register" aria-labelledby="bv-register-heading">
        <div class="container">
            <div class="bv-section__head wow animate__animated animate__fadeIn">
                <span class="bv-section__kicker">Apply now</span>
                <h2 id="bv-register-heading">Vendor registration form</h2>
                <p>Create your seller account. Approval is required before you can list products.</p>
            </div>

            <div class="bv-register wow animate__animated animate__fadeInUp">
                <div class="bv-register-form">
                    <h3>Start your application</h3>
                    <p class="bv-register-form__sub">
                        Already registered? <a href="{{ route('vendor.login') }}">Log in to your vendor account</a>
                    </p>

                    <form method="POST" action="{{ route('vendor.register') }}" novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="vendor-name">Shop / Business Name *</label>
                            <input type="text" id="vendor-name" name="name" class="form-control" placeholder="e.g. Khulna Fresh Mart" value="{{ old('name') }}" required>
                            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="bv-form-row">
                            <div class="form-group">
                                <label for="vendor-username">Username *</label>
                                <input type="text" id="vendor-username" name="username" class="form-control" placeholder="Unique login username" value="{{ old('username') }}" required>
                                @error('username')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="vendor-phone">Phone Number *</label>
                                <input type="text" id="vendor-phone" name="phone" class="form-control" placeholder="e.g. 01XXXXXXXXX" value="{{ old('phone') }}" required>
                                @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="vendor-email">Email Address *</label>
                            <input type="email" id="vendor-email" name="email" class="form-control" placeholder="business@example.com" value="{{ old('email') }}" required>
                            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="vendor-address">Business Address</label>
                            <input type="text" id="vendor-address" name="address" class="form-control" placeholder="Shop or warehouse address" value="{{ old('address') }}">
                            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="vendor-info">Short business description</label>
                            <textarea id="vendor-info" name="vendor_short_info" class="form-control" rows="3" placeholder="What do you sell? e.g. Fresh groceries and daily essentials in Khulna">{{ old('vendor_short_info') }}</textarea>
                            @error('vendor_short_info')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="vendor-join">Business started / Join year</label>
                            <select id="vendor-join" name="vendor_join" class="form-select">
                                <option value="">Select year</option>
                                @foreach($joinYears as $year)
                                    <option value="{{ $year }}" @selected(old('vendor_join') == (string) $year)>{{ $year }}</option>
                                @endforeach
                            </select>
                            @error('vendor_join')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="bv-form-row">
                            <div class="form-group">
                                <label for="vendor-password">Password *</label>
                                <input type="password" id="vendor-password" name="password" class="form-control" placeholder="Min. 8 characters" required>
                                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="vendor-password-confirm">Confirm Password *</label>
                                <input type="password" id="vendor-password-confirm" name="password_confirmation" class="form-control" placeholder="Repeat password" required>
                            </div>
                        </div>

                        <label class="bv-terms">
                            <input type="checkbox" name="terms" value="1" required @checked(old('terms'))>
                            <span>I agree to the <a href="{{ route('page.terms') }}" target="_blank">Terms &amp; Conditions</a> and <a href="{{ route('page.privacy') }}" target="_blank">Privacy Policy</a>.</span>
                        </label>

                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Submit Application</button>

                        <p class="bv-note">
                            <strong>Note:</strong> Your account will be pending until admin approval. You'll be logged in automatically after registration and redirected to your vendor dashboard. Personal data is handled per our privacy policy.
                        </p>
                    </form>
                </div>

                <aside class="bv-register-aside">
                    <h4>What happens next?</h4>
                    <div class="bv-aside-step">
                        <span class="bv-aside-step__num">1</span>
                        <div>
                            <strong>Instant account created</strong>
                            <span>Status: pending approval. You can access the dashboard but cannot publish until approved.</span>
                        </div>
                    </div>
                    <div class="bv-aside-step">
                        <span class="bv-aside-step__num">2</span>
                        <div>
                            <strong>Team reviews your application</strong>
                            <span>Typically 1–3 business days. Keep your phone available for verification calls.</span>
                        </div>
                    </div>
                    <div class="bv-aside-step">
                        <span class="bv-aside-step__num">3</span>
                        <div>
                            <strong>Start listing products</strong>
                            <span>Once approved, add products with photos, prices, and stock from your vendor panel.</span>
                        </div>
                    </div>
                    <div class="bv-aside-step">
                        <span class="bv-aside-step__num">4</span>
                        <div>
                            <strong>First sale &amp; payout</strong>
                            <span>Fulfill orders promptly. Weekly settlements to your preferred payment method.</span>
                        </div>
                    </div>
                    <hr class="my-20">
                    <p class="font-sm text-muted mb-0">
                        Questions before applying?
                        <a href="{{ route('page.contact') }}?subject=Vendor Inquiry">Contact us</a>
                    </p>
                </aside>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bv-section" style="padding-top: 0;">
        <div class="container">
            <div class="ip-cta wow animate__animated animate__fadeInUp">
                <h2>Ready to reach thousands of customers?</h2>
                <p>Join {{ $siteName }} today and grow your business with Bangladesh's trusted multi-vendor marketplace.</p>
                <div class="ip-cta__actions">
                    <a href="#vendor-register" class="btn btn-light">Apply Now</a>
                    <a href="{{ route('page.about') }}" class="btn btn-outline-light">About {{ $siteName }}</a>
                </div>
            </div>
        </div>
    </section>

</div>

<script src="{{ asset('frontend/assets/js/info-pages.js?v=1.0') }}"></script>
<script>
(function () {
    var steps = document.querySelectorAll('.bv-onboarding__step');
    var panels = document.querySelectorAll('.bv-onboarding__panel');
    var prevBtn = document.getElementById('bv-onboarding-prev');
    var nextBtn = document.getElementById('bv-onboarding-next');
    var countEl = document.getElementById('bv-onboarding-count');
    var progressEl = document.getElementById('bv-onboarding-progress');
    var current = 0;
    var total = steps.length;

    function showStep(index) {
        current = Math.max(0, Math.min(index, total - 1));

        steps.forEach(function (btn, i) {
            var active = i === current;
            var done = i < current;
            btn.classList.toggle('is-active', active);
            btn.classList.toggle('is-done', done);
            btn.setAttribute('aria-selected', active ? 'true' : 'false');
        });

        panels.forEach(function (panel, i) {
            var active = i === current;
            panel.classList.toggle('is-active', active);
            panel.hidden = !active;
        });

        if (progressEl) {
            progressEl.style.width = (((current + 1) / total) * 100) + '%';
        }
        if (countEl) {
            countEl.textContent = (current + 1) + ' / ' + total;
        }
        if (prevBtn) prevBtn.disabled = current === 0;
        if (nextBtn) nextBtn.disabled = current === total - 1;
    }

    steps.forEach(function (btn) {
        btn.addEventListener('click', function () {
            showStep(parseInt(btn.getAttribute('data-bv-step'), 10));
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', function () { showStep(current - 1); });
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', function () { showStep(current + 1); });
    }
})();
</script>
@endsection
