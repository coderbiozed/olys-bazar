@extends('frontend.pages.info_layout')
@section('page_title', 'Support Center')
@section('page_content')
<p>Need help? Our support team is here for you.</p>

<div class="row mt-30">
    <div class="col-md-6 mb-20">
        <div class="border p-30 radius-10">
            <h5>Track Your Order</h5>
            <p class="text-muted">Check the status of your order using your invoice number.</p>
            <a href="{{ route('public.track.order') }}" class="btn btn-sm btn-fill-out">Track Order</a>
        </div>
    </div>
    <div class="col-md-6 mb-20">
        <div class="border p-30 radius-10">
            <h5>Submit a Help Ticket</h5>
            <p class="text-muted">Contact our team for order issues, returns, or general inquiries.</p>
            <a href="{{ route('page.contact') }}" class="btn btn-sm btn-fill-out">Contact Support</a>
        </div>
    </div>
    <div class="col-md-6 mb-20">
        <div class="border p-30 radius-10">
            <h5>My Orders</h5>
            <p class="text-muted">View order history, invoices, and return requests.</p>
            <a href="{{ auth()->check() ? route('user.order.page') : route('login') }}" class="btn btn-sm btn-fill-out">View Orders</a>
        </div>
    </div>
    <div class="col-md-6 mb-20">
        <div class="border p-30 radius-10">
            <h5>FAQs</h5>
            <p class="text-muted">Find answers about delivery, payments, and returns.</p>
            <a href="{{ route('page.delivery') }}" class="btn btn-sm btn-fill-out">Delivery Info</a>
        </div>
    </div>
</div>
@endsection
