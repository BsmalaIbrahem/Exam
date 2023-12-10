<?php
namespace App\GraphQL\Mutations\Profile;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Services\Profile\PasswordServices;

class UpdatePasswordMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdatePassword',
    ];

    public function type() : type
    {
        return Type::String();
    }

    public function args():array
    {
        return [
            'old_password' => [
                'name' => 'old_password',
                'type'=>Type::string(),
                'rules' => ['required' , 'string'],
            ],
            'password' => [
                'name' => 'password',
                'type'=>Type::string(),
                'rules' => ['required' , 'string'],
            ],
            'password_confirmation' => [
                'name' => 'password_confirmation',
                'type'=>Type::string(),
                'rules' => ['required' , 'string'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return (new PasswordServices)->update($args);
    }
}
