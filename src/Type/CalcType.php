<?php
namespace EterelzApi\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class CalcType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Calc',
            'fields' => function() {
                return [
                    'calc' => [
                        'type' => Type::int(),
                        'args' => [
                            'x' => ['type' => Type::int()],
                            'y' => ['type' => Type::int()],
                        ],
                        'resolve' => function ($calc, $args) {
                            return $args['x'] + $args['y'];
                        },
                    ],
                ];
            },
        ];
        parent::__construct($config);
    }
}