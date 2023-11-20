<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.index'); // Update this line if needed
    }

    public function login(Request $request)
{
    // Validate the request data
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Attempt to authenticate the user
    $credentials = $request->only('username', 'password');

    $user = User::where('username', $credentials['username'])->first();

    dd($user); // Add this line to dump and die the user data

    if (Auth::attempt($credentials)) {
        // Authentication passed
        return redirect()->route('admin.products');
    }

    // Authentication failed
    return redirect()->route('admin.login')->with('status', 'failed');
}
}
