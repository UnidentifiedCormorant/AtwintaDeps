<?php

namespace App\Services;

use App\Domain\DTO\AuthData;
use App\Domain\DTO\RegisterData;
use App\Domain\Entity\EnterEntity;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function __construct(
        public UserRepositoryInterface $userRepository
    )
    {
    }

    /**
     * Добавляет пользователя в БД
     *
     * @param RegisterData $data
     * @return EnterEntity
     */
    public function store(RegisterData $data): EnterEntity
    {
        $user = $this->userRepository->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'type' => $data->type->value,
            'github' => $data->github,
            'city' => $data->city,
            'phone' => $data->phone,
            'birthday' => $data->birthday
        ]);

        Auth::login($user);
        $token = $user->createToken(config('app.name'));

        return new EnterEntity($user, $token->plainTextToken);
    }

    /**
     * Авторизует пользователя
     *
     * @param AuthData $data
     * @return EnterEntity
     */
    public function auth(AuthData $data): EnterEntity
    {
        if($user = $this->userRepository->getUserByEmail($data->email)) {
            if(Hash::check($data->password, $user->password)){

                Auth::login($user);
                $token = $user->createToken(config('app.name'));

                return new EnterEntity($user, $token->plainTextToken);
            }else{
                dd('fuck password'); //TODO: Добавить кастомный эксепшн на Ошибка в заполнении данных
            }
        }else{
            dd('fuck email'); //TODO: Добавить кастомный эксепшн на Ошибка в заполнении данных
        }
    }
}
