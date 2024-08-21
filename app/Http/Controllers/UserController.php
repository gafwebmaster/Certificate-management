<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function generateTocken(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credentials = request(['email','password']);

        if(!auth()->attempt($credentials)){
            return response()->json([
                    'message'=> 'The given data was invalid',
                    'errors'=>[
                        "Invalid credentials"
                    ]
                ],422);
        
        }
     
        $user = User::where('email', $request->email)->first();

     $authToken = $user->createToken('auth-token', ['check-status:oValoare'])->plainTextToken;
     return response()->json([
        'access_token'=> $authToken
     ]);

    }

    public function makeLogout(Request $request){
        $result = $request->user()->currentAccessToken()->delete();
        if($result){
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"Error"];
        }
    }
}
