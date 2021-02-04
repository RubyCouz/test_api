<?php
require '../users/read.php';
require '../vendor/autoload.php';

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\GraphQL;

try {


// users object
    $usersType = new ObjectType([
        'name' => 'users',
        'fields' => [
            'id' => ['type' => Type::int()],
            'user_login' => ['type' => Type::string()]
        ]
    ]);

    // défintion du shcéma
    $queryType = new ObjectType([
        'name' => 'Query',
        'fields' => [
            'users' => [
                'type' => $usersType,
                'args' => [
                    'id' => Type::int(),
                    'user_login' => Type::string(),
                ],
                'resolve' => function ($root, $args) {
                    $returnArray = [];
                    foreach ($root as $key => $users) {
                        if ($users['id'] == $args['id']) {
                            $returnArray = $users;
                        }
                    }
                    return $returnArray;
                }
            ],
        ],
    ]);
    $schema = new Schema([
        'query' => $queryType
    ]);

    // ciblage de la racine du JSON
    $rawInput = file_get_contents('php://input');
    // décodage du json et convertion en variable PHP
    $input = json_decode($rawInput, true);
    // prend la propriété "query" de l'objet
    $query = $input['query'];
    // check si les variables entrantes sont définies
    $variableValues = isset($input['variables']) ? $input['variables'] : null;
    // appel de la librarie Graphql pour exécuter la query avec les variables préparées
    $result = GraphQL::executeQuery($schema, $query, null, null, $variableValues);
    // convertion du résultat en tableau PHP
    $output = $result->toArray();
} catch (\Exception $exception) {
    // création d'un message d'erreur en cas de problème
    $output = [
        'error' => [
            'message' => $exception->getMessage()
        ]
    ];
}
//header('Content-Type: application/json; charset=UTF-8');
//header('Access-Control-Allow-Origin: *');
//header("Access-Control-Allow-Methods: GET, POST");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
// encodage de la réponse en JSON et envoie vers la vue
echo json_encode($output);