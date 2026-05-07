<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function form_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'status' => 1
        ]);

        return back()->with('success', 'User created successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }

    function user_list(){
        $users = User::latest()->get();
        return view('panel.pages.user_list', compact('users'));
    }
}
