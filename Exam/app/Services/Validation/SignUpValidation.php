<?php

namespace App\Services\Validation;

use  Illuminate\Support\Facades\Validator;

class SignUpValidation
{
    public function validate($data)
    {
        return  Validator::make($data, [
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'email' => 'required | email | unique:users',
            'password' => 'required | string | confirmed',
        ]);
    }
}
