<?php

function emptyInputSignup($firstname, $lastname, $username, $email, $phonenumber, $gender, $age, $pwd, $pwdRepeat) {
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($phonenumber) || empty($gender) || empty($age) || empty($pwd) || empty($pwdRepeat)) {
        return true;
    } else {
        return false;
    }
}

function invalidUsername($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true;
    } else {
        return false;
    }
}

function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function invalidPhoneNumber($phonenumber) {
    if (!preg_match("/^(\\+31|0|0031)\\s*[1-9]([0-9]\\s{0,1}){7,8}$/", $phonenumber)) {
        return true;
    } else {
        return false;
    }
}

function invalidAge($age) {
    if ($age <= 13) {
        return true;
    } else {
        return false;
    }
}

function pwdMatch($pwd, $pwdRepeat) {
    if ($pwd != $pwdRepeat) {
        return true;
    } else {
        return false;
    }
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE userUsername = ? OR userEmail =?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../login/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $middlename, $lastname, $username, $email, $phonenumber, $gender, $age, $userlevel, $pwd) {
    $sql = "INSERT INTO users (userFirstname, userMiddlename, userLastname, userUsername, userEmail, userPhoneNumber, genderId, userAge, userlevelId, userPassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../login/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssiiis", $firstname, $middlename, $lastname, $username, $email, $phonenumber, $gender, $age, $userlevel, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION['userid'] = mysqli_insert_id($conn);
    $_SESSION['firstname'] = $firstname;
    $_SESSION['username'] = $username;

    header("location: ../../index.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../../login/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists['userPassword'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../../login/login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION['userid'] = $uidExists['userId'];
        $_SESSION['firstname'] = $uidExists['userFirstname'];
        $_SESSION['username'] = $uidExists['userUsername'];
        header("location: ../../index.php");
        exit();
    }
}

function getGenders($conn) {
    $sql = "SELECT * FROM genders;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../login/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    return $resultData;

    mysqli_stmt_close($conn);
}