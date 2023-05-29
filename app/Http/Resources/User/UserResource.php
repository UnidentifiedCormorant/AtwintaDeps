<?php

namespace App\Http\Resources\User;

use App\Domain\Entity\RegisterEntity;
use App\Domain\Enum\Type;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
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
            'id' => $this->id,
            'login' => $this->created_at,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'about' => $this->about,
            'type' => Type::from($this->type)->value,
            'github' => $this->github,
            'city' => $this->city,
            'is_finished' => false, //TODO: разобраться с этой фигнёй
            'phone' => $this->phone,
            'birthday' => $this->birthday
        ];
    }
}
