<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function login(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required', 
                    'password' => 'required'
                ]
            );
    
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email or phone number and password required',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $identifier = $request->input('email');
            $credentials = ['password' => $request->input('password')];
    
            if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
                $credentials['email'] = $identifier;
            } else {
                $credentials['phone'] = $identifier;
            }
    
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email or phone number or password does not match our records.',
                ], 401);
            }
    
            $user = User::where('email', $identifier)->orWhere('phone', $identifier)->first();
    
            return response()->json([
                'status' => true,
                'message' => 'User Successfully Logged In',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'id' => $user->id,
                ],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

public function register(Request $request)
{
    try {
        $validateUser = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateUser->errors(),
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Log in the user immediately after registration

        return response()->json([
            'status' => true,
            'message' => 'User successfully registered and logged in',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
            ],
            'token' => $user->createToken("API_TOKEN")->plainTextToken,
        ], 201);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}




    function logout()
    {
        function logout()
        {
            dd(Auth::check());
            if (Auth::check()) {
                Auth::user()->token()->where('id', Auth::id())->delete();
            }

            return response()->json([
                'status' => true,
                'message' => 'User Logout Successfully',
            ], 200);
        }
    }
}
