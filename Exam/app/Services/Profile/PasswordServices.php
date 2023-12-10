<?php

namespace App\Services\Profile;

use App\Validation\UpdatePasswordValidation;
use GraphQL\Error\Error;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordServices
{
    public function update($data)
    {
        $validator = $this->checkData($data);
        if($validator === true){
            $user = User::where('id', auth('api')->user()->id)->first();
            $user->password = $data['password'];
            $user->save();
            return 'password updated';
        }
        return $validator;
    }

    private function checkData($data)
    {
        $validator = (new UpdatePasswordValidation)->validate($data);
        if($validator->fails()){
            return new Error($validator->getMessageBag()->first());
        }
        if($this->checkOldPassword($data['old_password']) !== true){
            return new Error('old password is wrong');
        }
        return true;
    }

    private function checkOldPassword($old_password)
    {
        if(Hash::check($old_password, auth('api')->user()->password)){
            return true;
        }
    }

}
