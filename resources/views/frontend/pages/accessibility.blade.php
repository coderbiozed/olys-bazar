@extends('frontend.pages.info_layout')
@section('page_title', 'Accessibility')
@section('page_content')
<p>We are committed to making our website accessible to all users, including those with disabilities.</p>

<h5 class="mb-15 mt-30">Our Commitment</h5>
<ul>
    <li>Clear navigation and readable typography</li>
    <li>Keyboard-friendly forms and controls</li>
    <li>Descriptive labels on interactive elements</li>
    <li>Ongoing improvements based on user feedback</li>
</ul>

<p class="mt-20">If you encounter accessibility barriers on our site, please <a href="{{ route('page.contact') }}" class="text-brand">let us know</a> so we can address them.</p>
@endsection
