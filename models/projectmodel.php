<?php
// models/projectmodel.php

require_once __DIR__ . '/../core/model.php'; // Pad naar model.php
require_once __DIR__ . '/../core/database.php'; // Correct pad naar database.php

class ProjectModel extends Model {
    public function getAllProjects() {
        // Voorbeeld van database-interactie
        $db = new Database(); // Zorg ervoor dat de Database-klasse bestaat
        // Je database-query hier
    }
}

