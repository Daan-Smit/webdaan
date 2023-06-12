<?php
include '../main/head.php';
include '../main/header.php';
include '../includes/dbh.inc.php';
include '../includes/login/functions.inc.php';
?>

<div class="container">
    <form action="../includes/login/signup.inc.php" method="post" id="signupForm">
        <h2>Aanmelden</h2>
        <div class="input">
            <label for="signupFirstname" class="input__label">Voornaam</label>
            <input type="text" id="signupFirstname" name="firstname" class="input__input" placeholder="Voornaam..." autocomplete="off" value="<?= $_SESSION['temp_firstname'] ?? '' ?>">
            <div class="input__error"></div>
        </div>
        <div class="input">
            <label for="signupMiddlename" class="input__label">Tussenvoegsel</label>
            <input type="text" id="signupMiddlename" name="middlename" class="input__input" placeholder="Tussenvoegsel..." autocomplete="off" value="<?= $_SESSION['temp_middlename'] ?? '' ?>">
            <div class="input__error"></div>
        </div>
        <div class="input">
            <label for="signupLastname" class="input__label">Achternaam</label>
            <input type="text" id="signupLastname" name="lastname" class="input__input" placeholder="Achternaam..." autocomplete="off" value="<?= $_SESSION['temp_lastname'] ?? '' ?>">
            <div class="input__error"></div>
        </div>
        <div class="input">
            <label for="signupUsername" class="input__label">Gebruikersnaam</label>
            <input type="text" id="signupUsername" name="username" class="input__input" placeholder="Gebruikersnaam..." autocomplete="off" value="<?= $_SESSION['temp_username'] ?? '' ?>">
            <div class="input__error"></div>
        </div>
        <div class="input">
            <label for="signupEmail" class="input__label">Email</label>
            <input type="text" id="signupEmail" name="email" class="input__input" placeholder="Email..." autocomplete="off" value="<?= $_SESSION['temp_email'] ?? '' ?>">
            <div class="input__error"></div>
        </div>
        <div class="input">
            <label for="signupPwd" class="input__label">Wachtwoord</label>
            <input type="password" id="signupPwd" name="pwd" class="input__input" placeholder="Wachtwoord..." autocomplete="off">
            <div class="input__error"></div>
        </div>
        <div class="input">
            <label for="signupPwdRepeat" class="input__label">Herhaal wachtwoord</label>
            <input type="password" id="signupPwdRepeat" name="pwdrepeat" class="input__input" placeholder="Herhaal wachtwoord..." autocomplete="off">
            <div class="input__error"></div>
        </div>

        <button type="submit" name="submit">Aanmelden</button>
        <a href="login.php">Ik heb al een account</a>
    </form>
    <div id="serverError"></div>
</div>
<script type="module" src="js/signup.js"></script>

<?php
include '../main/footer.php';
?>