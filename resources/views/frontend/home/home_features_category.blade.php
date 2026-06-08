@php
    $categories = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp

<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">

        {{-- Mobile: advanced horizontal scroll --}}
        <div class="mg-mobile-only d-lg-none">
            <div class="mg-section-head">
                <h3>Featured Categories</h3>
                <a href="{{ route('shop.page') }}">See All</a>
            </div>
            <div class="mg-category-scroll">
                @foreach($categories as $category)
                    @php
                        $products = App\Models\Product::where('category_id', $category->id)->get();
                    @endphp
                    <div class="mg-category-card">
                        <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}">
                            <div class="mg-cat-img">
                                <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}" />
                            </div>
                            <h6>{{ $category->category_name }}</h6>
                            <span>{{ count($products) }} items</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Desktop: original carousel --}}
        <div class="d-none d-lg-block">
            <div class="section-title">
                <div class="title">
                    <h3>Featured Categories</h3>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    @foreach($categories as $category)
                        <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <figure class="img-hover-scale overflow-hidden">
                                <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}">
                                    <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}" />
                                </a>
                            </figure>
                            <h6>
                                <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a>
                            </h6>
                            @php
                                $products = App\Models\Product::where('category_id', $category->id)->get();
                            @endphp
                            <span>{{ count($products) }} items</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
