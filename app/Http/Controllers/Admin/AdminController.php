<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        // $data = "Hello"; 
        // return view('panel.pages.dashboard', compact('data'));

        return view('panel.pages.dashboard');
    }

    function form(){
        return view('panel.pages.form');
    }

    function form_store(Request $abc){
        print_r($abc->all());
        // $validated = $request->validate([
        //     'name' => 'required|string|max:100',
        //     'email' => 'required|email',
        // ]);

        // return back()->with('success', 'Form submitted successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }
}
