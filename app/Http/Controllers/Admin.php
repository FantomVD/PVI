<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function about(Request $request){
        $name = $request->only('name');
        return view('admin.about', $name??'default');
    }
}
