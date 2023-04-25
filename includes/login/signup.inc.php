<?php

if (isset($_POST['submit'])) {

    session_start();

    $firstname = $_SESSION['temp_firstname'] = htmlspecialchars($_POST['firstname']);
    $middlename = $_SESSION['temp_middlename'] = htmlspecialchars($_POST['middlename']);
    $lastname = $_SESSION['temp_lastname'] = htmlspecialchars($_POST['lastname']);
    $username = $_SESSION['temp_username'] = htmlspecialchars($_POST['username']);
    $email = $_SESSION['temp_email'] = htmlspecialchars($_POST['email']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $pwdRepeat = htmlspecialchars($_POST['pwdrepeat']);

    require_once '../dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($firstname, $lastname, $username, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../../login/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../../login/signup.php?error=invaliduid");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../../login/signup.php?error=usernametaken");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../login/signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../../login/signup.php?error=nomatch");
        exit();
    }

    createUser($conn, $firstname, $middlename, $lastname, $username, $email, 1, $pwd);
    
} else {
    header("location: ../../index.php");
    exit();
}