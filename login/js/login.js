import FromValidator from "../../js/FormValidator.js";
import ServerValidator from "../../js/ServerValidator.js";

// start of server validator
const sv = new ServerValidator('error');

sv.setError('#serverError', errorName => {
    if (errorName === 'emptyinput') {
        return {
            pass: false,
            error: "Vul alle velden in!"
        };
    }
    if (errorName === 'nouser') {
        return {
            pass: false,
            error: "Geen gebruiker gevonden!"
        };
    }
    if (errorName === 'wronglogin') {
        return {
            pass: false,
            error: "Inlog gegevens zijn incorrect!"
        };
    }
    if (errorName === 'stmtfailed') {
        return {
            pass: false,
            error: "Er is iets fout gegaan, probeer het later opnieuw!"
        };
    }

    return {
        pass: true
    };
});

// start of form validator
const fv = new FromValidator('#loginForm');

fv.register('#loginName', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
       return {
           pass: false,
           error: "Vul een gebruikersnaam of e-mail in!"
       };
    }
    if (fv.validateEmail(inputField) !== false)  {
        return {
            pass: false,
            error: DOMPurify.sanitize(value) + " is geen geldige e-mail!"
        };
    }
    if (fv.validateUsername(inputField) !== false)  {
        return {
            pass: false,
            error: DOMPurify.sanitize(value) + " is geen geldige gebruikersnaam! Gebruik alleen letters, cijfers en - of _!"
        };
    }

    return {
       pass: true
    };
});

fv.register('#loginPwd', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
        return {
            pass: false,
            error: "Vul een wachtwoord in!"
        };
    }

    return {
        pass: true
    };
});