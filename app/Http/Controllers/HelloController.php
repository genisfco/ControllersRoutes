<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return view('hello');
    }

    public function submit(Request $request)
    {
        $name = $request->input('nome');
        return view('hello-message', ['name' => $name]);
    }
}


