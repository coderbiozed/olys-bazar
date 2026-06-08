@extends('frontend.pages.info_layout')
@section('page_title', 'Track My Order')
@section('page_content')
<p>Enter your invoice number to track your order status.</p>

<form method="post" action="{{ route('public.order.tracking') }}" class="mt-30">
    @csrf
    <div class="form-group mb-20">
        <label>Invoice Number *</label>
        <input type="text" name="code" class="form-control" placeholder="e.g. EOS12345678" value="{{ old('code') }}" required>
    </div>
    <button type="submit" class="btn btn-fill-out">Track Order</button>
</form>

<p class="text-muted mt-20">You can find your invoice number in your order confirmation email or in <a href="{{ auth()->check() ? route('user.order.page') : route('login') }}" class="text-brand">My Orders</a>.</p>
@endsection
