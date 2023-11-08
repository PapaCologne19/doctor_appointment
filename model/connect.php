<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "doctor_appointment";

try {
    $connect = new PDO("mysql:host=$servername; dbname=$database", $username, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}