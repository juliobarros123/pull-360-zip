<?php

namespace App\Http\Controllers\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($slug){
        dd("ol");
        return view('timeline.index');

    }
}
