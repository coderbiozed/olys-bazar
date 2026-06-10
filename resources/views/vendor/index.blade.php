@extends('vendor.vendor_dashboard')
@section('vendor')

@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status;
@endphp

<div class="page-content">

	@if($status === 'active')
	<h4>Vendor Account is <span class="text-success">Active</span></h4>
	@else
	<h4>Vendor Account is <span class="text-danger">Inactive</span></h4>
	<p class="text-danger"><b>Please wait — an admin will review and approve your account.</b></p>
	@endif

	@if($status === 'active')
	<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
		<div class="col">
			<div class="card radius-10 bg-gradient-deepblue">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $totalOrders }}</h5>
						<div class="ms-auto">
							<i class='bx bx-cart fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white mt-3">
						<p class="mb-0">Total Order Items</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-orange">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">${{ number_format($totalRevenue, 2) }}</h5>
						<div class="ms-auto">
							<i class='bx bx-dollar fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white mt-3">
						<p class="mb-0">Total Revenue</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ohhappiness">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $totalProducts }}</h5>
						<div class="ms-auto">
							<i class='bx bx-package fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white mt-3">
						<p class="mb-0">Total Products</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card radius-10 bg-gradient-ibiza">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h5 class="mb-0 text-white">{{ $activeProducts }}</h5>
						<div class="ms-auto">
							<i class='bx bx-check-circle fs-3 text-white'></i>
						</div>
					</div>
					<div class="d-flex align-items-center text-white mt-3">
						<p class="mb-0">Live Products</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card radius-10 mt-4">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<div>
					<h5 class="mb-0">Recent Orders</h5>
				</div>
				<div class="ms-auto">
					<a href="{{ route('vendor.order') }}" class="btn btn-sm btn-primary">View all</a>
				</div>
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table align-middle mb-0">
					<thead class="table-light">
						<tr>
							<th>Order ID</th>
							<th>Product</th>
							<th>Customer</th>
							<th>Date</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($recentOrders as $item)
						<tr>
							<td>#{{ $item->order_id }}</td>
							<td>{{ $item->product->product_name ?? 'N/A' }}</td>
							<td>{{ $item->order->user->name ?? 'Guest' }}</td>
							<td>{{ $item->created_at?->format('d M Y') }}</td>
							<td>${{ number_format($item->price, 2) }}</td>
							<td>{{ $item->qty }}</td>
							<td>
								<a href="{{ route('vendor.order.details', $item->order_id) }}" class="btn btn-sm btn-outline-primary">Details</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7" class="text-center text-muted">No orders yet.</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endif

</div>

@endsection
