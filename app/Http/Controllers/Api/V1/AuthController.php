<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\DTO\RegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = RegisterData::create(
            $request->validated()
        );
        dd($data);
    }
}
