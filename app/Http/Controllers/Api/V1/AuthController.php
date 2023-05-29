<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\DTO\AuthData;
use App\Domain\DTO\RegisterData;
use App\Domain\DTO\RestoreConfirmData;
use App\Domain\DTO\RestoreResponseData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\RestoreConfirmRequest;
use App\Http\Resources\User\AuthTokenWithUserResource;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
     * @param LoginRequest $request
     * @return AuthTokenWithUserResource
     */
    public function auth(LoginRequest $request): AuthTokenWithUserResource
    {
        $data = AuthData::create(
            $request->validated()
        );

        $user = $this->userService->auth($data);
        return new AuthTokenWithUserResource($user);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function restore(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return new JsonResponse([
            'message' => 'Запрос был отправлен'
        ], 201);
    }

    public function confirmRestoredPassword(RestoreConfirmRequest $request)
    {
        $data = RestoreConfirmData::create(
            $request->validated()
        );

        $this->userService->restorePassword($data);

        dd($data);
    }
}
