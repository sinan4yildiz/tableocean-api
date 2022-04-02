<?php

namespace App\Http\Controllers\Guest\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\Auth\LoginRequest;
use App\Http\Resources\Guest\Auth\LoginResource;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): LoginResource
    {
        /*
         * Login attempt
         * */
        if (!Auth::guard('guest')->attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }


        /*
         * Fetch guest
         * */
        $guest = Guest::where('email', $request->input('email'))->first();


        /*
         * Delete old tokens
         * */
        $guest->tokens()->delete();


        /*
         * JSON response
         * */
        return LoginResource::make($guest);
    }


    public function logout(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
