<?php

namespace App\Http\Resources\Guest\Auth;

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
            'email_verified_at' => $this->email_verified_at,

            'created_at'           => $this->created_at,
            'created_at_human'     => $this->created_at_human,
            'created_at_formatted' => $this->created_at_formatted,

            'updated_at'           => $this->updated_at,
            'updated_at_human'     => $this->updated_at_human,
            'updated_at_formatted' => $this->updated_at_formatted,
        ];
    }
}
