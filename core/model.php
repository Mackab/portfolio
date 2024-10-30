<?php

require_once __DIR__ . '/../controllers/connect.php'; // Correct pad naar connect.php

class Model {
    protected $db;

    public function __construct() {
        global $conn; // Maak gebruik van de globale connectie
        $this->db = $conn; // Verbind de db connectie
    }

    // Hier kun je andere gemeenschappelijke modelmethodes toevoegen
}