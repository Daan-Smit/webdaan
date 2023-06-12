export function checkUrl(errorName) {
    const url = window.location.search;
    const urlParams = new URLSearchParams(url);
    return urlParams.has(errorName);
}

export function setMsg(element, type, message, phpError) {
    let el = element;
    let elMsg = document.getElementById(element.id + 'Msg');
    if (elMsg.innerHTML === '' && phpError === false) {
        el.classList.add(type);
        elMsg.classList.add(type);
        elMsg.innerHTML = message;
    } else if (elMsg.innerHTML !== '' && phpError === false) {
        elMsg.innerHTML = message;
    } else if (elMsg.innerHTML === '' && phpError === true) {
        elMsg.classList.add(type);
        elMsg.innerHTML = message;
    } else if (elMsg.innerHTML !== '' && phpError === true) {
        if (elMsg.innerHTML === message) {
            elMsg.innerHTML = message;
        } else {
            let lines = elMsg.innerHTML.split('<br>');
            if (lines.length > 1) {
                elMsg.innerHTML = lines[0] + '<br>' + message;
            } else {
                elMsg.innerHTML = message;
            }
        }
    }
}

// If there are no errors set message box to empty
// First check if there is no URL parameter because that message has to stay
export function unsetMsg(element, phpError) {
    let elMsg = document.getElementById(element.id + 'Msg');
    if (phpError === true) {
        let lines = elMsg.innerHTML.split('<br>');
        if (lines.length > 1) {
            elMsg.innerHTML = lines[0];
        } else {
            elMsg.innerHTML = '';
        }
    } else {
        elMsg.innerHTML = '';
    }
}

export function emptyInput(element) {
    return !element.value;
}

export function validateEmail(element) {
    let el = element;
    const emailRegex =  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (el.value.includes('@')) {
        return !emailRegex.test(el.value);
    }
}

export function validateUsername(element) {
    let el = element;
    const usernameRegex =  /^[a-zA-Z0-9-_]*$/;
    return !usernameRegex.test(el.value);
}

export function validatePwd(password, passwordRepeat) {
    let pwd, pwdR;
    pwd = document.getElementById(password);
    pwdR = document.getElementById(passwordRepeat);
    if (pwd.value !== '' && pwdR.value !== '') {
        if (pwd.value !== pwdR.value) {
            return true;
        }
    }
    return false;
}
