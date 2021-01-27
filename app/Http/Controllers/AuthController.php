<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login
    public function login(Request $request) {

        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5'
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all(),
                'status' => 422
            ]);
        }

        // Check if user exists in db
        $user = User::where('email', $request->email)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)) {
                $token = $user->createToken($user->email)->plainTextToken;
                return response()->json(['access_token' => $token])->setStatusCode(201);
            } else {
                // $this->incrementLoginAttempts($request);
                return response()->json(['message' => 'Invalid password'])->setStatusCode(401);
            }
        } else {
            // $this->incrementLoginAttempts($request);
            return response()->json(['message' => 'Invalid credentials'])->setStatusCode(401);
        }
    }

    // Logout
    // public function logout(Request $request) {
    //     // Revoke user's token
    //     $request->user()->currentAccessToken()->delete();
    //     return response()->json([
    //         'message' => 'Logout successful.'
    //     ])->setStatusCode(200);
    // }
}
