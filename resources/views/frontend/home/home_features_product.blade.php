@php
    $featured = App\Models\Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
    $currency = config('payment.currency_symbol', '৳');
@endphp

<section class="section-padding pb-5">
    <div class="container">

        {{-- Mobile layout --}}
        <div class="mg-mobile-only d-lg-none">
            <div class="mg-section-head">
                <h3>Featured Products</h3>
                <a href="{{ route('shop.page') }}">See All</a>
            </div>
            <div class="mg-featured-mobile">
                <div class="mg-featured-banner">
                    <h4>Fresh picks from MukamGhor</h4>
                    <p>Top-rated grocery &amp; daily essentials delivered to your door.</p>
                    <a href="{{ route('shop.page') }}" class="btn">Shop Now</a>
                </div>
                <div class="mg-product-grid-mobile">
                    @foreach($featured as $product)
                        @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = $product->selling_price > 0 ? ($amount / $product->selling_price) * 100 : 0;
                        @endphp
                        <div class="mg-product-card-mobile">
                            <div class="mg-product-img">
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                    <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}" />
                                </a>
                                <span class="mg-badge {{ $product->discount_price ? 'hot' : '' }}">
                                    @if($product->discount_price == NULL)
                                        New
                                    @else
                                        {{ round($discount) }}% Off
                                    @endif
                                </span>
                            </div>
                            <div class="mg-product-body">
                                <div class="mg-product-cat">{{ $product['category']['category_name'] ?? 'Grocery' }}</div>
                                <h6>
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a>
                                </h6>
                                <div class="mg-price">
                                    @if($product->discount_price == NULL)
                                        <span class="current">{{ $currency }}{{ $product->selling_price }}</span>
                                    @else
                                        <span class="current">{{ $currency }}{{ $product->discount_price }}</span>
                                        <span class="old">{{ $currency }}{{ $product->selling_price }}</span>
                                    @endif
                                </div>
                                <div class="mg-quick-actions">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}" class="btn-view">View Product</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Desktop layout --}}
        <div class="d-none d-lg-block">
            <div class="section-title wow animate__animated animate__fadeIn">
                <h3>Featured Products</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                    <div class="banner-img style-2">
                        <div class="banner-text">
                            <h2 class="mb-100">Fresh picks from MukamGhor</h2>
                            <a href="{{ route('shop.page') }}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    @foreach($featured as $product)
                                        @php
                                            $amount = $product->selling_price - $product->discount_price;
                                            $discount = $product->selling_price > 0 ? ($amount / $product->selling_price) * 100 : 0;
                                            $reviewcount = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->get();
                                            $avarage = App\Models\Review::where('product_id', $product->id)->where('status', 1)->avg('rating');
                                        @endphp
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                                                        <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    @if($product->discount_price == NULL)
                                                        <span class="new">New</span>
                                                    @else
                                                        <span class="hot">{{ round($discount) }}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="{{ url('product/category/'.$product->category_id.'/'.$product['category']['category_slug']) }}">{{ $product['category']['category_name'] }}</a>
                                                </div>
                                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                                <div class="product-rate d-inline-block">
                                                    @if($avarage == 0)
                                                    @elseif($avarage < 2)
                                                        <div class="product-rating" style="width: 20%"></div>
                                                    @elseif($avarage < 3)
                                                        <div class="product-rating" style="width: 40%"></div>
                                                    @elseif($avarage < 4)
                                                        <div class="product-rating" style="width: 60%"></div>
                                                    @elseif($avarage < 5)
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    @else
                                                        <div class="product-rating" style="width: 100%"></div>
                                                    @endif
                                                </div>
                                                @if($product->discount_price == NULL)
                                                    <div class="product-price mt-10">
                                                        <span>{{ $currency }}{{ $product->selling_price }}</span>
                                                    </div>
                                                @else
                                                    <div class="product-price mt-10">
                                                        <span>{{ $currency }}{{ $product->discount_price }}</span>
                                                        <span class="old-price">{{ $currency }}{{ $product->selling_price }}</span>
                                                    </div>
                                                @endif
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}" class="btn w-100 hover-up mt-15"><i class="fi-rs-shopping-cart mr-5"></i>View Product</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
