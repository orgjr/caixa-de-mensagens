<?php

class Database
{
    private $runDb;
    private $conn;

    public function setScript() {
        $this->runDb = './create-db.py';
        $output = shell_exec("python3 $this->runDb");
    }

    public function __construct()
    {
        try {
        $this->conn = new PDO('sqlite:../db/database.db');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // captura e exibe o erro
            echo "Erro: " . $e->getMessage();
        }
    }
    public function getConnection()
    {
        return $this->conn;
    }
}


?>

