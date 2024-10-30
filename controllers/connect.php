<?php
// controllers/connect.php

$host = 'localhost';
$dbname = 'projects'; // Zorg ervoor dat dit de juiste database is
$user = 'root';
$pass = 'root';

try {
    // Maak de PDO-verbinding
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Dit is een object, zorg ervoor dat je het beschikbaar maakt
return $conn;