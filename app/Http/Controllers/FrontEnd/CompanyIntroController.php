<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CompanyIntro;
use Illuminate\Http\Request;

class CompanyIntroController extends Controller
{
    function CompanyIntro(){
        $intro = CompanyIntro::first();
        return view('admin.settings.intro', compact('intro'));
    }

    function IntroSave(Request $request){
        $introID = $request->id;
        
        $oldImg = $request->oldImg;
        if ( $request->hasFile( 'about_img' ) ) {
            $image = $request->file( 'about_img' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveImg = 'front-asset/assets/images/'.$fileNameToStore;
            
            if($oldImg){
                $imagePath = public_path($oldImg);
                if(file_exists($imagePath)){
                    unlink($oldImg );
                }
            }
            $intro = CompanyIntro::findOrFail($introID);
            $intro->widget_title=$request->widget_title;
            $intro->about_title=$request->about_title;
            $intro->about_desc=$request->about_desc;
            $intro->about_img=$saveImg;
            $intro->save();

            $notification = array(
                'message' => 'Company Intro Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $intro = CompanyIntro::findOrFail($introID);
            $intro->widget_title=$request->widget_title;
            $intro->about_title=$request->about_title;
            $intro->about_desc=$request->about_desc;
            $intro->about_img=$oldImg;
            $intro->save();

            $notification = array(
                'message' => 'Company Intro Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
        

    }

}
