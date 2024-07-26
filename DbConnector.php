<?php

class DbConnector {

    private $host = "localhost";
    private $dbname = "pet";
    private $username = "root";
    private $password = "";

    public function getConnection() {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        try {
            $con = new PDO($dsn, $this->username, $this->password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>
