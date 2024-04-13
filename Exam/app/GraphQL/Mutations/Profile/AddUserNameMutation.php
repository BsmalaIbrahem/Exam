<?php

namespace App\GraphQL\Mutations\Profile;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Services\Profile\ProfileService;
use App\Validation\UpdateProfileValidation;
use GraphQL\Error\Error;

class AddUserNameMutation extends Mutation
{
    public function type(): Type
    {
        return GraphQL::type('Message');
    }

    public function args(): array
    {
        return [
            'user_name' => [
                'name' => 'user_name',
                'type' => type::string(),
                'rules' => ['required', 'string']
            ]
        ];
    }

    public function resolve($root , $args)
    {
        $validator = (new UpdateProfileValidation)->checkUserName($args);
        if($validator->fails()){
            return new Error($validator->getMessageBag()->first());
        }
        (new ProfileService)->addUserName($args['user_name']);
        return ['message' => 'added successfully'];
    }
}
