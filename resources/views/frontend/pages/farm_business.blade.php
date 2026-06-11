@extends('frontend.pages.info_layout')
@section('page_title', 'Farm Business')
@section('page_content')
<p>We are partners with local farms and food producers to bring fresh, quality products directly to customers across Bangladesh.</p>

<h5 class="mb-15 mt-30">For Farm Vendors</h5>
<ul>
    <li>List fresh produce, dairy, and farm products on our marketplace</li>
    <li>Reach customers in cities and towns nationwide</li>
    <li>Manage orders through the vendor dashboard</li>
</ul>

<p class="mt-20">Are you a farm business looking to sell online? <a href="{{ route('become.vendor') }}" class="text-brand">Become a vendor</a> today.</p>
@endsection
