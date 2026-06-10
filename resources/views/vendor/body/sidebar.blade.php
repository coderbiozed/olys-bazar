@php
	$vendor = Auth::user();
	$isActiveVendor = $vendor->status === 'active';
@endphp

@include('partials.sidebar-route-helper')

<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div>
			<img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
		</div>
		<div>
			<h4 class="logo-text">Vendor</h4>
		</div>
		<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
	</div>

	<ul class="metismenu" id="menu">
		<li class="{{ $menuActive('vendor.dashobard') }}">
			<a href="{{ route('vendor.dashobard') }}">
				<div class="parent-icon"><i class='bx bx-home-circle'></i></div>
				<div class="menu-title">Dashboard</div>
			</a>
		</li>

		@if($isActiveVendor)
			<li class="menu-label">Catalog</li>
			<li class="{{ $menuActive('vendor.all.product', 'vendor.add.product', 'vendor.edit.product') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='lni lni-fresh-juice'></i></div>
					<div class="menu-title">Products</div>
				</a>
				<ul class="{{ $submenuShow('vendor.all.product', 'vendor.add.product', 'vendor.edit.product') }}">
					<li class="{{ $menuActive('vendor.all.product', 'vendor.edit.product') }}">
						<a href="{{ route('vendor.all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
					</li>
					<li class="{{ $menuActive('vendor.add.product') }}">
						<a href="{{ route('vendor.add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
					</li>
				</ul>
			</li>

			<li class="menu-label">Sales</li>
			<li class="{{ $menuActive('vendor.order', 'vendor.order.details', 'vendor.return.order', 'vendor.complete.return.order') }}">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-cart"></i></div>
					<div class="menu-title">Orders</div>
				</a>
				<ul class="{{ $submenuShow('vendor.order', 'vendor.order.details', 'vendor.return.order', 'vendor.complete.return.order') }}">
					<li class="{{ $menuActive('vendor.order', 'vendor.order.details') }}">
						<a href="{{ route('vendor.order') }}"><i class="bx bx-right-arrow-alt"></i>All Orders</a>
					</li>
					<li class="{{ $menuActive('vendor.return.order') }}">
						<a href="{{ route('vendor.return.order') }}"><i class="bx bx-right-arrow-alt"></i>Return Requests</a>
					</li>
					<li class="{{ $menuActive('vendor.complete.return.order') }}">
						<a href="{{ route('vendor.complete.return.order') }}"><i class="bx bx-right-arrow-alt"></i>Completed Returns</a>
					</li>
				</ul>
			</li>

			<li class="{{ $menuActive('vendor.all.review') }}">
				<a href="{{ route('vendor.all.review') }}">
					<div class="parent-icon"><i class="lni lni-indent-increase"></i></div>
					<div class="menu-title">Reviews</div>
				</a>
			</li>
		@else
			<li class="menu-label">Account Status</li>
			<li>
				<a href="{{ route('vendor.dashobard') }}">
					<div class="parent-icon"><i class='bx bx-time-five'></i></div>
					<div class="menu-title">Pending Approval</div>
				</a>
			</li>
		@endif

		<li class="menu-label">Account</li>
		<li class="{{ $menuActive('vendor.profile') }}">
			<a href="{{ route('vendor.profile') }}">
				<div class="parent-icon"><i class='bx bx-user'></i></div>
				<div class="menu-title">Profile</div>
			</a>
		</li>
		<li class="{{ $menuActive('vendor.change.password') }}">
			<a href="{{ route('vendor.change.password') }}">
				<div class="parent-icon"><i class='bx bx-lock-alt'></i></div>
				<div class="menu-title">Change Password</div>
			</a>
		</li>

		<li class="menu-label">Help</li>
		@if($isActiveVendor)
			<li>
				<a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">
					<div class="parent-icon"><i class='bx bx-store'></i></div>
					<div class="menu-title">View Storefront</div>
				</a>
			</li>
		@endif
		<li>
			<a href="{{ route('page.contact') }}">
				<div class="parent-icon"><i class="bx bx-support"></i></div>
				<div class="menu-title">Contact Support</div>
			</a>
		</li>
		<li>
			<a href="{{ route('vendor.logout') }}">
				<div class="parent-icon"><i class='bx bx-log-out-circle'></i></div>
				<div class="menu-title">Logout</div>
			</a>
		</li>
	</ul>
</div>
