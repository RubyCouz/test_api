<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;

//définition du schema pour la query et mutation
$schema = new Schema([
    'query' => $queryType,
    'mutation' => $mutation,
]);
// définition de l'objet query
$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'user' => [
            'type' => Type::string(),
            'args' => [
                'id' => Type::int(),
                'login' => Type::string()
            ],
            'resolve' => function ($root, $args) {
                $returnArray = [];
                foreach($root as $key => $user) {
                    if ($user["id"] == $args["id"])
                        $returnArray = $user;
                }
                return $returnArray;
//                return $root['prefix'] . $args['message'];
            }
        ],
    ],
]);

$users = new ObjectType([
   'name' => 'Users',
   'description' => 'Users list form json object',
   'fields' => [

   ]
]);
