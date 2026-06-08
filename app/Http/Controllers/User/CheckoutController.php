<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){

        $ship = ShipDistricts::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);

    } // End Method 

    public function StateGetAjax($district_id){

        $ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($ship);

    }// End Method 



    public function CheckoutStore(Request $request){

        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|string|max:20',
            'post_code' => 'required|string|max:20',
            'division_id' => 'required|integer',
            'district_id' => 'required|integer',
            'state_id' => 'required|integer',
            'shipping_address' => 'required|string|max:255',
            'payment_option' => 'required|in:bkash,nagad,visa,amex',
        ]);

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;   

        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes; 
        $cartTotal = Cart::total();

        if (in_array($request->payment_option, ['visa', 'amex'])) {
            $data['card_type'] = $request->payment_option;
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        }

        $data['payment_method'] = $request->payment_option;
        return view('frontend.payment.merchant', compact('data', 'cartTotal'));

    }// End Method 


}
 