<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Validation\SignUpValidation;
use GraphQL\Error\Error;

class LoginServices
{
    public function login($data)
    {
        if(!$token = $this->checkAuth($data))
            return new Error('password OR email is wrong');
        return [
            'user' => auth('api')->user(),
            'authorisation' => $this->generateToken($token)
        ];
    }

    private function checkAuth($data)
    {
        $token = auth('api')->attempt($data);
        if($token)
            return $token;
        return false;
    }

    private function generateToken($token)
    {
        return [
            'token' => $token,
            'type' => 'bearer',
        ];
    }

}
