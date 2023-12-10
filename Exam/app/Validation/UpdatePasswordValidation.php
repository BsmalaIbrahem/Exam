<?php

namespace App\Validation;

use  Illuminate\Support\Facades\Validator;

class UpdatePasswordValidation
{
    public function validate($data)
    {
        return Validator::make($data, [
            'old_password' => 'required | string',
            'password' => 'required | string | confirmed',
        ]);
    }
}
