<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; 

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Show the login form view
    }


    public function login(Request $request)
    {
        // Validation rules for email and password
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
    
        // Custom error messages if validation fails
        $messages = [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // If validation fails, redirect back to the login form with errors
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }
    
        $credentials = $request->only('email', 'password');
    
        // Attempt to authenticate the user using email and password
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            // Retrieve the authenticated user
            $user = Auth::user();
    
            // Redirect users based on their user_type
            if ($user->user_type === 'a') {
                return redirect()->route('adminindex');
            } elseif ($user->user_type === 'd') {
                // Redirect to doctor dashboard based on the doctor's email
                return redirect()->route('doctorindex', ['email' => $user->email]);
            } elseif ($user->user_type === 'p') {
                return redirect()->route('patientindex', ['email' => $user->email]);
            }
        }
    
        // Authentication failed; redirect back to login with an error message
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }
    

    
}
