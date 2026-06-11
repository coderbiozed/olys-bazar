@extends('frontend.master_dashboard')

@section('title')
Delivery Information — {{ $siteName }}
@endsection

@section('main')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/delivery-info.css?v=1.0') }}" />

@php
    $asset = fn (string $path) => asset('frontend/assets/imgs/' . ltrim($path, '/'));
    $heroImage = file_exists(public_path('frontend/assets/imgs/banner/banner-9.png'))
        ? $asset('banner/banner-9.png')
        : $asset('slider/slider-1.png');
@endphp

<script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

<div class="delivery-page">

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Delivery Information
            </div>
        </div>
    </div>

    {{-- Hero --}}
    <section class="delivery-hero" aria-labelledby="delivery-hero-heading">
        <div class="container">
            <div class="delivery-hero__inner wow animate__animated animate__fadeIn">
                <div class="delivery-hero__copy">
                    <div class="delivery-hero__eyebrow"><span aria-hidden="true"></span> Nationwide shipping</div>
                    <h1 id="delivery-hero-heading">Fast, reliable delivery across Bangladesh</h1>
                    <p class="delivery-hero__lead">
                        From Dhaka express routes to every division nationwide — {{ $siteName }} partners with trusted couriers to get your order to your door safely. See zones, charges, and timelines below.
                    </p>
                    <div class="delivery-hero__actions">
                        <a href="{{ route('public.track.order') }}" class="btn btn-fill-out">Track My Order</a>
                        <a href="{{ route('shop.page') }}" class="btn btn-outline">Continue Shopping</a>
                    </div>
                </div>
                <div class="delivery-hero__visual">
                    <img
                        class="delivery-hero__visual-main"
                        src="{{ $heroImage }}"
                        alt="Delivery service — {{ $siteName }} ships orders across Bangladesh"
                        width="560"
                        height="400"
                        loading="eager"
                    />
                    <div class="delivery-hero__float wow animate__animated animate__fadeInDown" data-wow-delay=".2s">Free delivery on qualifying orders</div>
                    <div class="delivery-hero__badge wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <strong>64</strong>
                        <span>Districts covered</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="delivery-stats" aria-label="Delivery highlights">
        <div class="container">
            <div class="delivery-stats__grid">
                <div class="delivery-stat wow animate__animated animate__fadeInUp">
                    <span class="delivery-stat__value">2–7</span>
                    <span class="delivery-stat__label">Business days (standard)</span>
                </div>
                <div class="delivery-stat wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <span class="delivery-stat__value">Same day</span>
                    <span class="delivery-stat__label">Express in select Dhaka areas</span>
                </div>
                <div class="delivery-stat wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <span class="delivery-stat__value">৳0</span>
                    <span class="delivery-stat__label">Free shipping above minimum*</span>
                </div>
                <div class="delivery-stat wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <span class="delivery-stat__value">Live</span>
                    <span class="delivery-stat__label">Order tracking by invoice</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Interactive zone tabs --}}
    <section class="delivery-section delivery-section--tight" aria-labelledby="delivery-zones-heading">
        <div class="container">
            <div class="delivery-section__head wow animate__animated animate__fadeIn">
                <span class="delivery-section__kicker">Delivery zones</span>
                <h2 id="delivery-zones-heading">Where we deliver &amp; how long it takes</h2>
                <p>Select your area to see estimated delivery time, charges, and free-shipping thresholds. Final rates are confirmed at checkout.</p>
            </div>

            <div class="delivery-zones wow animate__animated animate__fadeInUp">
                <div class="delivery-zones__nav" role="tablist" aria-label="Delivery zones">
                    <button type="button" class="delivery-zones__tab is-active" role="tab" aria-selected="true" aria-controls="zone-dhaka" data-zone="zone-dhaka">Inside Dhaka</button>
                    <button type="button" class="delivery-zones__tab" role="tab" aria-selected="false" aria-controls="zone-outside" data-zone="zone-outside">Outside Dhaka</button>
                    <button type="button" class="delivery-zones__tab" role="tab" aria-selected="false" aria-controls="zone-express" data-zone="zone-express">Express Delivery</button>
                </div>

                <div id="zone-dhaka" class="delivery-zones__panel is-active" role="tabpanel">
                    <article class="delivery-zone-card">
                        <div class="delivery-zone-card__header">
                            <div class="delivery-zone-card__icon"><img src="{{ $asset('theme/icons/icon-location.svg') }}" alt="" /></div>
                            <div>
                                <h3>Dhaka Metropolitan Area</h3>
                                <p class="delivery-zone-card__meta">Mirpur, Gulshan, Dhanmondi, Uttara, Old Dhaka &amp; surrounding areas</p>
                            </div>
                        </div>
                        <div class="delivery-zone-card__grid">
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Standard delivery</span>
                                <span class="delivery-zone-detail__value">1–3 business days</span>
                                <span class="delivery-zone-detail__note">After vendor confirms order</span>
                            </div>
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Delivery charge</span>
                                <span class="delivery-zone-detail__value">৳60 – ৳120</span>
                                <span class="delivery-zone-detail__note">Based on weight &amp; vendor</span>
                            </div>
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Free shipping</span>
                                <span class="delivery-zone-detail__value">Orders ৳500+</span>
                                <span class="delivery-zone-detail__note">Shown at checkout</span>
                            </div>
                        </div>
                        <p class="delivery-zone-card__note">Cash on delivery (COD) is available for most Dhaka addresses. Express same-day slots may appear at checkout for eligible vendors.</p>
                    </article>
                </div>

                <div id="zone-outside" class="delivery-zones__panel" role="tabpanel" hidden>
                    <article class="delivery-zone-card">
                        <div class="delivery-zone-card__header">
                            <div class="delivery-zone-card__icon"><img src="{{ $asset('theme/icons/icon-2.svg') }}" alt="" /></div>
                            <div>
                                <h3>All Other Divisions</h3>
                                <p class="delivery-zone-card__meta">Chittagong, Khulna, Rajshahi, Sylhet, Barishal, Rangpur &amp; Mymensingh</p>
                            </div>
                        </div>
                        <div class="delivery-zone-card__grid">
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Standard delivery</span>
                                <span class="delivery-zone-detail__value">3–7 business days</span>
                                <span class="delivery-zone-detail__note">Remote areas may take longer</span>
                            </div>
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Delivery charge</span>
                                <span class="delivery-zone-detail__value">৳100 – ৳250</span>
                                <span class="delivery-zone-detail__note">Varies by division &amp; weight</span>
                            </div>
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Free shipping</span>
                                <span class="delivery-zone-detail__value">Orders ৳1,000+</span>
                                <span class="delivery-zone-detail__note">Select vendors only</span>
                            </div>
                        </div>
                        <p class="delivery-zone-card__note">We ship to all 64 districts. Fragile or oversized items may have adjusted fees — you'll see the exact amount before you pay.</p>
                    </article>
                </div>

                <div id="zone-express" class="delivery-zones__panel" role="tabpanel" hidden>
                    <article class="delivery-zone-card">
                        <div class="delivery-zone-card__header">
                            <div class="delivery-zone-card__icon"><img src="{{ $asset('theme/icons/icon-hot.svg') }}" alt="" /></div>
                            <div>
                                <h3>Same-Day Express</h3>
                                <p class="delivery-zone-card__meta">Limited slots in central Dhaka — order before 2:00 PM</p>
                            </div>
                        </div>
                        <div class="delivery-zone-card__grid">
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Delivery window</span>
                                <span class="delivery-zone-detail__value">Same day</span>
                                <span class="delivery-zone-detail__note">Orders placed before 2 PM</span>
                            </div>
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Express charge</span>
                                <span class="delivery-zone-detail__value">৳150 – ৳250</span>
                                <span class="delivery-zone-detail__note">Added to standard fee</span>
                            </div>
                            <div class="delivery-zone-detail">
                                <span class="delivery-zone-detail__label">Availability</span>
                                <span class="delivery-zone-detail__value">Grocery &amp; essentials</span>
                                <span class="delivery-zone-detail__note">Vendor-dependent</span>
                            </div>
                        </div>
                        <p class="delivery-zone-card__note">Express is offered by select vendors for fresh groceries and daily essentials. Look for the "Express" badge on product pages.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- Interactive order flow --}}
    <section class="delivery-section" aria-labelledby="delivery-flow-heading">
        <div class="container">
            <div class="delivery-section__head wow animate__animated animate__fadeIn">
                <span class="delivery-section__kicker">How it works</span>
                <h2 id="delivery-flow-heading">Your order journey — step by step</h2>
                <p>Click each step to see what happens behind the scenes from checkout to your doorstep.</p>
            </div>

            <div class="delivery-flow wow animate__animated animate__fadeInUp">
                <div class="delivery-flow__steps" role="tablist" aria-label="Order steps">
                    <button type="button" class="delivery-flow__step-btn is-active" role="tab" aria-selected="true" data-step="0">
                        <span class="delivery-flow__step-num">1</span>
                        <span class="delivery-flow__step-title">Place &amp; pay</span>
                    </button>
                    <button type="button" class="delivery-flow__step-btn" role="tab" aria-selected="false" data-step="1">
                        <span class="delivery-flow__step-num">2</span>
                        <span class="delivery-flow__step-title">Vendor prepares</span>
                    </button>
                    <button type="button" class="delivery-flow__step-btn" role="tab" aria-selected="false" data-step="2">
                        <span class="delivery-flow__step-num">3</span>
                        <span class="delivery-flow__step-title">Shipped out</span>
                    </button>
                    <button type="button" class="delivery-flow__step-btn" role="tab" aria-selected="false" data-step="3">
                        <span class="delivery-flow__step-num">4</span>
                        <span class="delivery-flow__step-title">Delivered</span>
                    </button>
                </div>

                <div class="delivery-flow__panels">
                    <article class="delivery-flow__detail is-active" data-step-panel="0">
                        <h4>Step 1 — Place your order &amp; complete payment</h4>
                        <p>Add items to cart, enter your delivery address, and choose a payment method: bKash, Nagad, card, or cash on delivery.</p>
                        <ul>
                            <li>Review delivery charge and estimated date at checkout</li>
                            <li>You'll receive an order confirmation email/SMS with your invoice number</li>
                            <li>Save your invoice number — you'll need it to track your package</li>
                        </ul>
                    </article>
                    <article class="delivery-flow__detail" data-step-panel="1">
                        <h4>Step 2 — Vendor confirms &amp; prepares your items</h4>
                        <p>Your order is sent to the vendor for confirmation. They pick, pack, and quality-check every item before handoff to our courier partner.</p>
                        <ul>
                            <li>Typical processing: 4–24 hours depending on product type</li>
                            <li>Fresh grocery orders are prioritized for same-day dispatch when possible</li>
                            <li>If an item is unavailable, our team will contact you for a replacement or refund</li>
                        </ul>
                    </article>
                    <article class="delivery-flow__detail" data-step-panel="2">
                        <h4>Step 3 — Order is shipped to your address</h4>
                        <p>Once packed, your parcel is handed to our logistics partner. Tracking updates appear on your order status page.</p>
                        <ul>
                            <li>Track live status using your invoice number on our <a href="{{ route('public.track.order') }}">Track Order</a> page</li>
                            <li>SMS notifications at key milestones (dispatched, out for delivery)</li>
                            <li>Multi-vendor orders may arrive in separate packages</li>
                        </ul>
                    </article>
                    <article class="delivery-flow__detail" data-step-panel="3">
                        <h4>Step 4 — Delivered to your door</h4>
                        <p>Our courier delivers to the address you provided. For COD orders, please keep exact change ready if possible.</p>
                        <ul>
                            <li>Inspect your package before accepting — report damage within 24 hours</li>
                            <li>Rate your experience and leave a product review</li>
                            <li>Need help? Visit our <a href="{{ route('page.support') }}">Support Center</a> or <a href="{{ route('page.contact') }}">Contact Us</a></li>
                        </ul>
                    </article>
                </div>

                <div class="delivery-flow__nav">
                    <button type="button" id="delivery-flow-prev" disabled aria-label="Previous step">← Previous</button>
                    <button type="button" id="delivery-flow-next" aria-label="Next step">Next →</button>
                </div>
            </div>
        </div>
    </section>

    {{-- Coverage by division --}}
    <section class="delivery-section" aria-labelledby="delivery-coverage-heading">
        <div class="container">
            <div class="delivery-section__head wow animate__animated animate__fadeIn">
                <span class="delivery-section__kicker">Coverage</span>
                <h2 id="delivery-coverage-heading">Shipping across all divisions</h2>
                <p>We deliver nationwide. Estimated times below are for standard shipping after vendor processing.</p>
            </div>
            <div class="delivery-coverage">
                <article class="delivery-coverage-card wow animate__animated animate__fadeInUp">
                    <h4>Dhaka Division</h4>
                    <p>Capital and surrounding districts including Gazipur, Narayanganj, and Manikganj.</p>
                    <span class="delivery-coverage-card__time">⏱ 1–3 days</span>
                </article>
                <article class="delivery-coverage-card wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4>Chittagong &amp; Sylhet</h4>
                    <p>Port cities, hill tracts, and northeastern regions via partner hubs.</p>
                    <span class="delivery-coverage-card__time">⏱ 3–5 days</span>
                </article>
                <article class="delivery-coverage-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4>Khulna, Rajshahi &amp; Barishal</h4>
                    <p>Southwestern and northern districts including our home base in Khulna.</p>
                    <span class="delivery-coverage-card__time">⏱ 3–7 days</span>
                </article>
            </div>
        </div>
    </section>

    {{-- Pricing table --}}
    <section class="delivery-section" aria-labelledby="delivery-pricing-heading">
        <div class="container">
            <div class="delivery-section__head wow animate__animated animate__fadeIn">
                <span class="delivery-section__kicker">Charges</span>
                <h2 id="delivery-pricing-heading">Delivery fee overview</h2>
                <p>Exact fees are calculated at checkout based on your address, cart weight, and vendor location.</p>
            </div>
            <div class="delivery-pricing wow animate__animated animate__fadeInUp">
                <table>
                    <thead>
                        <tr>
                            <th>Zone</th>
                            <th>Standard fee</th>
                            <th>Free shipping from</th>
                            <th>Est. time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Inside Dhaka</td>
                            <td data-label="Standard fee">৳60 – ৳120</td>
                            <td data-label="Free shipping from" class="text-free">৳500+</td>
                            <td data-label="Est. time">1–3 days</td>
                        </tr>
                        <tr>
                            <td>Divisional cities</td>
                            <td data-label="Standard fee">৳100 – ৳180</td>
                            <td data-label="Free shipping from" class="text-free">৳800+</td>
                            <td data-label="Est. time">3–5 days</td>
                        </tr>
                        <tr>
                            <td>Other districts</td>
                            <td data-label="Standard fee">৳120 – ৳250</td>
                            <td data-label="Free shipping from" class="text-free">৳1,000+</td>
                            <td data-label="Est. time">4–7 days</td>
                        </tr>
                        <tr>
                            <td>Express (Dhaka only)</td>
                            <td data-label="Standard fee">+৳150 – ৳250</td>
                            <td data-label="Free shipping from">Not applicable</td>
                            <td data-label="Est. time">Same day</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- FAQ accordion --}}
    <section class="delivery-section" aria-labelledby="delivery-faq-heading">
        <div class="container">
            <div class="delivery-section__head wow animate__animated animate__fadeIn">
                <span class="delivery-section__kicker">FAQ</span>
                <h2 id="delivery-faq-heading">Common delivery questions</h2>
                <p>Tap a question to expand the answer. Can't find what you need? <a href="{{ route('page.contact') }}">Contact support</a>.</p>
            </div>

            <div class="delivery-faq wow animate__animated animate__fadeInUp">
                <div class="delivery-faq__item is-open">
                    <button type="button" class="delivery-faq__question" aria-expanded="true">
                        How do I track my order?
                        <span class="delivery-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="delivery-faq__answer">
                        <div class="delivery-faq__answer-inner">
                            Go to our <a href="{{ route('public.track.order') }}">Track Order</a> page and enter your invoice number from the confirmation email or SMS. You'll see real-time status updates from processing through delivery.
                        </div>
                    </div>
                </div>
                <div class="delivery-faq__item">
                    <button type="button" class="delivery-faq__question" aria-expanded="false">
                        Can I change my delivery address after ordering?
                        <span class="delivery-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="delivery-faq__answer">
                        <div class="delivery-faq__answer-inner">
                            Contact us within 2 hours of placing your order via <a href="{{ route('page.contact') }}">Contact Us</a> or call
                            @if($setting?->support_phone)
                                {{ $setting->support_phone }}
                            @else
                                our support line
                            @endif
                            . Once the vendor has dispatched, address changes may not be possible.
                        </div>
                    </div>
                </div>
                <div class="delivery-faq__item">
                    <button type="button" class="delivery-faq__question" aria-expanded="false">
                        What if I'm not home when delivery arrives?
                        <span class="delivery-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="delivery-faq__answer">
                        <div class="delivery-faq__answer-inner">
                            Our courier will attempt delivery up to two times. They may leave the package with a trusted neighbour or reschedule. For COD orders, someone must be present to receive and pay. You'll receive an SMS before each attempt.
                        </div>
                    </div>
                </div>
                <div class="delivery-faq__item">
                    <button type="button" class="delivery-faq__question" aria-expanded="false">
                        Do you deliver on weekends and public holidays?
                        <span class="delivery-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="delivery-faq__answer">
                        <div class="delivery-faq__answer-inner">
                            Standard deliveries operate Saturday–Thursday. Friday and national holidays may add 1 business day to your estimated delivery. Express same-day service is unavailable on Fridays and public holidays.
                        </div>
                    </div>
                </div>
                <div class="delivery-faq__item">
                    <button type="button" class="delivery-faq__question" aria-expanded="false">
                        My order has multiple vendors — will it arrive together?
                        <span class="delivery-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="delivery-faq__answer">
                        <div class="delivery-faq__answer-inner">
                            Multi-vendor orders are shipped separately because each seller packs and dispatches from their own location. You'll receive separate tracking updates for each package. Delivery charges are calculated per vendor at checkout.
                        </div>
                    </div>
                </div>
                <div class="delivery-faq__item">
                    <button type="button" class="delivery-faq__question" aria-expanded="false">
                        What is your return policy for damaged items?
                        <span class="delivery-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="delivery-faq__answer">
                        <div class="delivery-faq__answer-inner">
                            Report damaged or wrong items within 24 hours of delivery with photos via our <a href="{{ route('page.support') }}">Support Center</a>. We'll arrange a replacement or refund after review. Perishable grocery items must be reported on the same day.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Help cards --}}
    <section class="delivery-section" aria-labelledby="delivery-help-heading">
        <div class="container">
            <div class="delivery-section__head wow animate__animated animate__fadeIn">
                <span class="delivery-section__kicker">Need help?</span>
                <h2 id="delivery-help-heading">We're here for delivery issues</h2>
            </div>
            <div class="delivery-help-grid">
                <article class="delivery-help-card wow animate__animated animate__fadeInUp">
                    <img src="{{ $asset('theme/icons/icon-headphone.svg') }}" alt="" />
                    <div>
                        <h4>Support Center</h4>
                        <p>Order issues, returns, and delivery complaints. <a href="{{ route('page.support') }}">Visit Support →</a></p>
                    </div>
                </article>
                <article class="delivery-help-card wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <img src="{{ $asset('theme/icons/phone-call.svg') }}" alt="" />
                    <div>
                        <h4>Call us</h4>
                        <p>
                            @if($setting?->phone_one)
                                {{ $setting->phone_one }} (sales) · {{ $setting->support_phone ?? 'support line' }}
                            @else
                                Reach us through the contact form.
                            @endif
                        </p>
                    </div>
                </article>
                <article class="delivery-help-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <img src="{{ $asset('theme/icons/icon-email.svg') }}" alt="" />
                    <div>
                        <h4>Email support</h4>
                        <p>
                            @if($setting?->email)
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a> — we reply within 24 hours.
                            @else
                                <a href="{{ route('page.contact') }}">Send us a message</a>
                            @endif
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- Track CTA --}}
    <section class="delivery-section" style="padding-top: 0;" aria-labelledby="delivery-track-heading">
        <div class="container">
            <div class="delivery-track wow animate__animated animate__fadeInUp">
                <h2 id="delivery-track-heading">Track your order now</h2>
                <p>Enter your invoice number to see live delivery status — from vendor prep to your doorstep.</p>
                <form class="delivery-track__form" method="post" action="{{ route('public.order.tracking') }}">
                    @csrf
                    <input type="text" name="code" placeholder="Invoice number (e.g. EOS12345678)" aria-label="Invoice number" value="{{ old('code') }}" required />
                    <button type="submit" class="btn">Track Order</button>
                </form>
                <div class="delivery-track__links">
                    <a href="{{ route('page.terms') }}">Terms &amp; Conditions</a>
                    <a href="{{ route('page.privacy') }}">Privacy Policy</a>
                    <a href="{{ route('page.about') }}">About {{ $siteName }}</a>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
(function () {
    /* Zone tabs */
    var zoneTabs = document.querySelectorAll('.delivery-zones__tab');
    var zonePanels = document.querySelectorAll('.delivery-zones__panel');

    zoneTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var targetId = tab.getAttribute('data-zone');

            zoneTabs.forEach(function (t) {
                t.classList.remove('is-active');
                t.setAttribute('aria-selected', 'false');
            });
            zonePanels.forEach(function (p) {
                p.classList.remove('is-active');
                p.hidden = true;
            });

            tab.classList.add('is-active');
            tab.setAttribute('aria-selected', 'true');
            var panel = document.getElementById(targetId);
            if (panel) {
                panel.classList.add('is-active');
                panel.hidden = false;
            }
        });
    });

    /* Order flow steps */
    var stepBtns = document.querySelectorAll('.delivery-flow__step-btn');
    var stepPanels = document.querySelectorAll('.delivery-flow__detail');
    var prevBtn = document.getElementById('delivery-flow-prev');
    var nextBtn = document.getElementById('delivery-flow-next');
    var currentStep = 0;
    var totalSteps = stepBtns.length;

    function showStep(index) {
        currentStep = Math.max(0, Math.min(index, totalSteps - 1));

        stepBtns.forEach(function (btn, i) {
            var active = i === currentStep;
            btn.classList.toggle('is-active', active);
            btn.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        stepPanels.forEach(function (panel, i) {
            panel.classList.toggle('is-active', i === currentStep);
        });

        if (prevBtn) prevBtn.disabled = currentStep === 0;
        if (nextBtn) nextBtn.disabled = currentStep === totalSteps - 1;
    }

    stepBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            showStep(parseInt(btn.getAttribute('data-step'), 10));
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', function () { showStep(currentStep - 1); });
    }
    if (nextBtn) {
        nextBtn.addEventListener('click', function () { showStep(currentStep + 1); });
    }

    /* FAQ accordion */
    document.querySelectorAll('.delivery-faq__question').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var item = btn.closest('.delivery-faq__item');
            var isOpen = item.classList.contains('is-open');

            document.querySelectorAll('.delivery-faq__item').forEach(function (el) {
                el.classList.remove('is-open');
                el.querySelector('.delivery-faq__question').setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                item.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });
})();
</script>
@endsection
