<?php

namespace App\Services;

use App\Domain\DTO\AuthData;
use App\Domain\DTO\FindWorkerData;
use App\Domain\DTO\RegisterData;
use App\Domain\DTO\RestoreConfirmData;
use App\Domain\DTO\RestoreResponseData;
use App\Domain\Entity\EnterEntity;
use App\Jobs\RestoreClearedPassword;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
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
            if($user->password){
                if (Hash::check($data->password, $user->password)) {

                    Auth::login($user);
                    $token = $user->createToken(config('app.name'));

                    return new EnterEntity($user, $token->plainTextToken);
                } else {
                    dd('fuck password'); //TODO: Добавить кастомный эксепшн на Ошибка в заполнении данных
                }
            }else{
                dd('null password bruh'); //TODO: Добавить кастомный эксепшн Пользователь не подтвердил почту
            }
        }else{
            dd('fuck email'); //TODO: Добавить кастомный эксепшн на Ошибка в заполнении данных
        }
    }

    /**
     * Очищает пароль; на случай, если пользователь протупил и не довёл процедуру до конца, пароль восстановится обратно через час
     *
     * @param RestoreResponseData $data
     * @return void
     */
    public function clearPassword(RestoreResponseData $data): string
    {
//        if($user = $this->userRepository->getUserByEmail($data->email)){
//
//            RestoreClearedPassword::dispatch($user->id, $user->password)->delay(now()->addHour());
//
//            $user->password = null;
//            //$user->remember_token = $user->createToken(config('app.name'))->plainTextToken;
//            $user->save();
//
//            return $user->remember_token;
//        }else{
//            dd('fuck email'); //TODO: Добавить кастомный эксепшн на Ошибка в заполнении данных
//        }
    }

    //TODO: Когда пользователь сменил пароль, джоб надо убить
    public function restorePassword(RestoreConfirmData $data): void
    {
        //dd($this->userRepository->getUserByToken($data->token));
    }

    /**
     * @return Collection
     */
    public function getAllUsers(): LengthAwarePaginator
    {
        return $this->userRepository->getAllUsers();
    }

    public function getFilteredUsers(FindWorkerData $data): LengthAwarePaginator
    {
        return $this->userRepository->getFilteredUsers($data);
    }
}
