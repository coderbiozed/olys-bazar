@extends('frontend.pages.info_layout')
@section('page_title', 'Affiliate Program')
@section('page_content')
<p>Earn commissions by promoting Our products to your audience.</p>

<h5 class="mb-15 mt-30">How It Works</h5>
<ol>
    <li>Sign up for the affiliate program</li>
    <li>Share your unique referral links</li>
    <li>Earn commission on qualifying sales</li>
</ol>

<h5 class="mb-15 mt-30">Benefits</h5>
<ul>
    <li>Competitive commission rates</li>
    <li>Real-time tracking dashboard</li>
    <li>Monthly payouts via bKash or bank transfer</li>
</ul>

<p class="mt-20">Interested in joining? <a href="{{ route('page.contact') }}?subject=Affiliate Program" class="text-brand">Contact us</a> to get started.</p>
@endsection
