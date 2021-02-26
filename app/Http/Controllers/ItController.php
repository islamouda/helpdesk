<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItController extends Controller
{
    public function it_show(){
        return view('itusers.it');
    }
}
