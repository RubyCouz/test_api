<?php
// déclaration des headers
//header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json; charset=UTF-8');

// inclusion de la base de données et classe Users
include_once '../config/Database.php';
include_once '../objects/Users.php';
// instanciation de la classe Database
$database = new Database();
// connexion à la base de données
$db = $database->getInstance();

// instanciation de la classe Users
$users = new Users();
$stmt = $users->getAllUsers();
//var_dump($stmt);


//$num = $stmt->rowCount();
//if($num > 0) {
//    $arrayUsers = [];
//    $arrayUsers['records'] = [];
//
//    while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
//        extract($row);
//        $usersItems = [
//            'id' => $id,
//            'login' => $user_login,
//        ];
//        array_push($arrayUsers['records'], $usersItems);
//    }
//    http_response_code(200);
//    echo json_encode($arrayUsers);
//} else {
//    http_response_code(404);
//    echo json_encode(array('message'=> 'Aucun utilisateur trouvé.',
//        '$stmt' => $stmt,
//        '$num' => $num,
//        ));
//}


