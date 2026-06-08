@extends('frontend.pages.info_layout')
@section('page_title', 'Privacy Policy')
@section('page_content')
<p>At Olys Bazar, we respect your privacy and are committed to protecting your personal information.</p>

<h5 class="mb-15 mt-30">Information We Collect</h5>
<ul>
    <li>Account details (name, email, phone, address)</li>
    <li>Order and payment information</li>
    <li>Communication records when you contact support</li>
</ul>

<h5 class="mb-15 mt-30">How We Use Your Information</h5>
<ul>
    <li>To process and deliver your orders</li>
    <li>To communicate order updates and support responses</li>
    <li>To improve our services and website experience</li>
</ul>

<h5 class="mb-15 mt-30">Data Security</h5>
<p>We use industry-standard security measures to protect your data. Payment information is processed through secure payment gateways and is not stored on our servers.</p>

<h5 class="mb-15 mt-30">Contact</h5>
<p>For privacy-related questions, please <a href="{{ route('page.contact') }}" class="text-brand">contact us</a>.</p>
@endsection
