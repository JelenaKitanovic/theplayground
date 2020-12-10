<?php

namespace App\Http\Controllers;

use App\Models\Strength;

class StrengthController extends Controller
{
    public function index(){
        $strengths = Strength::all();
        return view("strengths\index", ["strengths" => $strengths]);
    }
}
