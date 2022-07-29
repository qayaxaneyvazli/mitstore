<?php

namespace App\Http\Controllers;
use App\Models\Ydm;
use Illuminate\Http\Request;

class YdmController extends Controller
{
    //

    public function getYdms(){



            $ydms=Ydm::all();


            return view('dashboard',compact('ydms'));


    }
}
