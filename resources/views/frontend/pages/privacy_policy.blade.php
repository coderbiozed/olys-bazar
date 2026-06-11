@extends('frontend.master_dashboard')

@section('title')
Privacy Policy — {{ $siteName }}
@endsection

@section('main')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/info-pages.css?v=1.0') }}" />

@php
    $asset = fn (string $path) => asset('frontend/assets/imgs/' . ltrim($path, '/'));
    $heroImage = file_exists(public_path('frontend/assets/imgs/banner/banner-9.png'))
        ? $asset('banner/banner-9.png')
        : $asset('slider/slider-1-3.png');
    $lastUpdated = 'June 1, 2026';
@endphp

<script type="application/ld+json">{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

<div class="ip-page">

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Privacy Policy
            </div>
        </div>
    </div>

    <section class="ip-hero" aria-labelledby="privacy-hero-heading">
        <div class="container">
            <div class="ip-hero__inner wow animate__animated animate__fadeIn">
                <div>
                    <div class="ip-hero__eyebrow"><span aria-hidden="true"></span> Your data, protected</div>
                    <h1 id="privacy-hero-heading">Privacy Policy</h1>
                    <p class="ip-hero__lead">
                        {{ $siteName }} respects your privacy. This policy explains what we collect, how we use it, and the choices you have.
                    </p>
                    <span class="ip-updated">Last updated: {{ $lastUpdated }}</span>
                </div>
                <div class="ip-hero__visual">
                    <img src="{{ $heroImage }}" alt="{{ $siteName }} privacy and data protection" width="520" height="360" loading="eager" />
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section ip-section--tight" aria-labelledby="privacy-content-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">Policy sections</span>
                <h2 id="privacy-content-heading">Explore our privacy practices</h2>
                <p>Select a section to read details. We keep this policy clear and up to date.</p>
            </div>

            <div class="ip-policy-layout wow animate__animated animate__fadeInUp">
                <nav class="ip-policy-nav" aria-label="Privacy policy sections">
                    <button type="button" class="is-active" data-section="policy-collect">Information we collect</button>
                    <button type="button" data-section="policy-use">How we use data</button>
                    <button type="button" data-section="policy-share">Sharing &amp; disclosure</button>
                    <button type="button" data-section="policy-security">Data security</button>
                    <button type="button" data-section="policy-rights">Your rights</button>
                    <button type="button" data-section="policy-cookies">Cookies</button>
                </nav>

                <div class="ip-policy-content">
                    <article id="policy-collect" class="ip-policy-section is-active">
                        <h3>Information we collect</h3>
                        <p>We collect information you provide directly and data generated when you use our marketplace:</p>
                        <ul>
                            <li><strong>Account details</strong> — name, email, phone number, delivery addresses</li>
                            <li><strong>Order information</strong> — products purchased, payment method, transaction references</li>
                            <li><strong>Communications</strong> — messages sent to support, reviews, and feedback</li>
                            <li><strong>Device &amp; usage data</strong> — IP address, browser type, pages visited, and referral source</li>
                        </ul>
                        <p>We do not knowingly collect personal data from children under 13.</p>
                    </article>

                    <article id="policy-use" class="ip-policy-section">
                        <h3>How we use your information</h3>
                        <p>Your data helps us run a safe, reliable marketplace:</p>
                        <ul>
                            <li>Process and deliver your orders, including sharing delivery details with vendors and couriers</li>
                            <li>Send order confirmations, shipping updates, and support responses</li>
                            <li>Prevent fraud, enforce our terms, and protect account security</li>
                            <li>Improve our website, product recommendations, and customer experience</li>
                            <li>Send promotional offers — only if you have opted in; you can unsubscribe anytime</li>
                        </ul>
                    </article>

                    <article id="policy-share" class="ip-policy-section">
                        <h3>Sharing &amp; disclosure</h3>
                        <p>We do not sell your personal information. We share data only when necessary:</p>
                        <ul>
                            <li><strong>Vendors</strong> — order and delivery details to fulfil your purchase</li>
                            <li><strong>Payment processors</strong> — bKash, Nagad, card gateways for secure transactions</li>
                            <li><strong>Logistics partners</strong> — name, phone, and address for delivery</li>
                            <li><strong>Legal requirements</strong> — when required by law or to protect rights and safety</li>
                        </ul>
                    </article>

                    <article id="policy-security" class="ip-policy-section">
                        <h3>Data security</h3>
                        <p>We use industry-standard measures to protect your information:</p>
                        <ul>
                            <li>HTTPS encryption for all data in transit</li>
                            <li>PCI-aware payment flows — full card numbers are not stored on our servers</li>
                            <li>Access controls limiting employee access to personal data on a need-to-know basis</li>
                            <li>Regular review of security practices and vendor compliance</li>
                        </ul>
                        <p>No method of transmission over the internet is 100% secure. We encourage strong passwords and prompt reporting of suspicious account activity.</p>
                    </article>

                    <article id="policy-rights" class="ip-policy-section">
                        <h3>Your rights &amp; choices</h3>
                        <p>You have control over your personal data:</p>
                        <ul>
                            <li><strong>Access &amp; update</strong> — edit profile and addresses in your account dashboard</li>
                            <li><strong>Deletion</strong> — request account deletion by contacting us; some records may be retained for legal obligations</li>
                            <li><strong>Marketing opt-out</strong> — unsubscribe from promotional emails via the link in any message</li>
                            <li><strong>Data requests</strong> — contact us for a copy of data we hold about you</li>
                        </ul>
                    </article>

                    <article id="policy-cookies" class="ip-policy-section">
                        <h3>Cookies &amp; tracking</h3>
                        <p>We use cookies and similar technologies to:</p>
                        <ul>
                            <li>Keep you signed in and remember cart contents</li>
                            <li>Understand how visitors use our site (analytics)</li>
                            <li>Deliver relevant offers where you have consented</li>
                        </ul>
                        <p>You can control cookies through your browser settings. Disabling cookies may limit some site features such as staying logged in.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section" aria-labelledby="privacy-faq-heading">
        <div class="container">
            <div class="ip-section__head wow animate__animated animate__fadeIn">
                <span class="ip-section__kicker">FAQ</span>
                <h2 id="privacy-faq-heading">Privacy questions</h2>
            </div>
            <div class="ip-faq wow animate__animated animate__fadeInUp">
                <div class="ip-faq__item is-open">
                    <button type="button" class="ip-faq__question" aria-expanded="true">
                        Do you store my card or bKash details?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            No. Payment details are handled by secure third-party gateways. We only store transaction references needed for order history and refunds.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        How do I delete my account?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            Email us at
                            @if($setting?->email)
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            @else
                                our support team
                            @endif
                            with the subject "Account Deletion Request". We will confirm and process within 14 business days.
                        </div>
                    </div>
                </div>
                <div class="ip-faq__item">
                    <button type="button" class="ip-faq__question" aria-expanded="false">
                        Will this policy change?
                        <span class="ip-faq__icon" aria-hidden="true">+</span>
                    </button>
                    <div class="ip-faq__answer">
                        <div class="ip-faq__answer-inner">
                            We may update this policy as our services evolve. Material changes will be posted on this page with an updated date. Continued use of {{ $siteName }} after changes constitutes acceptance.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ip-section" style="padding-top: 0;">
        <div class="container">
            <div class="ip-cta wow animate__animated animate__fadeInUp">
                <h2>Questions about your privacy?</h2>
                <p>Contact our team for any privacy-related requests or concerns.</p>
                <div class="ip-cta__actions">
                    <a href="{{ route('page.contact') }}?subject=Privacy Inquiry" class="btn btn-light">Contact Us</a>
                    <a href="{{ route('page.terms') }}" class="btn btn-outline-light">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="{{ asset('frontend/assets/js/info-pages.js?v=1.0') }}"></script>
@endsection
