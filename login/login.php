<?php
include '../main/head.php';
include '../main/header.php';
?>

<div class="container">
    <h2>Login</h2>
    <form action="../includes/login/login.inc.php" method="post">
        <input type="text" name="name" placeholder="Username/Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit">Sign Up</button>
    </form>
    <a href="signup.php">I have no account</a>
</div>

<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyinput') {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET['error'] == 'wronglogin') {
        echo "<p>Incorrect login!</p>";
    }
}
?>