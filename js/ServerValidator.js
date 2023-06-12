export default class ServerValidator {
    constructor(urlParameter) {
        this.errorName = this.hasError(urlParameter);
    }

    hasError = (urlParameter) => {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has(urlParameter)) {
            return urlParams.get(urlParameter);
        }
    }

    setError = (selector, errorItems) => {
        const errorElement = document.querySelector(selector);
        const { pass, error } = errorItems(this.errorName);

        errorElement.innerHTML = error || "";
        errorElement.classList.add("alert", "alert-danger");

        if (pass) {
            errorElement.classList.remove("alert", "alert-warning");
        }
    }
}