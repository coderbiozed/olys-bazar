@extends('frontend.pages.info_layout')
@section('page_title', 'Careers')
@section('page_content')
<p>Join Our team and help shape the future of e-commerce in Bangladesh.</p>

<h5 class="mb-15 mt-30">Why Work With Us</h5>
<ul>
    <li>Growing multi-vendor marketplace</li>
    <li>Collaborative and inclusive work environment</li>
    <li>Opportunities across technology, operations, and customer service</li>
</ul>

<h5 class="mb-15 mt-30">Open Positions</h5>
<p>We are always looking for talented people. Current openings will be posted here. To apply, send your CV to our team via the contact form.</p>

<a href="{{ route('page.contact') }}?subject=Career Application" class="btn btn-fill-out mt-20">Apply Now</a>
@endsection
