<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Create user
    public function create(Request $request) {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5'
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()])->setStatusCode(400);
        }
        // Check if email already exist
        $user = User::where('email', $request->email)->first();
        if($user) {
            return response()->json(['message' => 'Email already taken'])->setStatusCode(400);
        } else {
            $user = new User;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['message' => 'User succesfully registered'])->setStatusCode(201);
        }

    }
}
