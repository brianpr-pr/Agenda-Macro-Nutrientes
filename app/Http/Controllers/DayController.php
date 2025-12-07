<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;

class DayController extends Controller
{

    public function calendar(){
        
        return view('calendar');
    }
}
