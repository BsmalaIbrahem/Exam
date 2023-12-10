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
}
