<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
        
        
        return view('live-test');
    }
}
