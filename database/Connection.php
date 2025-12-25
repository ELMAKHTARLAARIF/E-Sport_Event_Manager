<?php

class Connection {
    private string $host = "localhost";
    private string $dbname = "Sport_Event_Manager";
    private string $username = "root";
    private string $pass = "laarif+osb2002";

    public function getConnection(): PDO {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            $pdo = new PDO($dsn, $this->username, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}

?>
