@extends('frontend.pages.info_layout')
@section('page_title', 'Contact Us')
@section('page_content')

@php $setting = App\Models\SiteSetting::find(1); @endphp

<div class="row">
    <div class="col-md-5 mb-30">
        <h5 class="mb-20">Get in Touch</h5>
        <ul class="contact-infor">
            @if($setting?->company_address)
                <li class="mb-15"><strong>Address:</strong> {{ $setting->company_address }}</li>
            @endif
            @if($setting?->phone_one)
                <li class="mb-15"><strong>Phone:</strong> {{ $setting->phone_one }}</li>
            @endif
            @if($setting?->email)
                <li class="mb-15"><strong>Email:</strong> {{ $setting->email }}</li>
            @endif
            @if($setting?->support_phone)
                <li class="mb-15"><strong>Support:</strong> {{ $setting->support_phone }}</li>
            @endif
        </ul>
    </div>
    <div class="col-md-7">
        <form method="post" action="{{ route('page.contact.store') }}">
            @csrf
            <div class="form-group mb-20">
                <label>Your Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name ?? '') }}" required>
            </div>
            <div class="form-group mb-20">
                <label>Email Address *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email ?? '') }}" required>
            </div>
            <div class="form-group mb-20">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', auth()->user()->phone ?? '') }}">
            </div>
            <div class="form-group mb-20">
                <label>Subject *</label>
                <input type="text" name="subject" class="form-control" value="{{ old('subject', request('subject')) }}" required>
            </div>
            <div class="form-group mb-20">
                <label>Message *</label>
                <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-fill-out">Send Message</button>
        </form>
    </div>
</div>
@endsection
