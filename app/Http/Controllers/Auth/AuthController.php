<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $user->api_token = Str::random(60);
            $user->save();

            return response()->json(['token' => $user->api_token]);
        } else if (\request()->has('name')
            && !User::where('email', $request->email)->exists()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->api_token = Str::random(60);
            $user->save();

            return response()->json(['token' => $user->api_token]);

        }
        return response()->json(['error' => 'Unauthorized'], 401);

    }
}
