<?php

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];

    require_once '../dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($firstname, $lastname, $username, $email, $phonenumber, $gender, $age, $pwd, $pwdRepeat) !== false) {
        header("location: ../../login/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../../login/signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../login/signup.php?error=invalidemail");
        exit();
    }

    if (invalidPhoneNumber($phonenumber) !== false) {
        header("location: ../../login/signup.php?error=invalidphonenumber");
        exit();
    }

    if (invalidAge($age) !== false) {
        header("location: ../../login/signup.php?error=invalidage");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../../login/signup.php?error=nomatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../../login/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $firstname, $middlename, $lastname, $username, $email, $phonenumber, $gender, $age, 1, $pwd);
    
} else {
    header("location: ../../login/signup.php");
    exit();
}