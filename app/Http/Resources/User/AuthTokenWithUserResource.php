<?php

namespace App\Http\Resources\User;

use App\Domain\Entity\EnterEntity;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin EnterEntity
 */
class AuthTokenWithUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'token' => $this->token,
            'user' => new UserResource($this->user),
            'password' => $this->user->password
        ];
    }
}
