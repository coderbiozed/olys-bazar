@php
    $sliders = App\Models\Slider::orderBy('id', 'ASC')->get();

    if ($sliders->isEmpty()) {
        $sliders = collect([
            (object) [
                'slider_title' => 'Welcome to MukamGhor',
                'short_title' => 'Your trusted mart & grocery store',
                'slider_image' => 'frontend/assets/imgs/slider/slider-1.png',
            ],
            (object) [
                'slider_title' => 'Fresh Deals Daily',
                'short_title' => 'Fruits, snacks, beverages and more',
                'slider_image' => 'frontend/assets/imgs/slider/slider1-1.png',
            ],
        ]);
    }
@endphp

<section class="home-slider position-relative mb-30 mg-hero-section">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1" id="hero-slider-main">
                @foreach($sliders as $item)
                    <div class="single-hero-slider single-animation-wrap"
                         style="background-image: url('{{ asset($item->slider_image) ?? 'frontend/assets/imgs/slider/slider-1.png'}}');">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">{{ $item->slider_title }}</h1>
                            <p class="mb-65">{{ $item->short_title }}</p>
                            <a href="{{ route('shop.page') }}" class="btn btn-fill-out">Shop Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
