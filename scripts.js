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
        //args = JSON.parse(args);
        if (args.length === 10) {
            for (let i = 0; i < 8; i++) {
                modalTable[i].innerText = args[i+1];
            }
            modalTable[7].previousElementSibling.innerText = "Kwotta netto ("+args[args.length - 1]+")";
            modalTable[8].firstElementChild.href = "index.php?action=getFile&fileType=showData&fileNumber="+args[0];
        }
    }
}();

const filterDataInInvoiceSaleIndexTable = function () {
    const contractorNameAttributes = document.querySelectorAll('#invoiceSaleIndexModalTable tbody tr');
    //const dateAddAttributes = document.querySelectorAll('#invoiceSaleIndexModalTable td.invoiceSaleIndexTableAddDate');

    return function (contractorName,dateAddStart,dateAddEnd) {
        if (contractorName.length >= 2 && dateAddStart !== undefined && dateAddEnd !== undefined) {

        } else if (contractorName.length >= 2) {

        } else  if (dateAddStart !== undefined && dateAddEnd !== undefined) {

        } else {

        }
    }
}

function ready(fn) {
    if (document.readyState != 'loading'){
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}
