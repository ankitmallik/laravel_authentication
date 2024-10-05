<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showData() {}

    public function registerSave(Request $request)
    {

        // $data = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed',

        // ]);
        $user = $request->all();
        User::create($user);
        return redirect()->route('login');
    }

    public function loginSave(Request $request)
    {
        // Retrieve email and password from the request
        $credentials = $request->only('email', 'password');

        // Check if the credentials are valid
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the dashboard
            return redirect()->route('dashboard.page');
        } else {
            return redirect()->route('login');
        }
    }

    public function dashboardPage()
    {
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function innerPage()
    {
        if (Auth::check()) {
            return view('inner');
        } else {
            return redirect()->route('login');
        }
    }




    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
