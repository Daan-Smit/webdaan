<?php
include '../main/head.php';
include '../main/header.php';
include '../includes/dbh.inc.php';
include '../includes/login/functions.inc.php';
?>

<div class="container">
    <form action="../includes/login/signup.inc.php" method="post" id="signupForm">
        <h2>Aanmelden</h2>

        <input type="text" id="signupFirstname" name="firstname" placeholder="Voornaam..." autocomplete="off" value="<?= $_SESSION['temp_firstname'] ?? '' ?>">
        <div id="signupFirstnameMsg"></div>

        <input type="text" id="signupMiddlename" name="middlename" placeholder="Tussenvoegsel..." autocomplete="off" value="<?= $_SESSION['temp_middlename'] ?? '' ?>">
        <div id="signupMiddlenameMsg"></div>

        <input type="text" id="signupLastname" name="lastname" placeholder="Achternaam..." autocomplete="off" value="<?= $_SESSION['temp_lastname'] ?? '' ?>">
        <div id="signupLastnameMsg"></div>

        <input type="text" id="signupUsername" name="username" placeholder="Gebruikersnaam..." autocomplete="off" value="<?= $_SESSION['temp_username'] ?? '' ?>">
        <div id="signupUsernameMsg"></div>

        <input type="text" id="signupEmail" name="email" placeholder="Email..." autocomplete="off" value="<?= $_SESSION['temp_email'] ?? '' ?>">
        <div id="signupEmailMsg"></div>

        <input type="password" id="signupPwd" name="pwd" placeholder="Wachtwoord..." autocomplete="off">
        <div id="signupPwdMsg"></div>

        <input type="password" id="signupPwdRepeat" name="pwdrepeat" placeholder="Herhaal wachtwoord..." autocomplete="off">
        <div id="signupPwdRepeatMsg"></div>

        <button type="submit" name="submit">Aanmelden</button>
        <a href="login.php">Ik heb al een account</a>
    </form>
    <div id="signupFormMsg"></div>
</div>
<script type="module" src="js/signup.js"></script>

<?php
include '../main/footer.php';
?>