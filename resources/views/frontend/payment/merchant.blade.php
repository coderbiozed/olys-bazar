@extends('frontend.master_dashboard')
@section('main')
@section('title')
   {{ ucfirst($data['payment_method']) }} Payment
@endsection

@php
    $currency = config('payment.currency_symbol');
    $merchantNumber = $data['payment_method'] === 'bkash'
        ? config('payment.bkash_merchant')
        : config('payment.nagad_merchant');
    $brandColor = $data['payment_method'] === 'bkash' ? '#D12053' : '#F6921E';
@endphp

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> {{ ucfirst($data['payment_method']) }} Merchant Payment
        </div>
    </div>
</div>

<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-6">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Order Summary</h4>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody>
                            @if(Session::has('coupon'))
                                <tr>
                                    <td class="cart_total_label"><h6 class="text-muted">Subtotal</h6></td>
                                    <td class="cart_total_amount"><h4 class="text-brand text-end">{{ $currency }}{{ $cartTotal }}</h4></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label"><h6 class="text-muted">Coupon</h6></td>
                                    <td class="cart_total_amount">
                                        <h6 class="text-brand text-end">{{ session()->get('coupon')['coupon_name'] }} ({{ session()->get('coupon')['coupon_discount'] }}%)</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label"><h6 class="text-muted">Discount</h6></td>
                                    <td class="cart_total_amount"><h4 class="text-brand text-end">{{ $currency }}{{ session()->get('coupon')['discount_amount'] }}</h4></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label"><h6 class="text-muted">Grand Total</h6></td>
                                    <td class="cart_total_amount"><h4 class="text-brand text-end">{{ $currency }}{{ session()->get('coupon')['total_amount'] }}</h4></td>
                                </tr>
                            @else
                                <tr>
                                    <td class="cart_total_label"><h6 class="text-muted">Grand Total</h6></td>
                                    <td class="cart_total_amount"><h4 class="text-brand text-end">{{ $currency }}{{ $cartTotal }}</h4></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4 style="color: {{ $brandColor }};">Pay with {{ ucfirst($data['payment_method']) }} Merchant</h4>
                </div>
                <div class="divider-2 mb-30"></div>

                <div class="mb-30 p-20" style="background: #f8f8f8; border-radius: 8px;">
                    <h6 class="mb-10">Merchant Number</h6>
                    <h3 style="color: {{ $brandColor }}; font-weight: 700;">{{ $merchantNumber }}</h3>
                    <p class="text-muted mb-0 mt-10">Send the exact amount from your {{ ucfirst($data['payment_method']) }} app, then enter the Transaction ID below.</p>
                </div>

                <form action="{{ route('merchant.order') }}" method="post">
                    @csrf
                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                    <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                    <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                    <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                    <input type="hidden" name="address" value="{{ $data['shipping_address'] }}">
                    <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                    <input type="hidden" name="payment_method" value="{{ $data['payment_method'] }}">

                    <div class="form-group mb-20">
                        <label for="transaction_id"><strong>{{ ucfirst($data['payment_method']) }} Transaction ID (TrxID) *</strong></label>
                        <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="e.g. 8N70ABCDE1" required>
                    </div>

                    <div class="form-group mb-20">
                        <label for="sender_number"><strong>Your {{ ucfirst($data['payment_method']) }} Number *</strong></label>
                        <input type="text" class="form-control" id="sender_number" name="sender_number" placeholder="01XXXXXXXXX" required>
                    </div>

                    <button type="submit" class="btn btn-fill-out btn-block" style="background: {{ $brandColor }}; border-color: {{ $brandColor }};">
                        Confirm Payment &amp; Place Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
