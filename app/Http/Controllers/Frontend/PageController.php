<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('frontend.pages.about_us');
    }

    public function deliveryInformation()
    {
        return view('frontend.pages.delivery_information');
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacy_policy');
    }

    public function termsConditions()
    {
        return view('frontend.pages.terms_conditions');
    }

    public function contactUs()
    {
        return view('frontend.pages.contact_us');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $setting = SiteSetting::find(1);
        $to = $setting?->email ?? config('mail.from.address');

        Mail::raw(
            "Name: {$request->name}\nEmail: {$request->email}\nPhone: {$request->phone}\nSubject: {$request->subject}\n\n{$request->message}",
            function ($mail) use ($to, $request) {
                $mail->to($to)
                    ->replyTo($request->email, $request->name)
                    ->subject('Contact Form: ' . $request->subject);
            }
        );

        $notification = [
            'message' => 'Your message has been sent successfully. We will get back to you soon.',
            'alert-type' => 'success',
        ];

        return redirect()->route('page.contact')->with($notification);
    }

    public function supportCenter()
    {
        return view('frontend.pages.support_center');
    }

    public function careers()
    {
        return view('frontend.pages.careers');
    }

    public function affiliateProgram()
    {
        return view('frontend.pages.affiliate_program');
    }

    public function farmBusiness()
    {
        return view('frontend.pages.farm_business');
    }

    public function accessibility()
    {
        return view('frontend.pages.accessibility');
    }

    public function promotions()
    {
        return redirect()->route('shop.page');
    }

    public function trackOrder()
    {
        return view('frontend.pages.track_order');
    }

    public function orderTracking(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $track = Order::where('invoice_no', $request->code)->first();

        if ($track) {
            return view('frontend.traking.track_order', compact('track'));
        }

        $notification = [
            'message' => 'Invoice code is invalid. Please check and try again.',
            'alert-type' => 'error',
        ];

        return redirect()->back()->with($notification);
    }

    public function newsletterSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $notification = [
            'message' => 'Thank you for subscribing to our newsletter!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
