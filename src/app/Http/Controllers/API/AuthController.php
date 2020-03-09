<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AuthController extends Controller
{
    public function register(Request $request)
    {
         $RegisterData = $request->validate([
             'name'=>'required|max:55',
             'email'=>'email|required|unique:users',
             'password'=>'required|confirmed'
         ]);
 
         $RegisterData['password'] = bcrypt($request->password);
 
         $user = User::create($RegisterData);
 
         $accessToken = $user->createToken('authToken')->accessToken;
 
         return response(['user'=> $user, 'access_token'=> $accessToken]);
        
    }
 
 
    public function login(Request $request)
    {
         $loginData = $request->validate([
             'email' => 'email|required',
             'password' => 'required'
         ]);
        
         if(!auth()->attempt($loginData)) {
             return response(['message'=>'Invalid credentials']);
         }
 
         $accessToken = auth()->user()->createToken('authToken')->accessToken;
 
         return response(['user' => auth()->user(), 'access_token' => $accessToken]);
 
    }
}
