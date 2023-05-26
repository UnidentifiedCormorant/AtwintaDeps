<?php

namespace App\Services;

use App\Domain\DTO\RegisterData;
use App\Domain\Entity\RegisterEntity;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    public function __construct(
        public UserRepositoryInterface $userRepository
    )
    {
    }

    public function store(RegisterData $data): RegisterEntity
    {
        $user = $this->userRepository->create([
            //TODO: Дописать создание пользователя
        ]);

        Auth::login($user);
        $token = $user->createToken(config('app.name'));

        return new RegisterEntity($user, $token->plainTextToken);
    }
}
