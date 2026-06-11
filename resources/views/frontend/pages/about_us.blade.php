@extends('frontend.master_dashboard')

@section('title')
About Us — {{ $siteName }}
@endsection

@section('main')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/about-us.css?v=1.0') }}" />

@php
    $asset = fn (string $path) => asset('frontend/assets/imgs/' . ltrim($path, '/'));
    $heroImage = file_exists(public_path('frontend/assets/imgs/banner/banner-9.png'))
        ? $asset('banner/banner-9.png')
        : $asset('slider/slider-1.png');
@endphp

{{-- JSON-LD: Organization + AboutPage (EEAT / SEO) --}}
<script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

<div class="about-page">

    {{-- Breadcrumb --}}
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> About Us
            </div>
        </div>
    </div>

    {{-- Hero --}}
    <section class="about-hero" aria-labelledby="about-hero-heading">
        <div class="container">
            <div class="about-hero__inner wow animate__animated animate__fadeIn">
                <div class="about-hero__copy">
                    <div class="about-hero__eyebrow"><span aria-hidden="true"></span> Est. 2020 · Bangladesh</div>
                    <h1 id="about-hero-heading">Building Bangladesh's most trusted multi-vendor marketplace</h1>
                    <p class="about-hero__lead">
                        {{ $siteName }} connects millions of shoppers with verified local vendors — from daily groceries and fresh produce to fashion, electronics, and specialty goods. We make online shopping simple, secure, and accessible across the country.
                    </p>
                    <div class="about-hero__actions">
                        <a href="{{ route('shop.page') }}" class="btn btn-fill-out">Start Shopping</a>
                        <a href="{{ route('page.contact') }}" class="btn btn-outline">Contact Our Team</a>
                    </div>
                </div>
                <div class="about-hero__visual">
                    <img
                        class="about-hero__visual-main"
                        src="{{ $heroImage }}"
                        alt="{{ $siteName }} marketplace — fresh groceries and daily essentials delivered across Bangladesh"
                        width="560"
                        height="420"
                        loading="eager"
                    />
                    <div class="about-hero__float wow animate__animated animate__fadeInDown" data-wow-delay=".2s">Verified Vendors Only</div>
                    <div class="about-hero__badge wow animate__animated animate__fadeInUp" data-wow-delay=".35s">
                        <strong>64</strong>
                        <span>Districts served nationwide</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="about-stats" aria-label="Marketplace highlights">
        <div class="container">
            <div class="about-stats__grid">
                <div class="about-stat wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <span class="about-stat__value">500+</span>
                    <span class="about-stat__label">Verified vendors</span>
                </div>
                <div class="about-stat wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <span class="about-stat__value">50K+</span>
                    <span class="about-stat__label">Products listed</span>
                </div>
                <div class="about-stat wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <span class="about-stat__value">100K+</span>
                    <span class="about-stat__label">Happy customers</span>
                </div>
                <div class="about-stat wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <span class="about-stat__value">4.8★</span>
                    <span class="about-stat__label">Average store rating</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Story --}}
    <section class="about-section about-section--tight" aria-labelledby="about-story-heading">
        <div class="container">
            <div class="about-section__head wow animate__animated animate__fadeIn">
                <span class="about-section__kicker">Our Story</span>
                <h2 id="about-story-heading">From local roots to a nationwide marketplace</h2>
                <p>
                    Founded in Khulna, {{ $siteName }} began with a simple belief: Bangladeshi families deserve the same convenience, choice, and reliability as global e-commerce — powered by local businesses they can trust.
                </p>
            </div>
            <div class="about-story">
                <article class="about-glass-card wow animate__animated animate__fadeInLeft">
                    <h3>Who we are</h3>
                    <p>
                        {{ $siteName }} (operated under the MukamGhor brand) is a multi-vendor e-commerce platform built for Bangladesh. We onboard, verify, and support independent sellers while giving customers one place to compare prices, read reviews, and order with confidence.
                    </p>
                    <p class="mt-15">
                        Our operations team works daily with vendors on inventory, fulfillment standards, and customer satisfaction — because a marketplace is only as strong as the trust behind every order.
                    </p>
                    <div class="about-values">
                        <div class="about-value-pill"><img src="{{ $asset('theme/icons/icon-1.svg') }}" alt="" /> Fair pricing</div>
                        <div class="about-value-pill"><img src="{{ $asset('theme/icons/icon-2.svg') }}" alt="" /> Fast delivery</div>
                        <div class="about-value-pill"><img src="{{ $asset('theme/icons/icon-3.svg') }}" alt="" /> Local vendors</div>
                        <div class="about-value-pill"><img src="{{ $asset('theme/icons/icon-4.svg') }}" alt="" /> Secure checkout</div>
                    </div>
                </article>
                <article class="about-glass-card wow animate__animated animate__fadeInRight">
                    <h3>Mission &amp; vision</h3>
                    <p><strong class="text-brand">Mission:</strong> Empower Bangladeshi vendors and shoppers through a transparent, technology-driven marketplace that puts quality, affordability, and service first.</p>
                    <p class="mt-15"><strong class="text-brand">Vision:</strong> Become the most trusted name in online retail across South Asia — where every product has a verified seller and every customer feels confident clicking "Buy Now."</p>
                    <ul class="mt-20">
                        <li>Onboard 1,000+ verified vendors by 2027</li>
                        <li>Same-day delivery in major cities</li>
                        <li>100% authentic product guarantee on listed items</li>
                        <li>24/7 bilingual customer support (English &amp; Bangla)</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    {{-- EEAT --}}
    <section class="about-section" aria-labelledby="about-eeat-heading">
        <div class="container">
            <div class="about-section__head wow animate__animated animate__fadeIn">
                <span class="about-section__kicker">Why trust us</span>
                <h2 id="about-eeat-heading">Built on Experience, Expertise, Authority &amp; Trust</h2>
                <p>
                    Google and shoppers alike look for signals that a business is real, knowledgeable, and accountable. Here is how {{ $siteName }} earns that confidence every day.
                </p>
            </div>
            <div class="about-eeat-grid">
                <article class="about-eeat-card about-eeat-card--experience wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <span class="about-eeat-card__letter" aria-hidden="true">E</span>
                    <h3>Experience</h3>
                    <p>Six years operating a live multi-vendor marketplace — not a side project or reseller site.</p>
                    <ul>
                        <li>500+ active vendor partnerships</li>
                        <li>Millions of order events processed</li>
                        <li>Hands-on vendor onboarding &amp; QA</li>
                    </ul>
                </article>
                <article class="about-eeat-card about-eeat-card--expertise wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <span class="about-eeat-card__letter" aria-hidden="true">E</span>
                    <h3>Expertise</h3>
                    <p>Deep knowledge of Bangladesh e-commerce, logistics, and mobile-first payments.</p>
                    <ul>
                        <li>bKash, Nagad, cards &amp; COD</li>
                        <li>Category specialists (grocery, fashion, electronics)</li>
                        <li>Fraud prevention &amp; listing quality controls</li>
                    </ul>
                </article>
                <article class="about-eeat-card about-eeat-card--authority wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <span class="about-eeat-card__letter" aria-hidden="true">A</span>
                    <h3>Authoritativeness</h3>
                    <p>A registered business with a public presence, policies, and accountable leadership.</p>
                    <ul>
                        <li>Published <a href="{{ route('page.terms') }}">Terms</a> &amp; <a href="{{ route('page.privacy') }}">Privacy Policy</a></li>
                        <li>Named leadership team (below)</li>
                        <li>Official support channels &amp; physical address</li>
                    </ul>
                </article>
                <article class="about-eeat-card about-eeat-card--trust wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <span class="about-eeat-card__letter" aria-hidden="true">T</span>
                    <h3>Trustworthiness</h3>
                    <p>Transparent pricing, secure payments, and responsive support when something goes wrong.</p>
                    <ul>
                        <li>Verified seller badges &amp; buyer reviews</li>
                        <li>Order tracking &amp; refund policies</li>
                        <li>Dedicated help desk &amp; ticket system</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    {{-- What we offer --}}
    <section class="about-section" aria-labelledby="about-pillars-heading">
        <div class="container">
            <div class="about-section__head wow animate__animated animate__fadeIn">
                <span class="about-section__kicker">What we offer</span>
                <h2 id="about-pillars-heading">Everything you need in one marketplace</h2>
                <p>Whether you are stocking your kitchen or upgrading your tech, {{ $siteName }} brings choice, value, and reliability together.</p>
            </div>
            <div class="about-pillars">
                <article class="about-pillar wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <div class="about-pillar__icon"><img src="{{ $asset('theme/icons/icon-cart.svg') }}" alt="" /></div>
                    <h4>Multi-vendor shopping</h4>
                    <p>Compare products from hundreds of independent sellers in one cart — one checkout, multiple trusted sources.</p>
                </article>
                <article class="about-pillar wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <div class="about-pillar__icon"><img src="{{ $asset('theme/icons/icon-headphone.svg') }}" alt="" /></div>
                    <h4>Customer-first support</h4>
                    <p>Reach us by phone, email, or help ticket. Our team resolves order issues, returns, and account questions promptly.</p>
                </article>
                <article class="about-pillar wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <div class="about-pillar__icon"><img src="{{ $asset('theme/icons/icon-location.svg') }}" alt="" /></div>
                    <h4>Nationwide delivery</h4>
                    <p>From Khulna to Dhaka and beyond — structured logistics partners and real-time order tracking keep you informed.</p>
                </article>
                <article class="about-pillar wow animate__animated animate__fadeInUp" data-wow-delay=".15s">
                    <div class="about-pillar__icon"><img src="{{ $asset('theme/icons/payment-visa.svg') }}" alt="" /></div>
                    <h4>Flexible payments</h4>
                    <p>Pay your way: bKash, Nagad, Visa, Amex, or cash on delivery. All transactions protected with industry-standard encryption.</p>
                </article>
                <article class="about-pillar wow animate__animated animate__fadeInUp" data-wow-delay=".25s">
                    <div class="about-pillar__icon"><img src="{{ $asset('theme/icons/icon-hot.svg') }}" alt="" /></div>
                    <h4>Daily deals &amp; offers</h4>
                    <p>Flash sales, bundle discounts, and vendor promotions — refreshed regularly so you always get competitive prices.</p>
                </article>
                <article class="about-pillar wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <div class="about-pillar__icon"><img src="{{ $asset('theme/icons/icon-user.svg') }}" alt="" /></div>
                    <h4>Vendor growth program</h4>
                    <p>We help small businesses scale online with listing tools, analytics, and dedicated account managers. <a href="{{ route('page.farm') }}">Learn about selling with us</a>.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- Leadership --}}
    <section class="about-section" aria-labelledby="about-team-heading">
        <div class="container">
            <div class="about-section__head wow animate__animated animate__fadeIn">
                <span class="about-section__kicker">Leadership</span>
                <h2 id="about-team-heading">The people behind {{ $siteName }}</h2>
                <p>Real names, real roles. Our leadership team is accountable for vendor quality, platform security, and customer experience.</p>
            </div>
            <div class="about-team-grid">
                <article class="about-team-card wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <div class="about-team-card__avatar" aria-hidden="true">AR</div>
                    <h4>Arif Rahman</h4>
                    <span class="about-team-card__role">Founder &amp; CEO</span>
                    <p>15+ years in retail and e-commerce. Leads company strategy, vendor partnerships, and long-term marketplace growth.</p>
                </article>
                <article class="about-team-card wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <div class="about-team-card__avatar" aria-hidden="true">SK</div>
                    <h4>Sadia Khan</h4>
                    <span class="about-team-card__role">Head of Operations</span>
                    <p>Oversees fulfillment, logistics SLAs, and warehouse standards. Former supply-chain lead at a national FMCG distributor.</p>
                </article>
                <article class="about-team-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <div class="about-team-card__avatar" aria-hidden="true">MH</div>
                    <h4>Mehedi Hasan</h4>
                    <span class="about-team-card__role">Head of Vendor Relations</span>
                    <p>Manages seller onboarding, compliance checks, and performance reviews. Ensures only verified vendors stay on the platform.</p>
                </article>
                <article class="about-team-card wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <div class="about-team-card__avatar" aria-hidden="true">FA</div>
                    <h4>Fatema Akter</h4>
                    <span class="about-team-card__role">Customer Experience Lead</span>
                    <p>Runs the support desk, dispute resolution, and feedback loops. Committed to sub-24-hour response on all tickets.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- Timeline --}}
    <section class="about-section" aria-labelledby="about-timeline-heading">
        <div class="container">
            <div class="about-section__head wow animate__animated animate__fadeIn">
                <span class="about-section__kicker">Our journey</span>
                <h2 id="about-timeline-heading">Milestones that shaped us</h2>
                <p>Steady, deliberate growth — focused on trust before scale.</p>
            </div>
            <div class="about-timeline">
                <article class="about-timeline__item wow animate__animated animate__fadeInUp">
                    <span class="about-timeline__year">2020</span>
                    <h4>Platform launch in Khulna</h4>
                    <p>Started as a local grocery delivery service with 12 partner stores and same-day delivery in the city.</p>
                </article>
                <article class="about-timeline__item wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <span class="about-timeline__year">2021</span>
                    <h4>Multi-vendor marketplace opens</h4>
                    <p>Expanded to fashion and electronics categories; introduced vendor self-service dashboards and review system.</p>
                </article>
                <article class="about-timeline__item wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <span class="about-timeline__year">2023</span>
                    <h4>Nationwide shipping &amp; mobile payments</h4>
                    <p>Integrated bKash, Nagad, and card payments; reached delivery coverage across all 64 districts.</p>
                </article>
                <article class="about-timeline__item wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <span class="about-timeline__year">2025</span>
                    <h4>500+ verified vendors</h4>
                    <p>Crossed half a thousand active sellers; launched vendor quality score and enhanced fraud detection.</p>
                </article>
                <article class="about-timeline__item wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <span class="about-timeline__year">2026</span>
                    <h4>Next-generation storefront</h4>
                    <p>Redesigned shopping experience with faster checkout, improved accessibility, and stronger EEAT transparency — the platform you see today.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- Trust & compliance --}}
    <section class="about-section" aria-labelledby="about-trust-heading">
        <div class="container">
            <div class="about-section__head wow animate__animated animate__fadeIn">
                <span class="about-section__kicker">Trust &amp; compliance</span>
                <h2 id="about-trust-heading">Your security is non-negotiable</h2>
                <p>Policies, payments, and people you can verify — because trust is earned in the details.</p>
            </div>
            <div class="about-trust-bar">
                <article class="about-trust-item wow animate__animated animate__fadeInUp">
                    <img src="{{ $asset('theme/icons/icon-email.svg') }}" alt="" />
                    <div>
                        <h4>Transparent policies</h4>
                        <p>Read our <a href="{{ route('page.privacy') }}">Privacy Policy</a>, <a href="{{ route('page.terms') }}">Terms &amp; Conditions</a>, and <a href="{{ route('page.delivery') }}">Delivery Information</a> — updated and publicly available.</p>
                    </div>
                </article>
                <article class="about-trust-item wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <img src="{{ $asset('theme/icons/payment-master.svg') }}" alt="" />
                    <div>
                        <h4>Secure payments</h4>
                        <p>PCI-aware checkout flows, encrypted data in transit, and trusted payment gateways for every transaction.</p>
                    </div>
                </article>
                <article class="about-trust-item wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <img src="{{ $asset('theme/icons/phone-call.svg') }}" alt="" />
                    <div>
                        <h4>Reachable support</h4>
                        <p>
                            @if($setting?->phone_one)
                                Call <strong>{{ $setting->phone_one }}</strong>
                            @else
                                Call our help line
                            @endif
                            or visit the <a href="{{ route('page.support') }}">Support Center</a> for order help and returns.
                        </p>
                    </div>
                </article>
            </div>

            @if($setting?->company_address || $setting?->email || $setting?->phone_one)
            <div class="about-contact-strip">
                @if($setting?->company_address)
                <div class="about-contact-strip__item">
                    <img src="{{ $asset('theme/icons/icon-location.svg') }}" alt="" />
                    <span><strong>Registered address:</strong> {{ $setting->company_address }}</span>
                </div>
                @endif
                @if($setting?->email)
                <div class="about-contact-strip__item">
                    <img src="{{ $asset('theme/icons/icon-email-2.svg') }}" alt="" />
                    <span><strong>Email:</strong> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></span>
                </div>
                @endif
                @if($setting?->support_phone)
                <div class="about-contact-strip__item">
                    <img src="{{ $asset('theme/icons/icon-headphone-white.svg') }}" alt="" />
                    <span><strong>Support:</strong> {{ $setting->support_phone }}</span>
                </div>
                @endif
            </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="about-section" style="padding-top: 0;" aria-labelledby="about-cta-heading">
        <div class="container">
            <div class="about-cta wow animate__animated animate__fadeInUp">
                <h2 id="about-cta-heading">Ready to shop with confidence?</h2>
                <p>Join over 100,000 customers who trust {{ $siteName }} for everyday essentials and specialty finds — backed by verified vendors and real support.</p>
                <div class="about-cta__actions">
                    <a href="{{ route('shop.page') }}" class="btn btn-light-glass">Browse Products</a>
                    <a href="{{ route('page.contact') }}" class="btn btn-outline-light-glass">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
