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
        $setting = SiteSetting::find(1);
        $siteName = $setting?->site_name ?? 'Olys Bazar';

        $sameAs = array_values(array_filter([
            $setting?->facebook,
            $setting?->twitter,
            $setting?->youtube,
        ]));

        $organizationSchema = array_filter([
            '@type' => 'Organization',
            '@id' => url('/') . '/#organization',
            'name' => $siteName,
            'url' => url('/'),
            'logo' => $setting?->logo_url ?? asset('frontend/assets/imgs/theme/logo-mukamghor.png'),
            'description' => 'Trusted multi-vendor online marketplace in Bangladesh connecting customers with verified local vendors for groceries, fashion, electronics, and daily essentials.',
            'foundingDate' => '2020',
            'areaServed' => [
                '@type' => 'Country',
                'name' => 'Bangladesh',
            ],
            'address' => $setting?->company_address ? [
                '@type' => 'PostalAddress',
                'addressLocality' => $setting->company_address,
                'addressCountry' => 'BD',
            ] : null,
            'contactPoint' => ($setting?->email || $setting?->phone_one) ? array_filter([
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'telephone' => $setting?->phone_one,
                'email' => $setting?->email,
                'availableLanguage' => ['en', 'bn'],
            ]) : null,
            'sameAs' => $sameAs ?: null,
        ]);

        $aboutPageSchema = [
            '@type' => 'AboutPage',
            '@id' => route('page.about') . '/#webpage',
            'url' => route('page.about'),
            'name' => 'About ' . $siteName,
            'description' => 'Learn about ' . $siteName . ' — our mission, team, marketplace expertise, and commitment to trustworthy e-commerce in Bangladesh.',
            'isPartOf' => ['@id' => url('/') . '/#organization'],
            'about' => ['@id' => url('/') . '/#organization'],
        ];

        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [$organizationSchema, $aboutPageSchema],
        ];

        return view('frontend.pages.about_us', compact('setting', 'siteName', 'structuredData'));
    }

    public function deliveryInformation()
    {
        $setting = SiteSetting::find(1);
        $siteName = $setting?->site_name ?? 'Olys Bazar';

        $faqEntries = [
            [
                '@type' => 'Question',
                'name' => 'How do I track my order?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Go to the Track Order page and enter your invoice number from the confirmation email or SMS.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'Can I change my delivery address after ordering?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Contact support within 2 hours of placing your order. Once dispatched, address changes may not be possible.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'What if I am not home when delivery arrives?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'The courier will attempt delivery up to two times and may leave the package with a trusted neighbour or reschedule.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'Do you deliver on weekends and public holidays?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Standard deliveries operate Saturday through Thursday. Fridays and national holidays may add one business day.',
                ],
            ],
        ];

        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => route('page.delivery') . '/#webpage',
                    'url' => route('page.delivery'),
                    'name' => 'Delivery Information — ' . $siteName,
                    'description' => 'Shipping coverage, delivery charges, order processing steps, and tracking for ' . $siteName . ' across Bangladesh.',
                    'isPartOf' => ['@id' => url('/') . '/#organization'],
                ],
                [
                    '@type' => 'FAQPage',
                    'mainEntity' => $faqEntries,
                ],
            ],
        ];

        return view('frontend.pages.delivery_information', compact('setting', 'siteName', 'structuredData'));
    }

    public function privacyPolicy()
    {
        $setting = SiteSetting::find(1);
        $siteName = $setting?->site_name ?? 'Olys Bazar';

        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => route('page.privacy') . '/#webpage',
                    'url' => route('page.privacy'),
                    'name' => 'Privacy Policy — ' . $siteName,
                    'description' => 'How ' . $siteName . ' collects, uses, and protects your personal information.',
                    'dateModified' => '2026-06-01',
                    'isPartOf' => ['@id' => url('/') . '/#organization'],
                ],
            ],
        ];

        return view('frontend.pages.privacy_policy', compact('setting', 'siteName', 'structuredData'));
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
        $setting = SiteSetting::find(1);
        $siteName = $setting?->site_name ?? 'Olys Bazar';

        $faqEntries = [
            [
                '@type' => 'Question',
                'name' => 'How long does support take to respond?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'We aim to respond to all tickets within 24 hours. Urgent delivery issues are prioritized.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'Can I cancel my order after placing it?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Orders can be cancelled within 2 hours if the vendor has not started processing.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'How do I report a damaged product?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Take photos and submit a support ticket within 24 hours of delivery with your invoice number.',
                ],
            ],
        ];

        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => route('page.support') . '/#webpage',
                    'url' => route('page.support'),
                    'name' => 'Support Center — ' . $siteName,
                    'description' => 'Get help with orders, returns, payments, and account issues at ' . $siteName . '.',
                    'isPartOf' => ['@id' => url('/') . '/#organization'],
                ],
                [
                    '@type' => 'FAQPage',
                    'mainEntity' => $faqEntries,
                ],
            ],
        ];

        return view('frontend.pages.support_center', compact('setting', 'siteName', 'structuredData'));
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
        $setting = SiteSetting::find(1);
        $siteName = $setting?->site_name ?? 'Olys Bazar';

        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => route('public.track.order') . '/#webpage',
                    'url' => route('public.track.order'),
                    'name' => 'Track My Order — ' . $siteName,
                    'description' => 'Track your ' . $siteName . ' order status using your invoice number.',
                    'isPartOf' => ['@id' => url('/') . '/#organization'],
                ],
            ],
        ];

        return view('frontend.pages.track_order', compact('setting', 'siteName', 'structuredData'));
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
