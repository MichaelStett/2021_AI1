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

// === skrypty dla indexow wysweitlajacych dane dla wszytskich widokow


const indexPageName = function () {
    const viewsNames = ["invoiceSaleIndex","invoicePurchaseIndex","otherDocumentsIndex","licenseIndex","equipmentIndex"];
    let i = 0;
    for (; i < viewsNames.length; i++) {
        if (document.getElementById(viewsNames[i]+"Table") != undefined) {
            break;
        }
    }
    return  viewsNames[i];
}();
const searchFormName = "SearchForm_";


const changeDataInModal = function (){
    const modalTable = document.querySelectorAll('#'+indexPageName+'ModalTable td');

    switch (indexPageName) {
        case "invoiceSaleIndex":
            return function (args){
                modalTable[0].innerText = args['invoiceNumber'];
                modalTable[1].innerText = args['name'];
                modalTable[2].innerText = args['vatID'];
                modalTable[3].innerText = args['addDate'];
                modalTable[4].innerText = args['amountNet'];
                modalTable[5].innerText = args['amountGross'];
                modalTable[6].innerText = args['amountTax'];
                modalTable[7].previousElementSibling.innerText = "Kwotta netto ("+args['amountNetCurrency']+")";
                modalTable[7].innerText = args['amountNetCurrencyValue'];
                modalTable[8].firstElementChild.href = "index.php?action=getFile&fileType=invoiceSale&fileNumber="+args['id'];
            }
            break;
        case "invoicePurchasedIndex":
            return function (args){
                modalTable[0].innerText = args['invoiceNumber'];
                modalTable[1].innerText = args['name'];
                modalTable[2].innerText = args['vatID'];
                modalTable[3].innerText = args['addDate'];
                modalTable[4].innerText = args['amountNet'];
                modalTable[5].innerText = args['amountGross'];
                modalTable[6].innerText = args['amountTax'];
                modalTable[7].previousElementSibling.innerText = "Kwotta netto ("+args['amountNetCurrency']+")";
                modalTable[7].innerText = args['amountNetCurrencyValue'];
                modalTable[8].firstElementChild.href = "index.php?action=getFile&fileType=invoiceSale&fileNumber="+args['id'];
            }
            break;
        case "equipmentIndex":
            return function (args){
                modalTable[0].innerText = args['inventoryNumber'];
                modalTable[1].innerText = args['name'];
                modalTable[2].innerText = args['serialNumber'];
                modalTable[3].innerText = args['purchasedDate'];
                modalTable[4].innerText = args['invoiceNumber'];
                modalTable[5].innerText = args['warrantyUpTo'];
                modalTable[6].innerText = args['amountNet'];
                modalTable[7].innerText = args['assignedTo'];
                modalTable[8].innerText = args['notes'];
            }
            break;
        case "licenseIndex":
            return function (args){
                modalTable[0].innerText = args['inventoryNumber'];
                modalTable[1].innerText = args['name'];
                modalTable[2].innerText = args['serialNumber'];
                modalTable[3].innerText = args['purchaseDate'];
                modalTable[4].innerText = args['invoiceId'];
                modalTable[5].innerText = args['supportTo'];
                modalTable[6].innerText = args['validTo'];
                modalTable[7].innerText = args['assignedFor'];
                modalTable[8].innerText = args['notes'];
            }
            break;
        case "otherDocsIndex":
            return function (args){
                modalTable[0].innerText = args['name'];
                modalTable[1].innerText = args['docDate'];
                modalTable[2].innerText = args['numOfPages'];
                modalTable[6].innerText = args['notes'];
            }
            break;
        default:
            return function () {};
            break;
    }

}();

const [filterDataInInvoiceSaleIndexTable,changePageInInvoiceSaleIndexTable] = function () {
    const tBody = document.querySelector('#'+indexPageName+'Table tbody');
    const actualPosition ={
        firstShowed: 0,
        firstHiddenAfter: tBody.children.length
    };
    // ,lastPosition = {
    //     firstShowed: 0,
    //     firstHiddenAfter: 0
    // };
    var actualFilteredCount = 0, actualPage = 1;

    const searchForm = document.forms[indexPageName+searchFormName];
    const errorDiv = document.getElementById("errorDisplayField");
    const navBtn = {
        last: document.getElementById("NavLast"),
        next: document.getElementById("NavNext"),
        first: document.getElementById("NavFirst"),
        prev: document.getElementById("NavPrev"),
        //input: document.getElementById("invoiceSaleIndexNavPageSelector").firstElementChild
    };
    
    function validateSearchTextFields(fieldNames) {
        for (const fieldName of fieldNames) {
            if ( !searchForm[searchFormName + fieldName].checkValidity() ||
                (searchForm[searchFormName + fieldName].value.length != 0
                && searchForm[searchFormName + fieldName].value.length <= 2)) {
                return false;
            }
        }
        return true;
    }

    const generateRow = function() {
        switch (indexPageName) {
            case "invoiceSaleIndex":
                 return function (args) {
                    return '<tr>'+
                        '<th scope="row">'+args['invoiceNumber']+'</th>'+
                        '<td class="invoiceSaleIndexTableContractorName">'+args['name']+'</td>'+
                        '<td class="invoiceSaleIndexTableAddDate">'+args['addDate']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['vatID']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountNet']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountGross']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountTax']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountNetCurrencyValue']+' ('+args['amountNetCurrency']+')</td>'+
                        '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInInvoiceSaleIndexModal('+
                        JSON.stringify(args)+
                        ');\'>...</a></td>'+
                        '<td class="showDataIndexTableWider"><a class="btn" href="index+php?action=getFile&fileType=invoiceSale&fileNumber='+
                        args['id']+
                        '"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>'+
                        '</tr>';
                }
                break;
            case "invoicePurchaseIndex":
                return function (args) {
                    return '<tr>'+
                        '<th scope="row">'+args['invoiceNumber']+'</th>'+
                        '<td class="invoiceSaleIndexTableContractorName">'+args['name']+'</td>'+
                        '<td class="invoiceSaleIndexTableAddDate">'+args['addDate']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['vatID']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountNet']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountGross']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountTax']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountNetCurrencyValue']+' ('+args['amountNetCurrency']+')</td>'+
                        '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInInvoiceSaleIndexModal('+
                        JSON.stringify(args)+
                        ');\'>...</a></td>'+
                        '<td class="showDataIndexTableWider"><a class="btn" href="index+php?action=getFile&fileType=invoicePurhased&fileNumber='+
                        args['id']+
                        '"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>'+
                        '</tr>';
                }
                break;
            case "licenseIndex":
                return function (args) {
                    return '<tr>'+
                        '<th scope="row">'+args['inventoryNumber']+'</th>'+
                        '<td class="invoiceSaleIndexTableContractorName">'+args['name']+'</td>'+
                        '<td class="invoiceSaleIndexTableAddDate">'+args['serialNumber']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['purchaseDate']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['invoiceId']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['supportTo']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['validTo']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['assignedFor']+'</td>'+
                        '<td class="showDataIndexTableWider">'+"<a href=\"#\" class=\"notate-tablefield\" data-toggle=\"modal\" data-target=\"#"+indexPageName+"Modal\" onclick='changeDataInModal("+
                        JSON.stringify(args)+
                        ");'>"+args['notes']+"</a></td>"+
                        '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInModal('+
                        JSON.stringify(args)+
                        ');\'>...</a></td>'+
                        '</tr>';
                }
                break;
            case "equipmentIndex":
                return function (args) {
                    return '<tr>'+
                        '<th scope="row">'+args['inventoryNumber']+'</th>'+
                        '<td class="invoiceSaleIndexTableContractorName">'+args['name']+'</td>'+
                        '<td class="invoiceSaleIndexTableAddDate">'+args['serialNumber']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['purchasedDate']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['invoiceNumber']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['warrantyUpTo']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['amountNet']+'</td>'+
                        '<td class="showDataIndexTableWider">'+args['assignedTo']+'</td>'+
                        '<td class="showDataIndexTableWider">'+"<a href=\"#\" class=\"notate-tablefield\" data-toggle=\"modal\" data-target=\"#"+indexPageName+"Modal\" onclick='changeDataInModal("+
                        JSON.stringify(args)+
                        ");'>"+args['notes']+"</a></td>"+
                        '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInInvoiceSaleIndexModal('+
                        JSON.stringify(args)+
                        ');\'>...</a></td>'+
                        '</tr>';
                }
                break;
            case "otherDocsIndex":
                return function (args) {
                    return '<tr>'+
                        '<th scope="row">'+args['name']+'</th>'+
                        '<td class="invoiceSaleIndexTableContractorName">'+args['docDate']+'</td>'+
                        '<td class="invoiceSaleIndexTableAddDate">'+args['numOfPages']+'</td>'+
                        '<td class="showDataIndexTableWider">'+"<a href=\"#\" class=\"notate-tablefield\" data-toggle=\"modal\" data-target=\"#"+indexPageName+"Modal\" onclick='changeDataInModal("+
                        JSON.stringify(args)+
                        ");'>"+args['notes']+"</a></td>"+
                        '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInInvoiceSaleIndexModal('+
                        JSON.stringify(args)+
                        ');\'>...</a></td>'+
                        '<td class="showDataIndexTableWider"><a class="btn" href="index+php?action=getFile&fileType=otherDoc&fileNumber='+
                        args['id']+
                        '"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>'+
                        '</tr>';
                }
                break;
            default:
                return function (args) { throw "not recognized type of index"; };
        }
    }();

    const reqFieldNames = function () {
        switch (indexPageName) {
            case "invoiceSaleIndex":
                return ["name","invoiceNumber","vatID","dateAddStart","dateAddEnd"];
                break;
            case "otherDocsIndex":
                return ["name","dateAddStart","dateAddEnd"];
                break;
            case "equipmentIndex":
                return ["inventoryNumber","serialNumber"];
                break;
            case "invoicePurchasedIndex":
                return ["name","invoiceNumber","vatID","dateAddStart","dateAddEnd"];
                break;
            case "licenseIndex":
                return ["name"];
                break;
        }
    }();


    return [function () {
        if ( !validateSearchTextFields(reqFieldNames) ) return;

        let query = "";
        for (const reqFieldName of reqFieldNames) {
            if (searchForm[searchFormName + reqFieldName].value !== "") {
                query += "&"+reqFieldName+"="+ searchForm[searchFormName + reqFieldName].value;
            }
        }

        if (query === "") {
            let tableRows = tBody.children;
            for (let i = 0; i < actualFilteredCount; i++) {
                tBody.removeChild(tableRows[0]);
            }
            tableRows = tBody.children;
            for (let i = actualPosition.firstShowed; i < actualPosition.firstHiddenAfter; i++) {
                tableRows[i].style.display = "table-row";
            }
            actualFilteredCount = 0;


        } else {
            fetch("index.php?action="+indexPageName.slice(0,-5)+"-filter"+query, {
                method: 'GET',
                mode: 'cors',
                referrerPolicy: 'no-referrer'
            })
            .then(response => response.json())
            .then(data => {
                let tableRows = tBody.children;

                if( data === undefined || data.length === 0) {
                    throw "empty data";

                }else {
                    for (let i = 0; i < actualFilteredCount; i++) {
                        tBody.removeChild(tableRows[0]);
                    }
                    tableRows = tBody.children;
                    for (let i = actualPosition.firstShowed; i < actualPosition.firstHiddenAfter; i++) {
                        tableRows[i].style.display = "none";
                    }
                    actualFilteredCount = data.length;
                    for (let i = actualFilteredCount-1; i >= 0; i--) {
                        tBody.insertAdjacentHTML('afterbegin',generateRow(data[i]));
                    }

                }
            })
            .catch(err => {
                console.log(err);
                errorDiv.style.display = "block";
                setTimeout(() => {
                    errorDiv.style.display = "none";
                },3000);

                for (let i = 0; i < actualFilteredCount; i++) {
                    tBody.removeChild(tableRows[0]);
                }
                tableRows = tBody.children;
                for (let i = actualPosition.firstShowed; i < actualPosition.firstHiddenAfter; i++) {
                    tableRows[i].style.display = "table-row";
                }
                actualFilteredCount = 0;
            });
        }

    },
        function (arg) {
            if ( arg === undefined || actualFilteredCount != 0) return;

            if ( arg === "prev") {
                if ( actualPage === 1) return;
                actualPage -= 1;
            } else if ( arg === "next") {
                if ( actualPage === 0) return;
                actualPage += 1;
            } else if ( typeof arg === "number") {
                actualPage = arg;
            } else {
                return;
            }

            fetch("index.php?action="+indexPageName.slice(0,-5)+"-more&page="+actualPage, {
                method: 'GET',
                mode: 'cors',
                referrerPolicy: 'no-referrer'
            })
                .then(response => response.json())
                .then(data => {
                    if (!data) throw "empty data";

                    navBtn.last.firstElementChild.innerText = data['numOfAllPage'];
                    if (actualPage === data['numOfAllPage']) {
                        navBtn.last.classList.add("disabled");
                        navBtn.next.classList.add("disabled");
                    } else if ( actualPage === 1) {
                        navBtn.prev.classList.add("disabled");
                        navBtn.first.classList.add("disabled");
                    } else {
                        navBtn.first.classList.remove("disabled");
                        navBtn.prev.classList.remove("disabled");
                        navBtn.last.classList.remove("disabled");
                        navBtn.next.classList.remove("disabled");
                    }
                    tableRows = tBody.children;
                    const len = tableRows.length;
                    for (let i = 0; i < len; i++) {
                        tBody.removeChild(tableRows[0]);
                    }
                    tableRows = tBody.children;
                    for (let i = data['data'].length-1; i >= 0; i--) {
                        tBody.insertAdjacentHTML('afterbegin',generateRow(data['data'][i]));
                    }

                })
                .catch(err => {
                    console.log(err);
                });
        }
    ];
}();

// =============================================================

function ready(fn) {
    if (document.readyState != 'loading'){
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}
