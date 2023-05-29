<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\DTO\RegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\RegisterResource;
use App\Services\Interfaces\UserServiceInterface;

class AuthController extends Controller
{
    public function __construct(
        public UserServiceInterface $userService,
    )
    {
    }

    /**
     * Регистрирует пользователя и авторизует его
     *
     * @param RegisterRequest $request
     * @return RegisterResource
     */
    public function register(RegisterRequest $request): RegisterResource
    {
        $data = RegisterData::create(
            $request->validated()
        );

        $user = $this->userService->store($data);

        return new RegisterResource($user);
    }
}
