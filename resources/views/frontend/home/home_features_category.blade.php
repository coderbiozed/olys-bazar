@php
    $categories = App\Models\Category::withCount([
        'products' => fn ($query) => $query->where('status', 1),
    ])->orderBy('category_name', 'ASC')->get();
@endphp

<section class="mg-featured-categories">
    <div class="container">
        <div class="mg-section-head mg-section-head--compact">
            <h3>Featured Categories</h3>
            <a href="{{ route('shop.page') }}">See All</a>
        </div>

        <div class="mg-category-grid">
            @forelse($categories as $category)
                <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}" class="mg-category-tile">
                    <span class="mg-category-tile__img">
                        <img src="{{ $category->imageUrl() }}" alt="{{ $category->category_name }}" loading="lazy" />
                    </span>
                    <span class="mg-category-tile__name">{{ $category->category_name }}</span>
                    <span class="mg-category-tile__count">{{ $category->products_count }} items</span>
                </a>
            @empty
                <p class="mg-category-empty">No categories yet.</p>
            @endforelse
        </div>
    </div>
</section>
