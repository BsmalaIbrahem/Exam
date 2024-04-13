<?php

namespace App\Validation;

use  Illuminate\Support\Facades\Validator;

class SignUpValidation
{
    public function validate($data)
    {
        return  Validator::make($data, [
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'email' => 'required | email | unique:users',
            'user_name' => 'required | string | unique:users,user_name',
            'password' => 'required | string | confirmed',
        ]);
    }
}
