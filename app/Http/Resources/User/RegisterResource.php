<?php

namespace App\Http\Resources\User;

use App\Domain\Entity\RegisterEntity;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin RegisterEntity
 */
class RegisterResource extends JsonResource
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
            'token' => $this->token
            //TODO: Добавить ресурс для пользователя
        ];
    }
}
