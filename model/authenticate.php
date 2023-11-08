<?php
class User
{
    private $connect;
    public $username;
    public $password;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    // FOR LOGIN
    public function login()
    {
        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $this->username);

        $stmt->execute();
            return $stmt; 
    }

    // FOR SIGNUP
    public function signup($id, $firstname, $middlename, $lastname, $email, $contact_number, $division, $username, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
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
        $stmt->bindParam(9, $hashed_password);

        $stmt->execute();
        return $stmt;
    }

    // FOR SET APPOINTMENT DATE
    public function appoint_date($user_id, $start_date, $end_date){
        $query = "INSERT INTO appointment(user_id, appointment_date_start, appointment_date_end) VALUES (? ,?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $start_date);
        $stmt->bindParam(3, $end_date);
        $stmt->execute();
        return $stmt;
    }
}
