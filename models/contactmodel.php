<?php
// models/contactmodel.php

class ContactModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function saveContact($name, $email, $message) {
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
    }
}
?>
