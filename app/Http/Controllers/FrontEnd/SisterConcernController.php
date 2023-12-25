<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\ConcernHeader;
use App\Models\SisterConcern;
use Illuminate\Http\Request;

class SisterConcernController extends Controller
{

    function ConcernHeader(){
        $secHeader = ConcernHeader::first();
        return view('admin.sister-concerns.section-header', compact('secHeader'));
    }
    function ConcernHeaderSave(Request $request){
        $secHeader = ConcernHeader::findOrFail($request->id);
        $secHeader->sub_header=$request->sub_header;
        $secHeader->sec_header=$request->sec_header;
        if ( $request->hasFile( 'sec_icon' ) ) {
            $image = $request->file( 'sec_icon' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveImg = 'front-asset/assets/images/'.$fileNameToStore;
            
            $secHeader->sec_icon=$saveImg;
        }else {
            $secHeader->sec_icon='front-asset/assets/images/heading-icon.png';
        }
        $secHeader->save();
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }
    function allConcerns() {
        $allConcerns = SisterConcern::all();
        return view('admin.sister-concerns.concerns', compact('allConcerns'));
    }

    function addConcern(){
        return view('admin.sister-concerns.create');
    }

    function saveConcern(Request $request){
        $request->validate(
            [
            'company_title' => 'required',
            'company_desc' => 'required|max:250',
            'company_link' => 'required',
            'company_icon_one' => 'required',
            'company_icon_two' => 'required'
        ],
        [
            'company_title.required' => 'Please Write a Company Name or Title',
            'company_desc.required' => 'Add Description within 255 Charecter!',
            'company_desc.max' => 'The Company Description must not be greater than 255 characters',
            'company_link.required' => 'Add Company Link',
            'company_icon_one.required' => 'Please Add an Icon',
            'company_icon_two.required' => 'Please Add Another Icon'
        ]
    );
        $concern = new SisterConcern;
        $concern->company_title=$request->company_title;
        $concern->company_desc=$request->company_desc;
        $concern->company_link=$request->company_link;
        if ( $request->hasFile( 'company_icon_one' ) ) {
            $image = $request->file( 'company_icon_one' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveImg = 'front-asset/assets/images/'.$fileNameToStore;
            
            $concern->company_icon_one=$saveImg;
        }else {
            $concern->company_icon_one='front-asset/assets/images/default-company-icon.png';
        }

        if ( $request->hasFile( 'company_icon_two' ) ) {
            $image = $request->file( 'company_icon_two' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveImg = 'front-asset/assets/images/'.$fileNameToStore;
            
            $concern->company_icon_two=$saveImg;
        }else {
            $concern->company_icon_two='front-asset/assets/images/default-company-icon.png';
        }

        $concern->save();

        $notification = array(
            'message' => 'Company Added Successfully',
            'alert-type' => 'success'
        );
        if ($concern->save()) {
            
            return redirect()->route('all.concerns')->with($notification);
        }else{

            return redirect()->back()->withInput()->withErrors(['message' => 'Validation failed.']);
        }
    }

    function editConcern($id){
        $editConcern = SisterConcern::findOrFail($id);
        return view('admin.sister-concerns.edit', compact('editConcern'));
    }

    function updateConcern(Request $request){
        $request->validate(
            [
                'company_desc' => 'required|max:250',
            ],
            [
                'company_desc.required' => 'The Company Description is Required!',
                'company_desc.max' => 'The Company Description must not be greater than 255 characters'
            ]
        );

        $oldIconOne = $request->oldIconOne;
        $oldIconTwo = $request->oldIconTwo;
        $concernID = $request->id;
        $concern = SisterConcern::findOrfail($concernID);
        $concern->company_title=$request->company_title;
        $concern->company_desc=$request->company_desc;
        $concern->company_link=$request->company_link;
        if ( $request->hasFile( 'company_icon_one' ) ) {
            $image = $request->file( 'company_icon_one' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveImg = 'front-asset/assets/images/'.$fileNameToStore;
            if($oldIconOne){
                $imagePath = public_path($oldIconOne);
                if(file_exists($imagePath)){
                    unlink($oldIconOne);
                }
            }
            $concern->company_icon_one=$saveImg;
        }else {
            
            $concern->company_icon_one=$oldIconOne;
        }

        if ( $request->hasFile( 'company_icon_two' ) ) {
            $image = $request->file( 'company_icon_two' );
            
            $fileNameToStore = 'arab_group'.'_'.md5(uniqid()) . "-". time(). '.'. $image->getClientOriginalExtension();
            
            $image->move(public_path('front-asset/assets/images'), $fileNameToStore);
            $saveImg = 'front-asset/assets/images/'.$fileNameToStore;
            
            if($oldIconTwo){
                $imagePath = public_path($oldIconTwo);
                if(file_exists($imagePath)){
                    unlink($oldIconTwo );
                }
            }
            
            $concern->company_icon_two=$saveImg;
        }else {
            
            $concern->company_icon_two=$oldIconTwo;
        }

        $concern->save();

        $notification = array(
            'message' => 'Company Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    function trashConcern($id){
        SisterConcern::find($id)->delete();

        $notification = array(
            'message' => 'Trashed Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    function trashedConcerns(){
        $trashed = SisterConcern::onlyTrashed()->get();
        return view('admin.sister-concerns.trashed', compact('trashed'));
    }

    function restoreConcern($id){
        SisterConcern::withTrashed()
        ->where('id', $id)
        ->restore();
        $notification = array(
            'message' => 'Re-stored Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.concerns')->with($notification);
    }

    function delete($id){
        
        $delete = SisterConcern::withTrashed()->find($id);
        $iconOne=$delete->company_icon_one;
        $iconTwo=$delete->company_icon_two;
        if($iconOne){
            $imagePath = public_path($iconOne);
            if(file_exists($imagePath)){
                unlink($iconOne );
            }
        }
        if($iconTwo){
            $imagePath = public_path($iconTwo);
            if(file_exists($imagePath)){
                unlink($iconTwo );
            }
        }
        $delete->forceDelete();
        $notification = array(
            'message' => 'Permanently Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    function status($id){
        $concern = SisterConcern::findOrFail($id);
        
        if ($concern) {
            if ($concern->status) {
                $concern->status = 0;
            }else {
                $concern->status = 1;
            }
            $concern->save();
        }
        return back();
    }

}
