<?php

namespace App\Http\Controllers;

use App\Models\Webuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Show the login form view
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    
     
    //         // Retrieve the authenticated user using the Webuser model
    //         $user = Webuser::where('email', $credentials['email'])->first();
           
    //         // Check if the user exists and has the correct user_type
    //         if ($user) {
    //             if ($user->user_type === 'a') {
    //                 return redirect()->route('adminindex');
    //             } elseif ($user->user_type === 'd') {
    //                 // Redirect to doctor dashboard based on the doctor's email
    //                 return redirect()->route('doctorindex', ['email' => $user->email]);
    //             } elseif ($user->user_type === 'p') {
    //                 return redirect()->route('patientindex',['email' => $user->email]);
    //             }
    //         }
            
           
    //         return redirect()->route('login');
        
    
      
    // }




    public function login(Request $request)
{
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
    return redirect()->route('login')->with('error', 'Invalid credentials.');
}

    
}
