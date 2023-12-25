<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function allSliders(){
        $allSliders = Slider::all();
        return view('admin.sliders.sliders', compact('allSliders'));
    }

    function editSlider($id){
        $editSlider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('editSlider'));
    }

    function sliderSave(Request $request){
        $SliderID = $request->id;
        
        $slider_old_img = $request->slider_old_img;

        $slider = Slider::findOrFail($SliderID);

        $slider->slider_title=$request->slider_title;
        $slider->slider_desc=$request->slider_desc;
        $slider->btn_title=$request->btn_title;
        $slider->btn_link=$request->btn_link;
        $slider->model_id=$request->model_id;
        if ( $request->hasFile( 'slider_img' ) ) {
            $image = $request->file( 'slider_img' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveImg = 'front-asset/assets/images/'.$fileNameToStore;
            
            if($slider_old_img){
                $imagePath = public_path($slider_old_img);
                if(file_exists($imagePath)){
                    unlink($slider_old_img );
                }
            }
            $slider->slider_img=$saveImg;
        }else {
            $slider->slider_img=$slider_old_img;
        }
        
        $slider->save();

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
