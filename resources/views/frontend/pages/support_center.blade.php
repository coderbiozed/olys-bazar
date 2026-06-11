@extends('frontend.master_dashboard')

@section('title')
Support Center — {{ $siteName }}
@endsection

@section('main')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/info-pages.css?v=1.0') }}" />

@php
    $asset = fn (string $path) => asset('frontend/assets/imgs/' . ltrim($path, '/'));
    $heroImage = file_exists(public_path('frontend/assets/imgs/banner/banner-9.png'))
        ? $asset('banner/banner-9.png')
        : $asset('slider/slider-1.png');
@endphp

<script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

<div class="ip-page">

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Support Center
            </div>
        </div>
    </div>

    <section class="ip-hero" aria-labelledby="support-hero-heading">
        <div class="container">
            <div class="ip-hero__inner wow animate__animated animate__fadeIn">
                <div>
                    <div class="ip-hero__eyebrow"><span aria-hidden="true"></span> We're here to help</div>
                    <h1 id="support-hero-heading">How can we help you today?</h1>
                    <p class="ip-hero__lead">
                        Get answers about orders, returns, payments, and your account — or reach our team directly for anything else.
                    </p>
                </div>
                <div class="ip-hero__visual">
                    <img src="{{ $heroImage }}" alt="{{ $siteName }} customer support team" width="520" height="360" loading="eager" />
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section ip-section--tight" aria-labelledby="support-quick-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">Quick actions</span>
                <h2 id="support-quick-heading">Resolve common issues fast</h2>
            </div>
            <div class="ip-action-grid wow animate__animated animate__fadeInUp">
                <article class="ip-action-card">
                    <div class="ip-action-card__icon"><img src="{{ $asset('theme/icons/icon-location.svg') }}" alt="" /></div>
                    <h4>Track Your Order</h4>
                    <p>Check real-time status using your invoice number from email or SMS.</p>
                    <a href="{{ route('public.track.order') }}" class="btn btn-sm btn-fill-out">Track Order</a>
                </article>
                <article class="ip-action-card">
                    <div class="ip-action-card__icon"><img src="{{ $asset('theme/icons/icon-email.svg') }}" alt="" /></div>
                    <h4>Submit a Help Ticket</h4>
                    <p>Report order issues, returns, or general inquiries — we reply within 24 hours.</p>
                    <a href="{{ route('page.contact') }}" class="btn btn-sm btn-fill-out">Contact Support</a>
                </article>
                <article class="ip-action-card">
                    <div class="ip-action-card__icon"><img src="{{ $asset('theme/icons/icon-cart.svg') }}" alt="" /></div>
                    <h4>My Orders</h4>
                    <p>View order history, download invoices, and request returns from your account.</p>
                    <a href="{{ auth()->check() ? route('user.order.page') : route('login') }}" class="btn btn-sm btn-fill-out">View Orders</a>
                </article>
                <article class="ip-action-card">
                    <div class="ip-action-card__icon"><img src="{{ $asset('theme/icons/icon-2.svg') }}" alt="" /></div>
                    <h4>Delivery Information</h4>
                    <p>Shipping zones, charges, timelines, and express delivery options.</p>
                    <a href="{{ route('page.delivery') }}" class="btn btn-sm btn-fill-out">Delivery Info</a>
                </article>
            </div>
        </div>
    </section>

    <section class="ip-section" aria-labelledby="support-topics-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">Help topics</span>
                <h2 id="support-topics-heading">Browse by category</h2>
                <p>Select a topic to see guidance and recommended next steps.</p>
            </div>

            <div class="ip-tabs wow animate__animated animate__fadeInUp">
                <div class="ip-tabs__nav" role="tablist">
                    <button type="button" class="ip-tabs__btn is-active" role="tab" aria-selected="true" data-panel="topic-orders">Orders</button>
                    <button type="button" class="ip-tabs__btn" role="tab" aria-selected="false" data-panel="topic-returns">Returns</button>
                    <button type="button" class="ip-tabs__btn" role="tab" aria-selected="false" data-panel="topic-payments">Payments</button>
                    <button type="button" class="ip-tabs__btn" role="tab" aria-selected="false" data-panel="topic-account">Account</button>
                </div>

                <div id="topic-orders" class="ip-tabs__panel is-active ip-glass-card" role="tabpanel">
                    <h3>Order issues</h3>
                    <p class="mb-15">Wrong item, missing product, or delayed shipment? Here's what to do:</p>
                    <ul>
                        <li>Track your order first at <a href="{{ route('public.track.order') }}">Track Order</a></li>
                        <li>For delays beyond the estimated window, contact us with your invoice number</li>
                        <li>Report wrong or missing items within 24 hours with photos</li>
                    </ul>
                    <a href="{{ route('page.contact') }}?subject=Order Issue" class="btn btn-sm btn-fill-out mt-15">Report Order Issue</a>
                </div>

                <div id="topic-returns" class="ip-tabs__panel ip-glass-card" role="tabpanel" hidden>
                    <h3>Returns &amp; refunds</h3>
                    <p class="mb-15">Most non-perishable items can be returned within 7 days if unused and in original packaging.</p>
                    <ul>
                        <li>Perishable groceries must be reported on the day of delivery</li>
                        <li>Refunds are processed to your original payment method within 5–10 business days</li>
                        <li>COD refunds are issued via bKash or bank transfer</li>
                    </ul>
                    <a href="{{ route('page.contact') }}?subject=Return Request" class="btn btn-sm btn-fill-out mt-15">Start a Return</a>
                </div>

                <div id="topic-payments" class="ip-tabs__panel ip-glass-card" role="tabpanel" hidden>
                    <h3>Payments &amp; billing</h3>
                    <p class="mb-15">We accept bKash, Nagad, Visa, Amex, and cash on delivery.</p>
                    <ul>
                        <li>Payment failed? Check your balance and retry, or choose another method</li>
                        <li>Charged twice? Contact us with transaction IDs for both charges</li>
                        <li>COD orders require exact payment to the courier on delivery</li>
                    </ul>
                    <a href="{{ route('page.contact') }}?subject=Payment Issue" class="btn btn-sm btn-fill-out mt-15">Payment Help</a>
                </div>

                <div id="topic-account" class="ip-tabs__panel ip-glass-card" role="tabpanel" hidden>
                    <h3>Account &amp; login</h3>
                    <p class="mb-15">Manage your profile, addresses, and order history from your dashboard.</p>
                    <ul>
                        <li><a href="{{ route('login') }}">Sign in</a> to view orders, wishlist, and saved addresses</li>
                        <li>Forgot password? Use the reset link on the login page</li>
                        <li>Update phone or email via <a href="{{ auth()->check() ? route('user.account.page') : route('login') }}">My Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section" aria-labelledby="support-faq-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">FAQ</span>
                <h2 id="support-faq-heading">Frequently asked questions</h2>
            </div>
            <div class="ip-faq wow animate__animated animate__fadeInUp">
                <div class="ip-faq__item is-open">
                    <button type="button" class="ip-faq__question" aria-expanded="true">
                        How long does support take to respond?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            We aim to respond to all tickets within 24 hours. Urgent delivery issues are prioritized. For immediate help,
                            @if($setting?->support_phone)
                                call {{ $setting->support_phone }}.
                            @else
                                use our contact form.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        Can I cancel my order after placing it?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Orders can be cancelled within 2 hours if the vendor has not started processing. Contact support with your invoice number as soon as possible.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        How do I report a damaged product?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Take photos of the damage and packaging, then submit a ticket via <a href="{{ route('page.contact') }}">Contact Us</a> within 24 hours of delivery. Include your invoice number for faster resolution.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        Is my payment information secure?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Yes. Payments are processed through encrypted gateways. We do not store full card numbers on our servers. Read our <a href="{{ route('page.privacy') }}">Privacy Policy</a> for details.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section" aria-labelledby="support-contact-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">Contact</span>
                <h2 id="support-contact-heading">Reach our team</h2>
            </div>
            <div class="ip-help-strip wow animate__animated animate__fadeInUp">
                <article class="ip-help-item">
                    <img src="{{ $asset('theme/icons/phone-call.svg') }}" alt="" />
                    <div>
                        <h4>Phone</h4>
                        <p>
                            @if($setting?->phone_one)
                                Sales: {{ $setting->phone_one }}<br>
                                @if($setting?->support_phone)Support: {{ $setting->support_phone }}@endif
                            @else
                                <a href="{{ route('page.contact') }}">Contact us online</a>
                            @endif
                        </p>
                    </div>
                </article>
                <article class="ip-help-item">
                    <img src="{{ $asset('theme/icons/icon-email.svg') }}" alt="" />
                    <div>
                        <h4>Email</h4>
                        <p>
                            @if($setting?->email)
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            @else
                                <a href="{{ route('page.contact') }}">Send a message</a>
                            @endif
                        </p>
                    </div>
                </article>
                <article class="ip-help-item">
                    <img src="{{ $asset('theme/icons/icon-location.svg') }}" alt="" />
                    <div>
                        <h4>Address</h4>
                        <p>{{ $setting?->company_address ?? 'Khulna, Bangladesh' }}</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="ip-section" style="padding-top: 0;">
        <div class="container">
            <div class="ip-cta wow animate__animated animate__fadeInUp">
                <h2>Still need help?</h2>
                <p>Open a support ticket and our team will get back to you as soon as possible.</p>
                <div class="ip-cta__actions">
                    <a href="{{ route('page.contact') }}" class="btn btn-light">Contact Support</a>
                    <a href="{{ route('public.track.order') }}" class="btn btn-outline-light">Track Order</a>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="{{ asset('frontend/assets/js/info-pages.js?v=1.0') }}"></script>
@endsection
