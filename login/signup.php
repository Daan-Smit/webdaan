<?php
include '../main/head.php';
include '../main/header.php';
include '../includes/dbh.inc.php';
include '../includes/login/functions.inc.php';
?>

<h2>Sign Up</h2>
<form action="../includes/login/signup.inc.php" method="post">
    <input type="text" id="firstname" name="firstname" placeholder="Voornaam..." autocomplete="off" value="">
    <input type="text" name="middlename" placeholder="Tussenvoegsel..." autocomplete="off">
    <input type="text" name="lastname" placeholder="Achternaam..." autocomplete="off">
    <input type="text" name="username" placeholder="Username..." autocomplete="off">
    <input type="text" name="email" placeholder="Email..." autocomplete="off">
    <input type="date" name="dateofbirth" autocomplete="off">
    <input type="text" name="phonenumber" placeholder="Phone number..." autocomplete="off">
    <select name="gender" autocomplete="off">
        <option selected disabled>--- Maak een keuze ---</option>
        <?php
            $resultData = getGenders($conn);
            
            while ($row = mysqli_fetch_assoc($resultData)) {
                ?><option value="<?= $row['genderId'] ?>"><?= $row['genderName'] ?></option><?php
            }
        ?>
    </select>
    <input type="number" name="age" placeholder="Age..." autocomplete="off">
    <input type="password" name="pwd" placeholder="Password..." autocomplete="off">
    <input type="password" name="pwdrepeat" placeholder="Repeat password..." autocomplete="off">
    <button type="submit" name="submit">Sign Up</button>
</form>

<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyinput') {
        echo "<p>Vul alle velden in!</p>";
    }
    else if ($_GET['error'] == 'invaliduid') {
        echo "<p>Kies een geldige gebruikersnaam, je mag letters en cijfers gebruiken!</p>";
    }
    else if ($_GET['error'] == 'invalidemail') {
        echo "<p>Kies een geldig e-mail address!</p>";
    }
    else if ($_GET['error'] == 'invalidphonenumber') {
        echo "<p>Kies een geldig telefoonnummer!</p>";
    }
    else if ($_GET['error'] == 'invalidage') {
        echo "<p>Je moet minimaal 14 jaar zijn om een account aan te maken!</p>";
    }
    else if ($_GET['error'] == 'nomatch') {
        echo "<p>Wachtwoorden komen niet overeen!</p>";
    }
    else if ($_GET['error'] == 'stmtfailed') {
        echo "<p>Er is iets fout gegaan, probeer het later opnieuw!</p>";
    }
    else if ($_GET['error'] == 'usernametaken') {
        echo "<p>Gebruikersnaam bestaat al!</p>";
    }
    else if ($_GET['error'] == 'none') {
        echo "<p>Je bent ingelogd!</p>";
    }
}
?>