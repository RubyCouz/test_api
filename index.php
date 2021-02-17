<?php

// Test this using following command
// php -S localhost:8080 ./graphql.php &
// curl http://localhost:8080 -d '{"query": "query { echo(message: \"Hello World\") }" }'
// curl http://localhost:8080 -d '{"query": "mutation { sum(x: 2, y: 2) }" }'
require_once __DIR__ . '/vendor/autoload.php';
// Data
require_once "bootstrap.php";

use EterelzApi;
use EterelzApi\Type\QueryType;
use EterelzApi\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\Server\StandardServer;


try {
    /*$queryType = new ObjectType([
        'name' => 'Query',
        'fields' => [
            'users' => [
                'type' => Type::string(),
                'args' => [
                    'id' => ['type' => Type::id()],
                ],
                'resolve' => function ($rootValue, $args) {
                    //EterelzApi\Data\EterUsers
                    //$email = $entityManager->getRepository('EterelzApi\Data\EterUsers')->find(1)->getUserMail();
                    $email = "nain";
                    var_dump($entityManager->getRepository('EterelzApi\Data\EterUsers')->find(1)->getUserMail());
                    return $email;
                }
            ],
        ],
    ]);
    */


    // See docs on schema options:
    // http://webonyx.github.io/graphql-php/type-system/schema/#configuration-options
    $schema = new Schema([
        'query' => new QueryType(),
        'typeLoader' => function($name) {
            return Types::byTypeName($name, true);
        }
    ]);

    // See docs on server options:
    // http://webonyx.github.io/graphql-php/executing-queries/#server-configuration-options
    $server = new StandardServer([
        'schema' => $schema
    ]);

    $server->handleRequest();
} catch (\Exception $e) {
    StandardServer::send500Error($e);
}