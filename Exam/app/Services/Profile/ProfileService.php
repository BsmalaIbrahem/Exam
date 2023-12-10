<?php

namespace App\Services\Profile;

use App\Validation\UpdateProfileValidation;
use GraphQL\Error\Error;
use App\Models\User;

class ProfileService
{
    public function update($data)
    {
        $validate = $this->checkData($data);
        if($validate === true ){
         User::where('id', auth('api')->user()->id)->update($data);
         return 'profile updated';
        }
        return $validate;
    }

    private function checkData($data)
    {
        $validator = (new UpdateProfileValidation)->validate($data);
        if($validator->fails()){
            return new Error($validator->getMessageBag()->first());
        }
        return true;
    }
}
