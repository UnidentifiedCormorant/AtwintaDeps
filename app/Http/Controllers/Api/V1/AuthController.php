<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\DTO\AuthData;
use App\Domain\DTO\RegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\AuthTokenWithUserResource;
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
     * @return AuthTokenWithUserResource
     */
    public function register(RegisterRequest $request): AuthTokenWithUserResource
    {
        $data = RegisterData::create(
            $request->validated()
        );

        $user = $this->userService->store($data);

        return new AuthTokenWithUserResource($user);
    }

    /**
     * Авторизует пользователя
     * TODO: Сделать проверку на ПОЛЬЗОВАТЕЛЬ НЕ ПОДТВЕРДИЛ ПОЧТУ
     *
     * @param AuthRequest $request
     * @return AuthTokenWithUserResource
     */
    public function auth(AuthRequest $request): AuthTokenWithUserResource
    {
        $data = AuthData::create(
            $request->validated()
        );

        $user = $this->userService->auth($data);
        return new AuthTokenWithUserResource($user);
    }
}
