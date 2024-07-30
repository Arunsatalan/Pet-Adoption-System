<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'wad';
    private $username = 'root';
    private $password = 'Satalan1925$';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

            // Check connection
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
            exit(); // Stop further execution
        }

        return $this->conn;
    }
}

















/*-- Active: 1720520047062@@127.0.0.1@3306
CREATE DATABASE wad;

    DEFAULT CHARACTER SET = 'utf8mb4';

    CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(255) NOT NULL,
    pet_age INT NOT NULL,
    vaccinate ENUM('yes', 'no') NOT NULL,
    trained ENUM('yes', 'no') NOT NULL,
    category ENUM('cat', 'dog') NOT NULL,
    breed VARCHAR(255) NOT NULL,
    colour VARCHAR(50) NOT NULL,
    location VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    pet_image VARCHAR(255) DEFAULT NULL
);
*/


?>