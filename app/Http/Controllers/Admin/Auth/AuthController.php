<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Resources\Admin\Auth\LoginResource;
use App\Models\Admin;
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
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }


        /*
         * Fetch admin
         * */
        $admin = Admin::where('email', $request->input('email'))->first();


        /*
         * Delete old tokens
         * */
        $admin->tokens()->delete();


        /*
         * JSON response
         * */
        return LoginResource::make($admin);
    }


    public function logout(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
