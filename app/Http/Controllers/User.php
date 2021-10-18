<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function about(Request $request){
        $name = $request->only('name');
        return view('user.about', $name??'default');
    }
}
