@extends('frontend.master_dashboard')
@section('main')
@section('title')
   Checkout Page 
@endsection

@php $currency = config('payment.currency_symbol'); @endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Checkout
        </div>
    </div>
</div>

<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h3 class="heading-2 mb-10">Checkout</h3>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">Review your order and complete billing details</h6>
            </div>
        </div>
    </div>

    <form method="post" action="{{ route('checkout.store') }}">
        @csrf
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>

                    <div class="form-group col-lg-6">
                        <label>Full Name *</label>
                        <input type="text" required name="shipping_name" placeholder="Full Name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Email Address *</label>
                        <input type="email" required name="shipping_email" placeholder="Email Address" value="{{ Auth::user()->email }}">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Phone Number *</label>
                        <input type="text" required name="shipping_phone" placeholder="01XXXXXXXXX" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Post Code *</label>
                        <input type="text" required name="post_code" placeholder="Post Code">
                    </div>

                    <div class="row shipping_calculator w-100">
                        <div class="form-group col-lg-4">
                            <label>Division *</label>
                            <div class="custom_select">
                                <select name="division_id" class="form-control" required>
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $item)
                                        <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>District *</label>
                            <div class="custom_select">
                                <select name="district_id" class="form-control" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Upazila / Thana *</label>
                            <div class="custom_select">
                                <select name="state_id" class="form-control" required>
                                    <option value="">Select Upazila</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Street Address *</label>
                        <input type="text" required name="shipping_address" placeholder="House, road, area" value="{{ Auth::user()->address }}">
                    </div>

                    <div class="form-group col-lg-12 mb-30">
                        <label>Order Notes (Optional)</label>
                        <textarea rows="4" placeholder="Delivery instructions or additional information" name="notes"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @foreach($carts as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset($item->options->image) }}" alt="#" style="width:50px; height:50px;">
                                        </td>
                                        <td>
                                            <h6 class="w-160 mb-5"><a href="#" class="text-heading">{{ $item->name }}</a></h6>
                                            <div class="product-rate-cover">
                                                <strong>Color: {{ $item->options->color ?? 'N/A' }}</strong><br>
                                                <strong>Size: {{ $item->options->size ?? 'N/A' }}</strong>
                                            </div>
                                        </td>
                                        <td><h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6></td>
                                        <td><h4 class="text-brand">{{ $currency }}{{ $item->price }}</h4></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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

                <div class="payment ml-30">
                    <h4 class="mb-30">Payment Method</h4>
                    <div class="payment_option">
                        <div class="custome-radio mb-15">
                            <input class="form-check-input" type="radio" name="payment_option" value="bkash" id="paymentBkash" checked>
                            <label class="form-check-label" for="paymentBkash">
                                <strong style="color:#D12053;">bKash</strong> Merchant
                            </label>
                        </div>
                        <div class="custome-radio mb-15">
                            <input class="form-check-input" type="radio" name="payment_option" value="nagad" id="paymentNagad">
                            <label class="form-check-label" for="paymentNagad">
                                <strong style="color:#F6921E;">Nagad</strong> Merchant
                            </label>
                        </div>
                        <div class="custome-radio mb-15">
                            <input class="form-check-input" type="radio" name="payment_option" value="visa" id="paymentVisa">
                            <label class="form-check-label" for="paymentVisa">
                                <strong style="color:#1A1F71;">Visa</strong> Card
                            </label>
                        </div>
                        <div class="custome-radio mb-15">
                            <input class="form-check-input" type="radio" name="payment_option" value="amex" id="paymentAmex">
                            <label class="form-check-label" for="paymentAmex">
                                <strong style="color:#006FCF;">American Express</strong> (Amex)
                            </label>
                        </div>
                    </div>

                    <div class="payment-logo d-flex flex-wrap mt-20 mb-10">
                        <span class="badge mr-10 mb-10 p-10" style="background:#D12053;color:#fff;">bKash</span>
                        <span class="badge mr-10 mb-10 p-10" style="background:#F6921E;color:#fff;">Nagad</span>
                        <img class="mr-10 mb-10" src="{{ asset('frontend/assets/imgs/theme/icons/payment-visa.svg') }}" alt="Visa" style="height:28px;">
                        <img class="mr-10 mb-10" src="{{ asset('frontend/assets/imgs/theme/icons/payment-master.svg') }}" alt="Amex" style="height:28px;">
                    </div>

                    <button type="submit" class="btn btn-fill-out btn-block mt-30">
                        Proceed to Payment<i class="fi-rs-sign-out ml-15"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            $('select[name="district_id"]').html('<option value="">Select District</option>');
            $('select[name="state_id"]').html('<option value="">Select Upazila</option>');

            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/"+division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">'+ value.district_name +'</option>');
                        });
                    }
                });
            }
        });

        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            $('select[name="state_id"]').html('<option value="">Select Upazila</option>');

            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/"+district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $.each(data, function(key, value){
                            $('select[name="state_id"]').append('<option value="'+ value.id +'">'+ value.state_name +'</option>');
                        });
                    }
                });
            }
        });
    });
</script>

@endsection
