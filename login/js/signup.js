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
const fv = new FromValidator('#signupForm');

fv.register('#signupFirstname', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
        return {
            pass: false,
            error: "Vul een voornaam in!"
        };
    }
    if (fv.maxChars(value, 128) !== false)  {
        return {
            pass: false,
            error: "Voornaam mag niet langer zijn dan 128 karakters!"
        };
    }

    return {
        pass: true
    };
});

fv.register('#signupMiddlename', (value, inputField) => {
    if (fv.maxChars(value, 128) !== false)  {
        return {
            pass: false,
            error: "Tussenvoegsel mag niet langer zijn dan 128 karakters!"
        };
    }

    return {
        pass: true
    };
});

fv.register('#signupLastname', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
        return {
            pass: false,
            error: "Vul een achternaam in!"
        };
    }
    if (fv.maxChars(value, 128) !== false)  {
        return {
            pass: false,
            error: "Achternaam mag niet langer zijn dan 128 karakters!"
        };
    }

    return {
        pass: true
    };
});

fv.register('#signupUsername', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
        return {
            pass: false,
            error: "Vul een gebruikersnaam in!"
        };
    }
    if (fv.maxChars(value, 128) !== false)  {
        return {
            pass: false,
            error: "Gebruikersnaam mag niet langer zijn dan 128 karakters!"
        };
    }
    if (fv.validateUsername(inputField) !== false) {
        return {
            pass: false,
            error: "Gebruik alleen letters, cijfers en - of _!"
        };
    }

    return {
        pass: true
    };
});

fv.register('#signupEmail', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
        return {
            pass: false,
            error: "Vul een e-mail in!"
        };
    }
    if (fv.maxChars(value, 128) !== false)  {
        return {
            pass: false,
            error: "E-mail mag niet langer zijn dan 128 karakters!"
        };
    }
    if (fv.validateEmail(inputField) !== false) {
        return {
            pass: false,
            error: "Vul een geldige e-mail in!"
        }
    }

    return {
        pass: true
    };
});

fv.register('#signupPwd', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
        return {
            pass: false,
            error: "Vul een wachtwoord in!"
        };
    }
    if (fv.maxChars(value, 256) !== false)  {
        return {
            pass: false,
            error: "Wachtwoord mag niet langer zijn dan 256 karakters!"
        };
    }

    return {
        pass: true
    };
});

fv.register('#signupPwdRepeat', (value, inputField) => {
    if (fv.emptyInput(inputField) !== false)  {
        return {
            pass: false,
            error: "Herhaal het gekozen wachtwoord!"
        };
    }
    if (fv.maxChars(value, 256) !== false)  {
        return {
            pass: false,
            error: "Wachtwoord mag niet langer zijn dan 256 karakters!"
        };
    }
    if (fv.validatePwd('#signupPwd', inputField.id) !== false) {
        return {
            pass: false,
            error: "Wachtwoorden komen niet overeen!"
        };
    }

    return {
        pass: true
    };
});

