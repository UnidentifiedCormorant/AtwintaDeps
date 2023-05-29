<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\DTO\FindWorkerData;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\FindWorkerRequest;
use App\Http\Resources\User\UserCardResource;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        public UserServiceInterface $userService
    )
    {
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function Workers(FindWorkerRequest $request)
    {
        $data = FindWorkerData::create(
            $request->validated()
        );

        return UserCardResource::collection($this->userService->getFilteredUsers());
    }
}
