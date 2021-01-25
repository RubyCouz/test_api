<?php


class Users
{
    // propriétés de la table utilisateur
    public $id;
    public $user_login;
    public $user_date;
    public $user_mail;
    public $user_password;
    public $user_address;
    public $user_zip;
    public $user_city;
    public $user_discord;
    public $user_sex;
    public $statut;
    public $user_description;
    public $user_avatar;
    public $user_update;
    public $user_role;
    public $activation_token;
    public $reset_token;
    public $date_inscr;
    public $date_lien;
    public $user_order_date;
    public $user_desactivate;
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct()
    {
        $database = database::getInstance();
        $this->pdo = $database->pdo;
    }

    public function getAllUsers() {

        $query = 'SELECT * FROM `eter_user`';
        $users = $this->pdo->query($query);
//        $users->execute();
        var_dump($users);
        $result = $users->fetchAll(PDO::FETCH_OBJ);
        var_dump($result);
        return $result;
    }

}