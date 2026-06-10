<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Validation\ValidationException;
use Image;
 
class SliderController extends Controller
{
      public function AllSlider(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_all',compact('sliders'));
    } // End Method 

    public function AddSlider(){
            return view('backend.slider.slider_add');
    }// End Method 


    private function saveSliderImage($image): string
    {
        if (!$image || !$image->isValid()) {
            throw ValidationException::withMessages([
                'slider_image' => 'Please upload a valid image file.',
            ]);
        }

        $path = $image->getRealPath();
        if (!$path || !is_file($path)) {
            throw ValidationException::withMessages([
                'slider_image' => 'Uploaded file could not be read. Use JPG, PNG, GIF, BMP, or WebP.',
            ]);
        }

        $sliderDir = public_path('upload/slider');
        if (!is_dir($sliderDir)) {
            mkdir($sliderDir, 0755, true);
        }

        $extension = strtolower($image->extension() ?: $image->getClientOriginalExtension() ?: 'jpg');
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'], true)) {
            $extension = 'jpg';
        }

        $name_gen = hexdec(uniqid()).'.'.$extension;
        Image::make($path)->resize(2376, 807)->save($sliderDir.'/'.$name_gen);

        return 'upload/slider/'.$name_gen;
    }

    public function StoreSlider(Request $request){

        $request->validate([
            'slider_title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,bmp,webp|max:5120',
        ]);

        $save_url = $this->saveSliderImage($request->file('slider_image'));

        Slider::insert([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification); 

    }// End Method 


    public function EditSlider($id){
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('sliders'));
    }// End Method 


 public function UpdateSlider(Request $request){

        $request->validate([
            'slider_title' => 'required|string|max:255',
            'short_title' => 'required|string|max:255',
            'slider_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,webp|max:5120',
        ]);

        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_image')) {

        $save_url = $this->saveSliderImage($request->file('slider_image'));

        if ($old_img && file_exists(public_path($old_img))) {
           unlink(public_path($old_img));
        }

        Slider::findOrFail($slider_id)->update([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Slider Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification); 

        } else {

             Slider::findOrFail($slider_id)->update([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title, 
        ]);

       $notification = array(
            'message' => 'Slider Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification); 

        } // end else

    }// End Method 



    public function DeleteSlider($id){

        $slider = Slider::findOrFail($id);
        $img = $slider->slider_image;
        if ($img && file_exists(public_path($img))) {
            unlink(public_path($img));
        } 

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 
 




} 
