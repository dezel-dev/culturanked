var passwordInput;
var confirmPasswordInput;
var charactersNotif;
var differentNotif;
var submitButton;

function registerLoad() {
    passwordInput = document.getElementById("register_passwordInput");
    confirmPasswordInput = document.getElementById("register_confirmPasswordInput");
    charactersNotif = document.getElementById("characters")
    differentNotif = document.getElementById("different")
    submitButton = document.getElementById("valider-inscription")
}

function verifPassword() {
    password = passwordInput.value;
    confirmPassword = confirmPasswordInput.value;

    disable = 0;
    charactersNotif.style.display = "none";
    differentNotif.style.display = "none";

    if (password.length < 8 && password != '') {
        charactersNotif.style.display = "flex";
        disable = 1;
    }

    if (password != confirmPassword) {
        differentNotif.style.display = "flex";
        disable = 1;
    }

    if (password == '' || confirmPassword == '') {
        disable = 1;
    }

    toggleButton(disable);
}

function toggleButton(state) {
    if (state == 1) {
        submitButton.disabled = true;
    }
    else {
        submitButton.disabled = false;
    }
}