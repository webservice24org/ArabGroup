<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\InfoCounter;
use Illuminate\Http\Request;

class InfoCounterController extends Controller
{
    function infoCounters(){
        $infoCounter = InfoCounter::take(3)->get();
        return view('admin.sister-concerns.info-counter', compact('infoCounter'));
    }

    function infoCounterEdit($id){
        $infoCounter = InfoCounter::findOrFail($id);
        return view('admin.sister-concerns.info-counter-edit', compact('infoCounter'));
    }
}
