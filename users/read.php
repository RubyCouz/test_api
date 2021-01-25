<?php
// déclaration des headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

// inclusion de la base de données et classe Users
include_once '../config/Database.php';
include_once '../objects/Users.php';
// instanciation de la classe Database
$database = new Database();
// connexion à la base de données
$db = $database->getInstance();

// instanciation de la classe Users
$users = new Users();
// appel de la méthode getAllUsers (lecture de tous les données de la table eter_user) de la classe Users
$stmt = $users->getAllUsers();
// comptage du nombre d'entrée dans le retour de la méthode getAllUsers
$num = $stmt->rowCount();
// si le nombre d'entrée est supérieur à 0
if ($num > 0) {
    // définitions des tableaux qui vont servir à l'établissement du JSON
    $arrayUsers = [];
    $arrayUsers['records'] = [];
// boucle pour lire les résultats
    while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        foreach ($row as $user) {
            // création de variables dont les noms sont les index de ce tableau, et affection de la valeur associée
            extract($user);
            // stockage des variables récupérées dans un tableau associatif
            $usersItems = [
                'id' => $id,
                'login' => $user_login,
            ];
            // stockage dans le tableau défini plus haut
            array_push($arrayUsers['records'], $usersItems);
        }

    }
    // définition d'un code de réponse (200 => ok)
    http_response_code(200);
    // affichage du JSON
    echo json_encode($arrayUsers);
} else {
    // Si pas d'entrée dans le retour de la methode getAllUsers, défintion d'un code d'erreur (404 => données introuvables)
    http_response_code(404);
    // définition d'un tableau associatif d'erreur
    echo json_encode(array(
            'message' => 'Aucun utilisateur trouvé.'
        )
    );
}


