<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;

class WelcomeMessageController extends Controller
{
    function editWelcome(){
        $welcome = WelcomeMessage::first();
        return view('admin.settings.welcome-message', compact('welcome'));
    }

    function welcomeSave(Request $request){
        $welcomeID = $request->id;
        
        $oldSign = $request->oldSign;
        $oldImgOne = $request->oldImgOne;
        $oldImgTwo = $request->oldImgTwo;

        $welcome = WelcomeMessage::findOrFail($welcomeID);

        $welcome->welcome_sub_title=$request->welcome_sub_title;
        $welcome->welcome_title=$request->welcome_title;
        $welcome->welcome_message=$request->welcome_message;
        $welcome->user_name=$request->user_name;
        $welcome->user_designation=$request->user_designation;

        if ( $request->hasFile( 'sign' ) ) {
            $sign = $request->file( 'sign' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $sign->getClientOriginalExtension();
            
            $sign->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveSign = 'front-asset/assets/images/'.$fileNameToStore;
            
            if($oldSign){
                $imagePath = public_path($oldSign);
                if(file_exists($imagePath)){
                    unlink($oldSign);
                }
            }
            $welcome->sign=$saveSign;
        }else {
            $welcome->sign=$oldSign;
        }

        if ( $request->hasFile( 'welcome_image_one' ) ) {
            $welcome_image_one = $request->file( 'welcome_image_one' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $welcome_image_one->getClientOriginalExtension();
            
            $welcome_image_one->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $WelcomeImgOne = 'front-asset/assets/images/'.$fileNameToStore;
            
            if($oldImgOne){
                $welcomeOne = public_path($oldImgOne);
                if(file_exists($welcomeOne)){
                    unlink($oldImgOne);
                }
            }
            $welcome->welcome_image_one=$WelcomeImgOne;
        }else {
            $welcome->welcome_image_one=$oldImgOne;
        }

        if ( $request->hasFile( 'welcome_image_two' ) ) {
            $welcome_image_two = $request->file( 'welcome_image_two' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $welcome_image_two->getClientOriginalExtension();
            
            $welcome_image_two->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $WelcomeImgTwo = 'front-asset/assets/images/'.$fileNameToStore;
            
            if($oldImgTwo){
                $imagePath = public_path($oldImgTwo);
                if(file_exists($imagePath)){
                    unlink($oldImgTwo);
                }
            }
            $welcome->welcome_image_two=$WelcomeImgTwo;
        }else {
            $welcome->welcome_image_two=$oldImgTwo;
        }
        

        $welcome->save();

        $notification = array(
            'message' => 'Welcome Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

}
