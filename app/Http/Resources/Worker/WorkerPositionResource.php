<?php

namespace App\Http\Resources\Worker;

use App\Models\Position;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Position
 */
class WorkerPositionResource extends JsonResource
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
            'name' => $this->title
        ];
    }
}
