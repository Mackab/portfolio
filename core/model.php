<?php

require_once __DIR__ . '/../controllers/connect.php'; // Correct pad naar connect.php

class Model {
    protected $db;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $dsn = 'mysql:host=localhost;dbname=projects;charset=utf8'; // Vervang YOUR_DATABASE_NAME door je echte database naam
        $username = 'root'; // Dit is meestal 'root' voor lokale XAMPP-installaties
        $password = 'root'; // Laat dit leeg als er geen wachtwoord is ingesteld

        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Database connected successfully!";
        } catch (PDOException $e) {
            echo 'Database connection failed: ' . $e->getMessage();
            $this->db = null; // Zorg ervoor dat db null is bij een fout
        }
    }
}