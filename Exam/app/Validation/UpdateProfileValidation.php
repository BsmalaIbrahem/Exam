<?php

namespace App\Validation;

use  Illuminate\Support\Facades\Validator;

class UpdateProfileValidation
{
    public function validate($data)
    {
        return Validator::make($data,[
            'first_name' => 'required | string',
            'last_name'  => 'required | string',
            'email'      => 'required |  email |  unique:users,email, '.auth('api')->user()->id,
        ]);
    }

    public function checkUserName($data)
    {
        return Validator::make($data,[
            'user_name' => 'required |  string |  unique:users,user_name, '.auth('api')->user()->id,
        ]);
    }
}
