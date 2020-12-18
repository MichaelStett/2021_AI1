function validateLoginForm() {
    const patt_user = /^\D[\w]{3,16}$/;
    const patt_password = /^[\w]{3,16}$/;
    var loginForm = document.forms["loginForm"];
    if (!patt_user.test(loginForm["user-name"].value)) {
        document.getElementById('invalid-feedback-login').style.display = "block";
        return false;
    }
    document.getElementById('invalid-feedback-login').style.display = "none";
    if (!patt_password.test(loginForm["password"].value)) {
        document.getElementById('invalid-feedback-password').style.display = "block";
        return false;
    }
    document.getElementById('invalid-feedback-password').style.display = "none";
    return true;

}

function valdiate() {

}



function ready(fn) {
    if (document.readyState != 'loading'){
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}
ready(() => {
//
});
