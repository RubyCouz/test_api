<?php
// header pour requête
//header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json; charset=UTF-8');

// inclusion de la connexion à la bdd et de la classe Users
include_once '../config/database.php';
include_once '../objects/Users.php';

$database = new Database();
$db = $database->getInstance();

// instanciation de la classe Users
$users = new Users();

$stmt = $users->getAllUsers();
$usersNumbers = $stmt->rowCount();

if ($usersNumbers > 0) {
    // déclaration des tableaux qui vont contenir le JSON
    $users_arr = [];
    $users_arr['records'] = [];

    while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        var_dump($row);
        foreach ($row as $user) {
            var_dump($user);
            // création de variables à l'aide des clés du tableau associatif obtenu lors de la requête vers la bdd
            extract($user);
            $users_item = array(
                'id' => $id,
                'user_login' => $user_login,
            );
        }

        // envoie vers le tableau destiné à contenir le JSON
        array_push($users_arr['records'], $users_item);
    }
    // définition d'un code 200 => requête effectué et résultat trouvé
    http_response_code(200);
    // envoie de la réponse en JSON
    echo json_encode($users_arr);
} else {
    // si pas de résultat, définition d'un code d'erreur 404
    http_response_code(404);
    // stockage d'un message d'erreur dans un tableau associatif
    echo json_encode(array('message' => 'Aucun utilisateur dans la base'));
}