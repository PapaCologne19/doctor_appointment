<?php
session_start();
include '../model/connect.php';
include '../model/login.php';

// FOR LOGIN 
if (isset($_POST['login-submit'])) {
    $User = new User($connect);
    $login = $User->login($_POST['username'], $_POST['password']);

    if ($login !== false) {
        header("Location: views/index.php");
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: ../index.php");
    exit(0);
}

// FOR REGISTRATION
if (isset($_POST['register'])) {

    $User = new User($connect);
    $register = $User->signup($_POST['idnumber'], $_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['email'], $_POST['contactNumber'], $_POST['division'], $_POST['username'], $_POST['password']);

    if ($register) {
        $_SESSION['successMessage'] = "Successfully Created";
    } else {
        $_SESSION['errorMessage'] = "Error";
    }
    header("Location: ../index.php");
    exit(0);
}
