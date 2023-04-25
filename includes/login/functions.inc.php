<?php

function emptyInputSignup($firstname, $lastname, $username, $email, $pwd, $pwdRepeat):bool {
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        return true;
    } else {
        return false;
    }
}

function invalidUsername($username):bool {
    if (!preg_match("/^[a-zA-Z0-9-_]*$/", $username)) {
        return true;
    } else {
        return false;
    }
}

function invalidEmail($email):bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function pwdMatch($pwd, $pwdRepeat):bool {
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

    mysqli_stmt_close($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

}

function createUser($conn, $firstname, $middlename, $lastname, $username, $email, $userlevel, $pwd) {
    $sql = "INSERT INTO users (userFirstname, userMiddlename, userLastname, userUsername, userEmail, userlevelId, userPassword) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../login/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssis", $firstname, $middlename, $lastname, $username, $email, $userlevel, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION['userid'] = mysqli_insert_id($conn);
    $_SESSION['firstname'] = $firstname;
    $_SESSION['username'] = $username;

    header("location: ../../index.php?error=usercreated");
    exit();
}

function emptyInputLogin($username, $pwd):bool {
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
    } else {
        session_start();
        $_SESSION['userid'] = $uidExists['userId'];
        $_SESSION['firstname'] = $uidExists['userFirstname'];
        $_SESSION['username'] = $uidExists['userUsername'];
        header("location: ../../index.php");
        exit();
    }
}