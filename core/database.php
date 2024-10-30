<?php

// core/database.php
class Database {
    private $host = 'localhost';
    private $db_name = 'projects';
    private $username = 'root';
    private $password = 'root';
    private $connection;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Database connection failed: " . $exception->getMessage();
        }
        return $this->connection;
    }
}