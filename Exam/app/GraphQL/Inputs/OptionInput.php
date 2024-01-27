<?php

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class OptionInput extends InputType
{
    protected $attributes = [
        'name' => 'OptionInput',
        'description' => 'Question Field',
    ];


    public function fields() : array
    {
        return [
            'body' => [
                'name' => 'body',
                'type' => Type::String(),
                'rules' => ['required'],
            ],
            'is_answer' =>[
                'name' => 'is_answer',
                'type' => Type::Boolean(),
                'rules' => ['required'],
            ],
        ];
    }
}
