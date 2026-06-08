@extends('frontend.master_dashboard')

@section('title')
@yield('page_title')
@endsection

@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> @yield('page_title')
        </div>
    </div>
</div>

<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card border-0 shadow-sm p-40">
                    <h2 class="mb-30">@yield('page_title')</h2>
                    @yield('page_content')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
