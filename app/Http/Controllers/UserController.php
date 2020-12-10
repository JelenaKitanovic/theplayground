<?php

namespace App\Http\Controllers;

use App\Models\Strength;

class UserController extends Controller
{
    public function index(){}

    public function view(int $id) {

        $strengths = Strength::all();
        var_dump($strengths);
        die;

        return view("users\details", ["id" => $id]);
    }
}
