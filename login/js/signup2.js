import * as func from './functions.js';

// Initialize variables
let elFirstname, elMiddlename, elLastname, elUsername, elEmail, elPwd, elPwdRepeat, elForm, urlError;
elFirstname = document.getElementById('signupFirstname');
elMiddlename = document.getElementById('signupMiddlename');
elLastname = document.getElementById('signupLastname');
elUsername = document.getElementById('signupUsername');
elEmail = document.getElementById('signupEmail');
elPwd = document.getElementById('signupPwd');
elPwdRepeat = document.getElementById('signupPwdRepeat');
elForm = document.getElementById('signupForm');
urlError = func.checkUrl('error');

// If there is a URL parameter first fill in these error messages
if (urlError) {
    // Get url param called 'error'
    const url = window.location.search;
    const urlParams = new URLSearchParams(url);
    const errorName = urlParams.get('error');

    // Set message depending on the error value
    if (errorName === 'emptyinput') {
        func.setMsg('signupForm', 'error', 'Vul alle velden in!', urlError);
    }
    if (errorName === 'invaliduid') {
        func.setMsg('signupUsername', 'error', 'Gebruik alleen letters, cijfers en - of _!', urlError);
    }
    if (errorName === 'usernametaken') {
        func.setMsg('signupUsername', 'error', DOMPurify.sanitize(elUsername.value) + ' is al in gebruik!', urlError);
    }
    if (errorName === 'invalidemail') {
        func.setMsg('signupEmail', 'error', DOMPurify.sanitize(elEmail.value) + ' is geen geldige e-mail!', urlError);
    }
    if (errorName === 'nomatch') {
        func.setMsg('signupForm', 'error', 'Wachtwoorden komen niet overeen!', urlError);
    }
    if (errorName === 'stmtfailed') {
        func.setMsg('signupForm', 'error', 'Er is iets fout gegaan, probeer het later opnieuw!', urlError);
    }
}

// Check everything again before submitting to PHP
elForm.addEventListener('submit', function(e) {
    let error;
    let elements = [elFirstname, elLastname, elUsername, elEmail, elPwd, elPwdRepeat];
    elements.forEach(element => {
        if (func.emptyInput(element.id) !== false) {
            func.setMsg(element.id, 'error', 'Verplicht veld!', urlError);
            error = true;
        }
    });

    // After check for empty fields
    if (func.validateUsername('signupUsername') !== false) {
        func.setMsg('signupUsername', 'error', 'Gebruik alleen letters, cijfers en - of _!', urlError);
        error = true;
    }

    if (func.validateEmail('signupEmail') !== false) {
        func.setMsg('signupEmail', 'error', DOMPurify.sanitize(elEmail.value) + ' is geen geldige e-mail!', urlError);
        error = true;
    }

    if (func.validatePwd('signupPwd' ,'signupPwdRepeat') !== false) {
        func.setMsg('signupForm', 'error', 'Wachtwoorden komen niet overeen!', urlError);
        error = true;
    }
    if (error === true) {
        e.preventDefault();
    }
}, false);