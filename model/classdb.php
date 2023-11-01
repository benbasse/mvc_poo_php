<?php
ini_set('display_errors', 'On');

class DataBase 
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public function connect()
    {
        $this->servername = "localhost";
        $this->username = "ben221";
        $this->password = "B@sse@bdou221";
        $this->dbname = "gestion_contact";

        try 
        {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) 
        {
            echo "Connexion failed: ". $e->getMessage();
        }
    }

}
?>