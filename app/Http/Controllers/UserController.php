<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function user_login(){
        return view('users.login');
    }

    public function user_register(){
        return view('users.register');
    }

    public function store(Request $request)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    
    $user = new User(); // Create a new User instance
    
    $user->name = $name; // Assign values to the User properties
    $user->email = $email;
    $user->password = Hash::make($password); // Hash the password before storing
    
    $user->save(); // Save the user instance to the database
    
    // You can optionally return a response or redirect here


       return redirect('user/login')->with('message','login Successfully');
    }
}