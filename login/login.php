<?php
include '../main/head.php';
include '../main/header.php';
include '../includes/main.inc.php';
?>

<div class="container">
    <form action="../includes/login/login.inc.php" method="post" id="loginForm">
        <h2>Inloggen</h2>
        <div class="input">
            <label for="loginName" class="input__label">Gebruikersnaam/Email</label>
            <input type="text" id="loginName" name="name" class="input__input" autocomplete="off" value="<?= $_SESSION['temp_login'] ?? "" ?>">
            <div class="input__error"></div>
        </div>
        <div class="input">
            <label for="loginPwd" class="input__label">Wachtwoord</label>
            <input type="password" id="loginPwd" name="pwd" class="input__input" autocomplete="off">
            <div class="input__error"></div>
        </div>

        <button type="submit" name="submit">Inloggen</button>
        <a href="signup.php">Account aanmaken</a>
    </form>
    <div id="serverError"></div>
</div>
<script type="module" src="js/login.js"></script>

<?php
include '../main/footer.php';
?>

<!--<div class="form-body">-->
<!--    <div class="row">-->
<!--        <div class="form-holder">-->
<!--            <div class="form-content">-->
<!--                <div class="form-items">-->
<!--                    <h3>Register Today</h3>-->
<!--                    <p>Fill in the data below.</p>-->
<!--                    <form class="requires-validation" novalidate>-->
<!---->
<!--                        <div class="col-md-12">-->
<!--                            <input class="form-control" type="text" name="name" placeholder="Full Name" required>-->
<!--                            <div class="valid-feedback">Username field is valid!</div>-->
<!--                            <div class="invalid-feedback">Username field cannot be blank!</div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-12">-->
<!--                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>-->
<!--                            <div class="valid-feedback">Email field is valid!</div>-->
<!--                            <div class="invalid-feedback">Email field cannot be blank!</div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-12">-->
<!--                            <select class="form-select mt-3" required>-->
<!--                                <option selected disabled value="">Position</option>-->
<!--                                <option value="jweb">Junior Web Developer</option>-->
<!--                                <option value="sweb">Senior Web Developer</option>-->
<!--                                <option value="pmanager">Project Manager</option>-->
<!--                            </select>-->
<!--                            <div class="valid-feedback">You selected a position!</div>-->
<!--                            <div class="invalid-feedback">Please select a position!</div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="col-md-12">-->
<!--                            <input class="form-control" type="password" name="password" placeholder="Password" required>-->
<!--                            <div class="valid-feedback">Password field is valid!</div>-->
<!--                            <div class="invalid-feedback">Password field cannot be blank!</div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="col-md-12 mt-3">-->
<!--                            <label class="mb-3 mr-1" for="gender">Gender: </label>-->
<!---->
<!--                            <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>-->
<!--                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>-->
<!---->
<!--                            <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>-->
<!--                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>-->
<!---->
<!--                            <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" required>-->
<!--                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>-->
<!--                            <div class="valid-feedback mv-up">You selected a gender!</div>-->
<!--                            <div class="invalid-feedback mv-up">Please select a gender!</div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-check">-->
<!--                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>-->
<!--                            <label class="form-check-label">I confirm that all data are correct</label>-->
<!--                            <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="form-button mt-3">-->
<!--                            <button id="submit" type="submit" class="btn btn-primary">Register</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

