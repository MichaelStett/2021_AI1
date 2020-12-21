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
}();

const [filterDataInInvoiceSaleIndexTable,changePageInInvoiceSaleIndexTable] = function () {
    const tBody = document.querySelector('#invoiceSaleIndexTable tbody');
    const actualPosition ={
        firstShowed: 0,
        firstHiddenAfter: tBody.children.length
    };
    // ,lastPosition = {
    //     firstShowed: 0,
    //     firstHiddenAfter: 0
    // };
    var actualFilteredCount = 0, actualPage = 1;
    const searchForm = document.forms['invoiceSaleIndexSearchForm'];
    const errorDiv = document.getElementById("errorDisplayField");
    const navBtn = {
        last: document.getElementById("invoiceSaleIndexNavLast"),
        next: document.getElementById("invoiceSaleIndexNavNext"),
        first: document.getElementById("invoiceSaleIndexNavFirst"),
        prev: document.getElementById("invoiceSaleIndexNavPrev"),
        //input: document.getElementById("invoiceSaleIndexNavPageSelector").firstElementChild
    };

    const generateRow = function (args) {
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

    return [function () {
        if ( !searchForm["SearchFormContractorName"].checkValidity() || (searchForm["SearchFormContractorName"].value.length > 0
            && searchForm["SearchFormContractorName"].value.length <= 2) ||
            !searchForm["SearchFormStartDate"].checkValidity() || !searchForm["SearchFormEndDate"].checkValidity() ||
            !searchForm["SearchFormInvoiceNumber"].checkValidity() || (searchForm["SearchFormInvoiceNumber"].value.length > 0
                && searchForm["SearchFormInvoiceNumber"].value.length <= 2) ||
            !searchForm["SearchFormVatID"].checkValidity() || (searchForm["SearchFormVatID"].value.length > 0
                && searchForm["SearchFormVatID"].value.length <= 2)
        ) return;

        let query = (searchForm["SearchFormContractorName"].value !== "" ? "&name="+ searchForm["SearchFormContractorName"].value : "")+
            (searchForm["SearchFormStartDate"].value !== "" ? "&dateAddStart="+ searchForm["SearchFormStartDate"].value : "")+
            (searchForm["SearchFormEndDate"].value !== "" ? "&dateAddEnd="+ searchForm["SearchFormEndDate"].value : "")+
            (searchForm["SearchFormInvoiceNumber"].value !== "" ? "&invoiceNumber="+ searchForm["SearchFormInvoiceNumber"].value : "")+
            (searchForm["SearchFormVatID"].value !== "" ? "&vatID="+ searchForm["SearchFormVatID"].value : "");
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
            // actualPosition.firstShowed = lastPosition.firstShowed;
            // actualPosition.firstHiddenAfter = lastPosition.firstHiddenAfter;

        } else {
            fetch("index.php?action=invoiceSale-filter"+query, {
                method: 'GET',
                mode: 'cors',
                referrerPolicy: 'no-referrer'
            })
            .then(response => response.json())
            .then(data => {
                let tableRows = tBody.children;

                if( data === undefined || data.length === 0) {
                    throw "empty data";
                    // if (lastPosition.firstShowed !== 0 || lastPosition.firstHiddenAfter !== 0) {
                    //     actualPosition.firstShowed = lastPosition.firstShowed;
                    //     actualPosition.firstHiddenAfter = lastPosition.firstHiddenAfter;
                    // }
                }else {
                    for (let i = 0; i < actualFilteredCount; i++) {
                        tBody.removeChild(tableRows[0]);
                    }
                    tableRows = tBody.children;
                    for (let i = actualPosition.firstShowed; i < actualPosition.firstHiddenAfter; i++) {
                        tableRows[i].style.display = "none";
                    }
                    // if (actualPosition.firstShowed !== 0 || actualPosition.firstHiddenAfter !== 0) {
                    //     lastPosition.firstShowed = actualPosition.firstShowed;
                    //     lastPosition.firstHiddenAfter = actualPosition.firstHiddenAfter;
                    //     actualPosition.firstShowed = 0;
                    //     actualPosition.firstHiddenAfter = 0;
                    // }
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
                for (let i = lastPosition.firstShowed; i < lastPosition.firstHiddenAfter; i++) {
                    tableRows[i].style.display = "table-row";
                }
                actualFilteredCount = 0;
            });
        }

    },
        function (arg) {
            if ( arg === undefined || actualFilteredCount != 0) return;
            //if (actualPosition.firstShowed === 0 && actualPosition.firstHiddenAfter === 0 ) return;


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

            fetch("index.php?action=invoiceSale-more&page="+actualPage, {
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

function ready(fn) {
    if (document.readyState != 'loading'){
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}
