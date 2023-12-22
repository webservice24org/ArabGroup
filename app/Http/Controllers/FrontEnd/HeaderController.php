<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    function header(){
        $header = Header::first();
        return view('admin.settings.header', compact('header'));
    }

    function EditHeader(Request $request){
        $headID = $request->id;
        
        $headerLogo = $request->oldLogo;
        if ( $request->hasFile( 'header_logo' ) ) {
            $image = $request->file( 'header_logo' );
            
            $fileNameToStore = md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('backend-asset/img'), $fileNameToStore);
            $saveImg = 'backend-asset/img/'.$fileNameToStore;
            
            if($headerLogo){
                $imagePath = public_path($headerLogo);
                if(file_exists($imagePath)){
                    unlink($headerLogo );
                }
            }
            $header = Header::findOrFail($headID);
            $header->header_logo=$saveImg;
            $header->mobile=$request->mobile;
            $header->save();

            $notification = array(
                'message' => 'Footer Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $header = Header::findOrFail($headID);
            $header->header_logo=$headerLogo;
            $header->mobile=$request->mobile;
            $header->save();

            $notification = array(
                'message' => 'Footer Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
        

    }
    
}
