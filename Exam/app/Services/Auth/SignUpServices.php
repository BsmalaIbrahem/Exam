<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\Validation\SignUpValidation;
use GraphQL\Error\Error;
use Illuminate\Support\Facades\Auth;

class SignUpServices
{
    public function signUp($data)
    {
        $validator = $this->validate($data);
        if($validator === true){
            $user = $this->storeData($data);
            $authorisation = $this->generateToken($user);
            return ['user' => $user, 'authorisation' => $authorisation];
        }
        return $validator;

    }

    private function validate($data)
    {
        $validator = (new SignUpValidation)->validate($data);
        if($validator->fails())
            return new Error($validator->getMessageBag()->first());
        return true;
    }

    private function storeData($data)
    {
        return User::create($data);
    }

    private function generateToken($data)
    {
        $token = Auth::guard('api')->login($data);
        return ['token' => $token, 'type' => 'bearer'];
    }



}
