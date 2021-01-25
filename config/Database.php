<?php


class Database
{
// définition des coordonnées de connexion
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $pdo;
    private static $_instance;
    /**
     * @var string
     */
    private $dsn;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->host = '127.0.0.1:3306';
        $this->db_name = 'eterelzfbx877';
        $this->password = '';
        $this->username = 'root';

        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . '.dbname=' . $this->db_name . 'charset=UTF8;', $this->username, $this->password);
        } catch (Exception $ex) {
            $message = 'Erreur P.D.O dans ' . $ex->getFile() . ' ligne ' . $ex->getLine() . ' : ' . $ex->getMessage();
            die($message);
        }
    }

    /**
     * @return Database
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * fermeture de la connexion à la base de données
     */
    public function __destruct()
    {
        $this->conn = null;
    }
}