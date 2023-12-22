<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\AddressCard;
use Illuminate\Http\Request;

class AddressCardController extends Controller
{
    function ContactDetails(){
        $contact = AddressCard::first();
        return view('admin.settings.contacts', compact('contact'));
    }

    function ContactSave(Request $request){
        $cID = $request->id;
        $contact = AddressCard::findOrFail($cID);
        $contact->widget_title=$request->widget_title;
        $contact->office_phone=$request->office_phone;
        $contact->email=$request->email;
        $contact->address=$request->address;
        $contact->save();
        
        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
