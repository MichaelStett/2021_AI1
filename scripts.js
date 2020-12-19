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

const changeDataInInvoiceSaleIndexModal = function (){
    const modalTable = document.querySelectorAll('#invoiceSaleIndexModalTable td');

    return function (args){
        if (args.length === 9) {
            for (let i = 0; i < 8; i++) {
                modalTable[i].innerText = args[i];
            }
            modalTable[7].previousElementSibling.innerText = "Kwotta netto ("+args[8]+")";
        }
    }
}();

function ready(fn) {
    if (document.readyState != 'loading'){
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}
