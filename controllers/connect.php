<?php

$host = 'localhost';
$dbname = 'projects';
$user = 'root';
$pass = 'root';

try {
    // Maak de PDO-verbinding
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

return $conn;