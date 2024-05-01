<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function dashboard(Request $request) {
        return view('dashboard');
    }

    public function customers(Request $request) {
        return view('customers');
    }
}
