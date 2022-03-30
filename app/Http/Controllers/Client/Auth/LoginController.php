<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Resources\Client\Auth\LoginResource;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function index(LoginRequest $request): LoginResource
    {
        /*
         * Login attempt
         * */
        if (!Auth::guard('client')->attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
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
        return new LoginResource($client);
    }
}
