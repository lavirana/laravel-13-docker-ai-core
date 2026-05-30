<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaDemoController extends Controller
{
    public function index(){
        return view("media-demo");
    }
}
