<?php

namespace App\Http\Resources\Client\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'                => $this->id,
            'firstname'         => $this->firstname,
            'lastname'          => $this->lastname,
            'email'             => $this->email,
            'token'             => $this->createToken($this->email)->plainTextToken,
            /*'tokens'            => TokenResource::collection($this->tokens()->get()),*/
            'email_verified_at' => $this->email_verified_at,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
