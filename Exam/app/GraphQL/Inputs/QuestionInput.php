<?php

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class QuestionInput extends InputType
{
    protected $attributes = [
        'name' => 'QuestionInput',
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
            'grade' =>[
                'name' => 'grade',
                'type' => Type::Int(),
                'rules' => ['required'],
            ],
            'options' => [
                'name' => 'options',
                'type' => Type::listOf(GraphQL::type('OptionInput')),
                'rules' => ['required'],
            ],
        ];
    }
}
