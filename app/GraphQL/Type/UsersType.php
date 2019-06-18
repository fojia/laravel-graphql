<?php

namespace App\GraphQL\Type;

use App\GraphQL\Scalars\DateTimeType;
use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UsersType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Users',
        'model' => User::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'email' => [
                'type' => Type::string()
            ],
            'name' => [
                'type' => Type::string()
            ],
            'created_at' => [
//                'type' => GraphQL::type('DateTimeType'),
                'type' => GraphQL::type('DateTimeType'),
                'args' => [
                    'format' => Type::string(),
                    'object' => Type::boolean()
                ],
                'resolve' => function ($source, $args) {
                    $date = new DateTimeType($args);

                    return $date->serialize($source->created_at);
                }
            ]
        ];
    }
}
