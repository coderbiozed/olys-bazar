<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;

class VendorOrderController extends Controller
{
    private function vendorOrderItemExists(int $orderId): bool
    {
        return OrderItem::where('order_id', $orderId)
            ->where('vendor_id', (string) Auth::id())
            ->exists();
    }

    public function VendorOrder()
    {
        $orderitem = OrderItem::with('order')
            ->where('vendor_id', (string) Auth::id())
            ->orderBy('id', 'DESC')
            ->get();

        return view('vendor.backend.orders.pending_orders', compact('orderitem'));
    }

    public function VendorReturnOrder()
    {
        $orderitem = OrderItem::with('order')
            ->where('vendor_id', (string) Auth::id())
            ->orderBy('id', 'DESC')
            ->get();

        return view('vendor.backend.orders.return_orders', compact('orderitem'));
    }

    public function VendorCompleteReturnOrder()
    {
        $orderitem = OrderItem::with('order')
            ->where('vendor_id', (string) Auth::id())
            ->orderBy('id', 'DESC')
            ->get();

        return view('vendor.backend.orders.complete_return_orders', compact('orderitem'));
    }

    public function VendorOrderDetails($order_id)
    {
        if (!$this->vendorOrderItemExists((int) $order_id)) {
            abort(403, 'You do not have access to this order.');
        }

        $order = Order::with('division', 'district', 'state', 'user')
            ->where('id', $order_id)
            ->firstOrFail();

        $orderItem = OrderItem::with('product')
            ->where('order_id', $order_id)
            ->where('vendor_id', (string) Auth::id())
            ->orderBy('id', 'DESC')
            ->get();

        return view('vendor.backend.orders.vendor_order_details', compact('order', 'orderItem'));
    }
}
