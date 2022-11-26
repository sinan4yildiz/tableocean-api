<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Auth\LoginRequest;
use App\Http\Resources\Client\Auth\LoginResource;
use App\Models\Client;
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
        if (!Auth::guard('client')->attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => [
                    __('auth.failed')
                ],
            ]);
        }


        /*
         * Fetch client
         * */
        $client = Client::where('email', $request->input('email'))->first();


        /*
         * Delete old tokens
         * */
        $client->tokens()->delete();


        /*
         * JSON response
         * */
        return LoginResource::make($client);
    }


    public function logout(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
