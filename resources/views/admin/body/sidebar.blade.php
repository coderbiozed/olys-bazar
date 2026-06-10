@include('partials.sidebar-route-helper')

<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">Admin</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
	</div>

	<ul class="metismenu" id="menu">
		<li class="{{ $menuActive('admin.dashobard') }}">
			<a href="{{ route('admin.dashobard') }}">
				<div class="parent-icon"><i class='bx bx-home-circle'></i></div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>

		@if(Auth::user()->can('brand.menu') || Auth::user()->can('cat.menu') || Auth::user()->can('subcategory.menu') || Auth::user()->can('product.menu') || Auth::user()->can('stock.menu'))
			<li class="menu-label">Catalog</li>
		@endif

		@if(Auth::user()->can('brand.menu'))
			<li class="{{ $menuActive('all.brand', 'add.brand', 'edit.brand') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-cookie'></i></div>
					<div class="menu-title">Brands</div>
				</a>
				<ul class="{{ $submenuShow('all.brand', 'add.brand', 'edit.brand') }}">
					@if(Auth::user()->can('brand.list'))
						<li class="{{ $menuActive('all.brand', 'edit.brand') }}">
							<a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>All Brands</a>
						</li>
					@endif
					@if(Auth::user()->can('brand.add'))
						<li class="{{ $menuActive('add.brand') }}">
							<a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
						</li>
					@endif
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('cat.menu'))
			<li class="{{ $menuActive('all.category', 'add.category', 'edit.category') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-category"></i></div>
					<div class="menu-title">Categories</div>
				</a>
				<ul class="{{ $submenuShow('all.category', 'add.category', 'edit.category') }}">
					@if(Auth::user()->can('category.list'))
						<li class="{{ $menuActive('all.category', 'edit.category') }}">
							<a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Categories</a>
						</li>
					@endif
					@if(Auth::user()->can('category.add'))
						<li class="{{ $menuActive('add.category') }}">
							<a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
						</li>
					@endif
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('subcategory.menu'))
			<li class="{{ $menuActive('all.subcategory', 'add.subcategory', 'edit.subcategory') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-codepen"></i></div>
					<div class="menu-title">Subcategories</div>
				</a>
				<ul class="{{ $submenuShow('all.subcategory', 'add.subcategory', 'edit.subcategory') }}">
					@if(Auth::user()->can('subcategory.list'))
						<li class="{{ $menuActive('all.subcategory', 'edit.subcategory') }}">
							<a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All Subcategories</a>
						</li>
					@endif
					@if(Auth::user()->can('subcategory.add'))
						<li class="{{ $menuActive('add.subcategory') }}">
							<a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add Subcategory</a>
						</li>
					@endif
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('product.menu'))
			<li class="{{ $menuActive('all.product', 'add.product', 'edit.product') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-fresh-juice"></i></div>
					<div class="menu-title">Products</div>
				</a>
				<ul class="{{ $submenuShow('all.product', 'add.product', 'edit.product') }}">
					@if(Auth::user()->can('product.list'))
						<li class="{{ $menuActive('all.product', 'edit.product') }}">
							<a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
						</li>
					@endif
					@if(Auth::user()->can('product.add'))
						<li class="{{ $menuActive('add.product') }}">
							<a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
					@endif
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('stock.menu'))
			<li class="{{ $menuActive('product.stock') }}">
				<a href="{{ route('product.stock') }}">
					<div class="parent-icon"><i class="lni lni-cart-full"></i></div>
					<div class="menu-title">Stock</div>
				</a>
			</li>
		@endif

		@if(Auth::user()->can('slider.menu') || Auth::user()->can('ads.menu') || Auth::user()->can('coupon.menu'))
			<li class="menu-label">Marketing</li>
		@endif

		@if(Auth::user()->can('slider.menu'))
			<li class="{{ $menuActive('all.slider', 'add.slider', 'edit.slider') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-gallery"></i></div>
					<div class="menu-title">Sliders</div>
				</a>
				<ul class="{{ $submenuShow('all.slider', 'add.slider', 'edit.slider') }}">
					@if(Auth::user()->can('slider.list'))
						<li class="{{ $menuActive('all.slider', 'edit.slider') }}">
							<a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>All Sliders</a>
						</li>
					@endif
					@if(Auth::user()->can('slider.add'))
						<li class="{{ $menuActive('add.slider') }}">
							<a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
						</li>
					@endif
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('ads.menu'))
			<li class="{{ $menuActive('all.banner', 'add.banner', 'edit.banner') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-image"></i></div>
					<div class="menu-title">Banners</div>
				</a>
				<ul class="{{ $submenuShow('all.banner', 'add.banner', 'edit.banner') }}">
					@if(Auth::user()->can('ads.list'))
						<li class="{{ $menuActive('all.banner', 'edit.banner') }}">
							<a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>All Banners</a>
						</li>
					@endif
					@if(Auth::user()->can('ads.add'))
						<li class="{{ $menuActive('add.banner') }}">
							<a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
						</li>
					@endif
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('coupon.menu'))
			<li class="{{ $menuActive('all.coupon', 'add.coupon', 'edit.coupon') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-invention"></i></div>
					<div class="menu-title">Coupons</div>
				</a>
				<ul class="{{ $submenuShow('all.coupon', 'add.coupon', 'edit.coupon') }}">
					@if(Auth::user()->can('coupon.list'))
						<li class="{{ $menuActive('all.coupon', 'edit.coupon') }}">
							<a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>All Coupons</a>
						</li>
					@endif
					@if(Auth::user()->can('coupon.add'))
						<li class="{{ $menuActive('add.coupon') }}">
							<a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
						</li>
					@endif
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('area.menu'))
			<li class="menu-label">Fulfillment</li>
			<li class="{{ $menuActive('all.division', 'add.division', 'edit.division', 'all.district', 'add.district', 'edit.district', 'all.state', 'add.state', 'edit.state') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-map"></i></div>
					<div class="menu-title">Shipping Areas</div>
				</a>
				<ul class="{{ $submenuShow('all.division', 'add.division', 'edit.division', 'all.district', 'add.district', 'edit.district', 'all.state', 'add.state', 'edit.state') }}">
					<li class="{{ $menuActive('all.division', 'add.division', 'edit.division') }}">
						<a href="{{ route('all.division') }}"><i class="bx bx-right-arrow-alt"></i>Divisions</a>
					</li>
					<li class="{{ $menuActive('all.district', 'add.district', 'edit.district') }}">
						<a href="{{ route('all.district') }}"><i class="bx bx-right-arrow-alt"></i>Districts</a>
					</li>
					<li class="{{ $menuActive('all.state', 'add.state', 'edit.state') }}">
						<a href="{{ route('all.state') }}"><i class="bx bx-right-arrow-alt"></i>States</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('vendor.menu') || Auth::user()->can('order.menu') || Auth::user()->can('return.order.menu'))
			<li class="menu-label">Sales</li>
		@endif

		@if(Auth::user()->can('vendor.menu'))
			<li class="{{ $menuActive('inactive.vendor', 'active.vendor', 'inactive.vendor.details', 'active.vendor.details') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='lni lni-network'></i></div>
					<div class="menu-title">Vendors</div>
				</a>
				<ul class="{{ $submenuShow('inactive.vendor', 'active.vendor', 'inactive.vendor.details', 'active.vendor.details') }}">
					<li class="{{ $menuActive('inactive.vendor', 'inactive.vendor.details') }}">
						<a href="{{ route('inactive.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Pending Approval</a>
					</li>
					<li class="{{ $menuActive('active.vendor', 'active.vendor.details') }}">
						<a href="{{ route('active.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Active Vendors</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('order.menu'))
			<li class="{{ $menuActive('pending.order', 'admin.confirmed.order', 'admin.processing.order', 'admin.delivered.order') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-cart'></i></div>
					<div class="menu-title">Orders</div>
				</a>
				<ul class="{{ $submenuShow('pending.order', 'admin.confirmed.order', 'admin.processing.order', 'admin.delivered.order') }}">
					<li class="{{ $menuActive('pending.order') }}">
						<a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Pending</a>
					</li>
					<li class="{{ $menuActive('admin.confirmed.order') }}">
						<a href="{{ route('admin.confirmed.order') }}"><i class="bx bx-right-arrow-alt"></i>Confirmed</a>
					</li>
					<li class="{{ $menuActive('admin.processing.order') }}">
						<a href="{{ route('admin.processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing</a>
					</li>
					<li class="{{ $menuActive('admin.delivered.order') }}">
						<a href="{{ route('admin.delivered.order') }}"><i class="bx bx-right-arrow-alt"></i>Delivered</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('return.order.menu'))
			<li class="{{ $menuActive('return.request', 'complete.return.request') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='lni lni-paperclip'></i></div>
					<div class="menu-title">Returns</div>
				</a>
				<ul class="{{ $submenuShow('return.request', 'complete.return.request') }}">
					<li class="{{ $menuActive('return.request') }}">
						<a href="{{ route('return.request') }}"><i class="bx bx-right-arrow-alt"></i>Return Requests</a>
					</li>
					<li class="{{ $menuActive('complete.return.request') }}">
						<a href="{{ route('complete.return.request') }}"><i class="bx bx-right-arrow-alt"></i>Completed Returns</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('report.menu') || Auth::user()->can('user.management.menu'))
			<li class="menu-label">Insights</li>
		@endif

		@if(Auth::user()->can('report.menu'))
			<li class="{{ $menuActive('report.view', 'order.by.user') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-stats-up"></i></div>
					<div class="menu-title">Reports</div>
				</a>
				<ul class="{{ $submenuShow('report.view', 'order.by.user') }}">
					<li class="{{ $menuActive('report.view') }}">
						<a href="{{ route('report.view') }}"><i class="bx bx-right-arrow-alt"></i>Sales Report</a>
					</li>
					<li class="{{ $menuActive('order.by.user') }}">
						<a href="{{ route('order.by.user') }}"><i class="bx bx-right-arrow-alt"></i>Orders by User</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('user.management.menu'))
			<li class="{{ $menuActive('all-user') }}">
				<a href="{{ route('all-user') }}">
					<div class="parent-icon"><i class="lni lni-slideshare"></i></div>
					<div class="menu-title">Customers</div>
				</a>
			</li>
		@endif

		@if(Auth::user()->can('blog.menu') || Auth::user()->can('review.menu'))
			<li class="menu-label">Content</li>
		@endif

		@if(Auth::user()->can('blog.menu'))
			<li class="{{ $menuActive('admin.blog.category', 'admin.blog.post') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-pyramids"></i></div>
					<div class="menu-title">Blog</div>
				</a>
				<ul class="{{ $submenuShow('admin.blog.category', 'admin.blog.post') }}">
					<li class="{{ $menuActive('admin.blog.category') }}">
						<a href="{{ route('admin.blog.category') }}"><i class="bx bx-right-arrow-alt"></i>Categories</a>
					</li>
					<li class="{{ $menuActive('admin.blog.post') }}">
						<a href="{{ route('admin.blog.post') }}"><i class="bx bx-right-arrow-alt"></i>Posts</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('review.menu'))
			<li class="{{ $menuActive('pending.review', 'publish.review') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-indent-increase"></i></div>
					<div class="menu-title">Reviews</div>
				</a>
				<ul class="{{ $submenuShow('pending.review', 'publish.review') }}">
					<li class="{{ $menuActive('pending.review') }}">
						<a href="{{ route('pending.review') }}"><i class="bx bx-right-arrow-alt"></i>Pending</a>
					</li>
					<li class="{{ $menuActive('publish.review') }}">
						<a href="{{ route('publish.review') }}"><i class="bx bx-right-arrow-alt"></i>Published</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('site.menu') || Auth::user()->can('role.permission.menu') || Auth::user()->can('admin.user.menu'))
			<li class="menu-label">System</li>
		@endif

		@if(Auth::user()->can('site.menu'))
			<li class="{{ $menuActive('site.setting', 'seo.setting') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-cog"></i></div>
					<div class="menu-title">Settings</div>
				</a>
				<ul class="{{ $submenuShow('site.setting', 'seo.setting') }}">
					<li class="{{ $menuActive('site.setting') }}">
						<a href="{{ route('site.setting') }}"><i class="bx bx-right-arrow-alt"></i>Site Settings</a>
					</li>
					<li class="{{ $menuActive('seo.setting') }}">
						<a href="{{ route('seo.setting') }}"><i class="bx bx-right-arrow-alt"></i>SEO Settings</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('role.permission.menu'))
			<li class="{{ $menuActive('all.permission', 'all.roles', 'add.roles.permission', 'all.roles.permission') }}">
				<a class="has-arrow" href="javascript:;">
					<div class="parent-icon"><i class="lni lni-users"></i></div>
					<div class="menu-title">Roles & Permissions</div>
				</a>
				<ul class="{{ $submenuShow('all.permission', 'all.roles', 'add.roles.permission', 'all.roles.permission') }}">
					<li class="{{ $menuActive('all.permission') }}">
						<a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>Permissions</a>
					</li>
					<li class="{{ $menuActive('all.roles') }}">
						<a href="{{ route('all.roles') }}"><i class="bx bx-right-arrow-alt"></i>Roles</a>
					</li>
					<li class="{{ $menuActive('add.roles.permission') }}">
						<a href="{{ route('add.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>Assign Permissions</a>
					</li>
					<li class="{{ $menuActive('all.roles.permission') }}">
						<a href="{{ route('all.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>Role Permissions</a>
					</li>
				</ul>
			</li>
		@endif

		@if(Auth::user()->can('admin.user.menu'))
			<li class="{{ $menuActive('all.admin', 'add.admin') }}">
				<a class="has-arrow" href="javascript:;">
					<div class="parent-icon"><i class="lni lni-user"></i></div>
					<div class="menu-title">Admins</div>
				</a>
				<ul class="{{ $submenuShow('all.admin', 'add.admin') }}">
					<li class="{{ $menuActive('all.admin') }}">
						<a href="{{ route('all.admin') }}"><i class="bx bx-right-arrow-alt"></i>All Admins</a>
					</li>
					<li class="{{ $menuActive('add.admin') }}">
						<a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Add Admin</a>
					</li>
				</ul>
			</li>
		@endif

		<li class="menu-label">Help</li>
		<li class="{{ $menuActive('admin.profile', 'admin.change.password') }}">
			<a href="javascript:;" class="has-arrow">
				<div class="parent-icon"><i class='bx bx-user-circle'></i></div>
				<div class="menu-title">My Account</div>
			</a>
			<ul class="{{ $submenuShow('admin.profile', 'admin.change.password') }}">
				<li class="{{ $menuActive('admin.profile') }}">
					<a href="{{ route('admin.profile') }}"><i class="bx bx-right-arrow-alt"></i>Profile</a>
				</li>
				<li class="{{ $menuActive('admin.change.password') }}">
					<a href="{{ route('admin.change.password') }}"><i class="bx bx-right-arrow-alt"></i>Change Password</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">
				<div class="parent-icon"><i class='bx bx-store'></i></div>
				<div class="menu-title">View Storefront</div>
			</a>
		</li>
		<li>
			<a href="{{ route('page.contact') }}">
				<div class="parent-icon"><i class="bx bx-support"></i></div>
				<div class="menu-title">Contact Support</div>
			</a>
		</li>
		<li>
			<a href="{{ route('admin.logout') }}">
				<div class="parent-icon"><i class='bx bx-log-out-circle'></i></div>
				<div class="menu-title">Logout</div>
			</a>
		</li>
	</ul>
</div>
