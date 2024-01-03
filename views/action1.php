<?php
session_start();
include '../model/connect.php';
include '../model/authenticate.php';

    $database = new Database();
    $connect = $database->connect();
    
    $User = new User($connect);
    
// FOR LOGIN 
if (isset($_POST['login-submit'])) {
    $User->username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $User->login();

    if($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            if($row['user_type'] === "USER"){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['user_type'] = $row['user_type'];
                
                header("Location: index.php");
                $_SESSION['successMessage'] = "Welcome, " .$row['firstname'];
            }
        }
        else{
            $_SESSION['errorMessage'] = "Wrong username or password";
            header("Location: ../index.php");
        }
    } else {
        $_SESSION['errorMessage'] = "No user found";
        header("Location: ../index.php");
        exit(0);
    }
}

// FOR REGISTRATION
if (isset($_POST['register'])) {
    if($_POST['password'] === $_POST['confirmpassword']){
        $User = new User($connect);
        $register = $User->signup($_POST['idnumber'], $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['email'], $_POST['contactNumber'], $_POST['division'], $_POST['username'], $_POST['password']);
    
        if ($register) {
            $_SESSION['successMessage'] = "Successfully Created";
        } else {
            $_SESSION['errorMessage'] = "Error in creating an account";
        }
    }
    else{
        $_SESSION['errorMessage'] = "Password doesn't match";
    }
    
    header("Location: ../index.php");
    exit(0);
}

// FOR SET APPOINTMENT
if(isset($_POST['appoint_btn'])){
    $user_id = $_SESSION['id'];
    $appoint_date = $_POST['appointment_date'];
    $name = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $type = $_SESSION['user_type'];

    if(!empty($appoint_date)){
        $add_appoint = $User->appoint_date($user_id, $appoint_date, $appoint_date, $name, $type);

        if($add_appoint){
            $_SESSION['successMessage'] = "Successfully Appointted";
        }
        else{
            $_SESSION['errorMessage'] = "Error in creating appointment";
        }  
    }
    else{
        $_SESSION['errorMessage'] = "No set appointment date";
    }
    header("Location: index.php");
    exit(0);
}

if(isset($_POST['appoint_btn_doctor'])){
    $user_id = $_SESSION['id'];
    $appoint_date = $_POST['appointment_date'];
    $name = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $type = $_SESSION['user_type'];

    if(!empty($appoint_date)){
        $add_appoint = $User->appoint_date($user_id, $appoint_date, $appoint_date, $name, $type);

        if($add_appoint){
            $_SESSION['successMessage'] = "Successfully Appoint";
        }
        else{
            $_SESSION['errorMessage'] = "Error in creating appointment";
        }  
    }
    else{
        $_SESSION['errorMessage'] = "No set appointment date";
    }
    header("Location: calendar_doctor.php");
    exit(0);
}