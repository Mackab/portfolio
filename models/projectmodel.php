<?php
// models/projectmodel.php

require_once __DIR__ . '/../core/model.php'; // Pad naar model.php
require_once __DIR__ . '/../core/database.php'; // Correct pad naar database.php

class ProjectModel extends Model {
    public function getAllProjects() {
        $stmt = $this->db->prepare("SELECT * FROM projects");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjectBySlug($slug) {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE slug = :slug");
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProjectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourneert het project of false als het niet bestaat
    }
}

