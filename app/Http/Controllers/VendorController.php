<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VendorRegNotification;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Notification;

 
class VendorController extends Controller
{
    public function VendorDashboard()
    {
        $vendorId = Auth::id();

        $totalOrders = OrderItem::where('vendor_id', (string) $vendorId)->count();
        $totalRevenue = OrderItem::where('vendor_id', (string) $vendorId)
            ->get()
            ->sum(fn ($item) => (float) $item->price * (int) $item->qty);
        $totalProducts = Product::where('vendor_id', $vendorId)->count();
        $activeProducts = Product::where('vendor_id', $vendorId)->where('status', 1)->count();
        $recentOrders = OrderItem::with(['order.user', 'product'])
            ->where('vendor_id', (string) $vendorId)
            ->latest()
            ->limit(8)
            ->get();

        return view('vendor.index', compact(
            'totalOrders',
            'totalRevenue',
            'totalProducts',
            'activeProducts',
            'recentOrders'
        ));
    } // End Mehtod 

  public function VendorLogin(){
        return view('vendor.vendor_login');
    } // End Mehtod 



public function VendorDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    } // End Mehtod 



public function VendorProfile(){

        $id = Auth::user()->id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile_view',compact('vendorData'));

    } // End Mehtod 


     public function VendorProfileStore(Request $request){

        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:500',
            'vendor_join' => 'nullable|string|max:10',
            'vendor_short_info' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_join = $request->vendor_join;
        $data->vendor_short_info = $request->vendor_short_info;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            if ($data->photo && file_exists(public_path('upload/vendor_images/'.$data->photo))) {
                @unlink(public_path('upload/vendor_images/'.$data->photo));
            }
            if (!is_dir(public_path('upload/vendor_images'))) {
                mkdir(public_path('upload/vendor_images'), 0755, true);
            }
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Vendor Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Mehtod 



  public function VendorChangePassword(){
        return view('vendor.vendor_change_password');
    } // End Mehtod 



public function VendorUpdatePassword(Request $request){
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mehtod 



    public function BecomeVendor(){
        $setting = SiteSetting::find(1);
        $siteName = $setting?->site_name ?? 'Olys Bazar';

        $faqEntries = [
            [
                '@type' => 'Question',
                'name' => 'How long does vendor approval take?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Most vendor applications are reviewed within 1 to 3 business days.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'Do I need a trade license to sell on the marketplace?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Individual sellers can start with NID verification. Registered businesses should provide a trade license.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'Who handles delivery for vendor orders?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Vendors pack orders and hand them to marketplace courier partners for nationwide delivery.',
                ],
            ],
        ];

        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => route('become.vendor') . '/#webpage',
                    'url' => route('become.vendor'),
                    'name' => 'Become a Vendor — ' . $siteName,
                    'description' => 'Apply to sell on ' . $siteName . '. Requirements, fees, onboarding steps, and vendor registration for Bangladesh sellers.',
                    'isPartOf' => ['@id' => url('/') . '/#organization'],
                ],
                [
                    '@type' => 'FAQPage',
                    'mainEntity' => $faqEntries,
                ],
            ],
        ];

        return view('auth.become_vendor', compact('setting', 'siteName', 'structuredData'));
    } // End Mehtod 


      public function VendorRegister(Request $request) {
       
        $vuser = User::where('role','admin')->get();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'vendor_short_info' => ['nullable', 'string', 'max:1000'],
            'vendor_join' => ['nullable', 'string', 'max:10'],
            'password' => ['required', 'confirmed', 'min:8'],
            'terms' => ['accepted'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'vendor_short_info' => $request->vendor_short_info,
            'vendor_join' => $request->vendor_join ?: (string) date('Y'),
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

          $notification = array(
            'message' => 'Vendor Registered Successfully. Your account is pending admin approval.',
            'alert-type' => 'success'
        );

       Notification::send($vuser, new VendorRegNotification($request));
        return redirect()->route('vendor.dashobard')->with($notification);
       
    }// End Mehtod 




}
 