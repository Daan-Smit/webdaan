import * as func from './functions.js';
import {emptyInput, validateEmail} from "./functions.js";

// Initialize variables
let elName, elPwd, elForm, urlError;
elName = document.getElementById('loginName');
elPwd = document.getElementById('loginPwd');
elForm = document.getElementById('loginForm');
urlError = func.checkUrl('error');

// If there is a URL parameter first fill in these error messages
if (urlError) {
    // Get url param called 'error'
    const url = window.location.search;
    const urlParams = new URLSearchParams(url);
    const errorName = urlParams.get('error');

    // Set message depending on the error value
    if (errorName === 'emptyinput') {
        func.setMsg(elForm, 'error', 'Vul alle velden in!', urlError);
    }
    if (errorName === 'wronglogin') {
        func.setMsg(elForm, 'error', 'Verkeerde login gegevens!', urlError);
    }
    if (errorName === 'nouser') {
        func.setMsg(elName, 'error', DOMPurify.sanitize(elName.value) + ' bestaat niet!', urlError);
    }
    if (errorName === 'stmtfailed') {
        func.setMsg(elForm, 'error', 'Er is iets fout gegaan, probeer het later opnieuw!', urlError);
    }
}

elName.addEventListener('blur', function() {
    if (emptyInput(elName) !== false) {
        func.setMsg(elName, 'error', 'Vul een gebruikersnaam of e-mail in!', urlError);
        return;
    }
    if (validateEmail(elName) !== false) {
        func.setMsg(elName, 'error', DOMPurify.sanitize(elName.value) + ' is geen geldige e-mail!', urlError);
        return;
    }

    func.unsetMsg(elName, urlError);
}, false)

elPwd.addEventListener('blur', function() {
    if (emptyInput(elPwd) !== false) {
        func.setMsg(elPwd, 'error', 'Vul een wachtwoord in!', urlError);
        return;
    }
    func.unsetMsg(elPwd, urlError);
}, false)

// Check everything again before submitting to PHP
elForm.addEventListener('submit', function(e) {
    if (func.emptyInput(elName) !== false) {
        func.setMsg(elName, 'error', 'Vul een gebruikersnaam of e-mail in!', urlError);
        e.preventDefault();
        return;
    }
    if (func.emptyInput(elPwd) !== false) {
        func.setMsg(elPwd, 'error', 'Vul een wachtwoord in!', urlError);
        e.preventDefault();
    }
}, false);