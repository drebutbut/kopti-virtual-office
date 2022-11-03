<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BisnisController extends Controller
{
    public function index() {
        return view('bisnis');
    }
}
