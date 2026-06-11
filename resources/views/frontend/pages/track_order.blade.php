@extends('frontend.master_dashboard')

@section('title')
Track My Order — {{ $siteName }}
@endsection

@section('main')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/info-pages.css?v=1.0') }}" />

@php
    $asset = fn (string $path) => asset('frontend/assets/imgs/' . ltrim($path, '/'));
    $heroImage = file_exists(public_path('frontend/assets/imgs/banner/banner-9.png'))
        ? $asset('banner/banner-9.png')
        : $asset('slider/slider1-2.png');
@endphp

<script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

<div class="ip-page">

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Track My Order
            </div>
        </div>
    </div>

    <section class="ip-hero" aria-labelledby="track-hero-heading">
        <div class="container">
            <div class="ip-hero__inner wow animate__animated animate__fadeIn">
                <div>
                    <div class="ip-hero__eyebrow"><span aria-hidden="true"></span> Real-time updates</div>
                    <h1 id="track-hero-heading">Track your order in seconds</h1>
                    <p class="ip-hero__lead">
                        Enter your invoice number to see where your package is — from vendor confirmation to delivery at your door.
                    </p>
                </div>
                <div class="ip-hero__visual">
                    <img src="{{ $heroImage }}" alt="Track your {{ $siteName }} order delivery status" width="520" height="360" loading="eager" />
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section ip-section--tight" aria-labelledby="track-form-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">Look up order</span>
                <h2 id="track-form-heading">Enter your invoice number</h2>
                <p>Find it in your order confirmation email, SMS, or in <a href="{{ auth()->check() ? route('user.order.page') : route('login') }}">My Orders</a>.</p>
            </div>

            <form class="ip-track-form wow animate__animated animate__fadeInUp" method="post" action="{{ route('public.order.tracking') }}">
                @csrf
                <div class="form-group">
                    <label for="track-invoice">Invoice Number</label>
                    <input type="text" id="track-invoice" name="code" class="form-control" placeholder="e.g. EOS12345678" value="{{ old('code') }}" required autofocus>
                </div>
                <button type="submit" class="btn btn-fill-out">Track Order</button>
                <p class="ip-track-hint">
                    Having trouble? <a href="{{ route('page.support') }}">Visit Support</a> or
                    @if($setting?->support_phone)
                        call <strong>{{ $setting->support_phone }}</strong>
                    @else
                        <a href="{{ route('page.contact') }}">contact us</a>
                    @endif
                </p>
            </form>
        </div>
    </section>

    <section class="ip-section" aria-labelledby="track-status-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">Order journey</span>
                <h2 id="track-status-heading">What each status means</h2>
                <p>Click a step to learn what happens at each stage of your delivery.</p>
            </div>

            <div class="ip-status-flow wow animate__animated animate__fadeInUp">
                <button type="button" class="ip-status-step is-active" aria-label="Order placed">
                    <div class="ip-status-step__dot">1</div>
                    <span>Placed</span>
                </button>
                <button type="button" class="ip-status-step" aria-label="Processing">
                    <div class="ip-status-step__dot">2</div>
                    <span>Processing</span>
                </button>
                <button type="button" class="ip-status-step" aria-label="Shipped">
                    <div class="ip-status-step__dot">3</div>
                    <span>Shipped</span>
                </button>
                <button type="button" class="ip-status-step" aria-label="Out for delivery">
                    <div class="ip-status-step__dot">4</div>
                    <span>Out for delivery</span>
                </button>
                <button type="button" class="ip-status-step" aria-label="Delivered">
                    <div class="ip-status-step__dot">5</div>
                    <span>Delivered</span>
                </button>
            </div>

            <div class="ip-status-detail is-active">
                <h4>Order Placed</h4>
                <p>Your payment is confirmed and the order has been sent to the vendor. You'll receive an invoice number for tracking.</p>
            </div>
            <div class="ip-status-detail">
                <h4>Processing</h4>
                <p>The vendor is picking and packing your items. This usually takes 4–24 hours depending on product type and stock.</p>
            </div>
            <div class="ip-status-detail">
                <h4>Shipped</h4>
                <p>Your package has left the vendor and is with our courier partner. Tracking updates become more frequent from this point.</p>
            </div>
            <div class="ip-status-detail">
                <h4>Out for Delivery</h4>
                <p>The courier is on the way to your address. You'll get an SMS shortly before arrival. Please ensure someone is available for COD orders.</p>
            </div>
            <div class="ip-status-detail">
                <h4>Delivered</h4>
                <p>Your order has arrived. Inspect items on receipt and report any issues within 24 hours via our Support Center.</p>
            </div>
        </div>
    </section>

    <section class="ip-section" aria-labelledby="track-faq-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">FAQ</span>
                <h2 id="track-faq-heading">Tracking questions</h2>
            </div>
            <div class="ip-faq wow animate__animated animate__fadeInUp">
                <div class="ip-faq__item is-open">
                    <button type="button" class="ip-faq__question" aria-expanded="true">
                        Where do I find my invoice number?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Check your order confirmation email or SMS after checkout. Logged-in users can also find it under <a href="{{ auth()->check() ? route('user.order.page') : route('login') }}">My Orders</a> next to each order.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        My tracking says "invalid invoice" — what should I do?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Double-check for typos and ensure you're using the full invoice code (e.g. EOS12345678). New orders may take up to 30 minutes to appear. Still stuck? <a href="{{ route('page.contact') }}">Contact support</a> with your order date and email.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        Why hasn't my status updated?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Status updates sync when the vendor or courier scans your package. During processing there may be a gap of several hours. See our <a href="{{ route('page.delivery') }}">Delivery Information</a> page for typical timelines.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section" style="padding-top: 0;">
        <div class="container">
            <div class="ip-cta wow animate__animated animate__fadeInUp">
                <h2>Need delivery help?</h2>
                <p>Our support team can look up your order and resolve delivery issues quickly.</p>
                <div class="ip-cta__actions">
                    <a href="{{ route('page.support') }}" class="btn btn-light">Support Center</a>
                    <a href="{{ route('page.delivery') }}" class="btn btn-outline-light">Delivery Info</a>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="{{ asset('frontend/assets/js/info-pages.js?v=1.0') }}"></script>
@endsection
