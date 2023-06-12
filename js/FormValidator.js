export default class FromValidator {
    constructor(selector) {
        this.form = document.querySelector(selector);
        this.inputsWithErrors = new Set();

        this.form.addEventListener('submit', e => {
            if (this.hasErrors) {
                e.preventDefault();
            }
        })
    }

    get hasErrors() {
        return this.inputsWithErrors.size > 0;
    }

    register(selector, check) {
        const inputField = this.form.querySelector(selector);
        const errorElement = inputField.nextElementSibling;

        const execute = (hideErrors) => {
            const { pass, error } = check(inputField.value, inputField);

            if (!hideErrors) {
                errorElement.textContent = error || "";
            }

            if (!pass) {
                this.inputsWithErrors.add(inputField.name);
            } else {
                this.inputsWithErrors.delete(inputField.name);
            }

        };

        inputField.addEventListener("blur", () => execute());
        execute(true);
    }

    emptyInput(element) {
        return !element.value;
    }

    validateEmail(element) {
        const emailRegex =  /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/i;
        if (!element.value.includes('@')) {
            return false;
        }
        return !emailRegex.test(element.value);
    }

    validateUsername(element) {
        const usernameRegex =  /^[a-zA-Z0-9-_]*$/;
        if (element.value.includes('@')) {
            return false;
        }
        return !usernameRegex.test(element.value);
    }

    validatePwd(password, passwordR) {
        const pwd = this.form.querySelector(password);
        const pwdR = this.form.querySelector(passwordR);

        // Als een van beide lees is gebeurt er niks
        if (!pwdR.value || !pwd.value) {
            return false;
        }

        if (pwd.value !== pwdR.value) {
            // if (activeInputField === pwd) {
            //
            // }
            // if (activeInputField === pwdR) {
            //
            // }
            console.log('zijn niet gelijk');
        }


        console.log(this.inputsWithErrors);
        return false;
    }

    maxChars(value, maxLength) {
        return value.length > maxLength;
    }
}