<?php

if (isset($_POST['submit'])) {

    session_start();

    $username = $_SESSION['temp_login'] = htmlspecialchars($_POST['name']);
    $pwd = htmlspecialchars($_POST['pwd']);

    require_once '../dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../../login/login.php?error=emptyinput");
        exit();
    }

    if (!uidExists($conn, $username, $username)) {
        header("location: ../../login/login.php?error=nouser");
        exit();
    }

    loginUser($conn, $username, $pwd);
} else {
    header("location: ../../index.php");
    exit();
}