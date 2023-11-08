<?php
include 'connect.php';
class User
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    // For Login
    public function login($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $stmt->fetch(); // You can use fetch() to retrieve the result as an associative array
        } else {
            return false;
        }
    }

    // For Signup
    public function signup($id, $firstname, $middlename, $lastname, $email, $contact_number, $division, $username, $password)
    {
        $query = "INSERT INTO user(pcn_id_number, firstname, middlename, lastname, email, contact_number, division, username, password) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $firstname);
        $stmt->bindParam(3, $middlename);
        $stmt->bindParam(4, $lastname);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $contact_number);
        $stmt->bindParam(7, $division);
        $stmt->bindParam(8, $username);
        $stmt->bindParam(9, $password);

        $stmt->execute();
        return $stmt;
    }
}
