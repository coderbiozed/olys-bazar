@extends('frontend.pages.info_layout')
@section('page_title', 'Delivery Information')
@section('page_content')
<h5 class="mb-15">Shipping Coverage</h5>
<p>We deliver across all divisions in Bangladesh. Delivery times vary by location, typically 2–7 business days after order confirmation.</p>

<h5 class="mb-15 mt-30">Delivery Charges</h5>
<ul>
    <li>Inside Dhaka: standard delivery charges apply at checkout</li>
    <li>Outside Dhaka: charges based on division and weight</li>
    <li>Free delivery may apply on orders above a minimum amount (shown at checkout)</li>
</ul>

<h5 class="mb-15 mt-30">Order Processing</h5>
<ol>
    <li>Place your order and complete payment</li>
    <li>Vendor confirms and prepares your items</li>
    <li>Order is shipped to your address</li>
    <li>Track your order using your invoice number</li>
</ol>

<p class="mt-20"><a href="{{ route('public.track.order') }}" class="text-brand">Track your order here</a></p>
@endsection
