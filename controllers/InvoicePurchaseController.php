<?php

require_once __DIR__ . '/../autoload.php';

class InvoicePurchaseController
{
    public static function index()
    {
        echo InvoicePurchaseFormView::render();
        $x = 0;
        if(isset($_POST['invoiceNumber']) and isset($_POST['vatID']) and isset($_POST['amountNet'])
            and isset($_POST['amountGross']) and isset($_POST['amountTax']) and isset($_POST['currency']) and
            isset($_POST['addDate']) and isset($_POST['amountNettCurrency'])){
            if(strlen($_POST['invoiceNumber'])>25 or !is_numeric($_POST['invoiceNumber'])) {
                global $x;
                $x = 1;
            }
            else if(strlen($_POST['vatID'])!=10 or !is_numeric($_POST['invoiceNumber'])) {
                global $x;
                $x = 1;
            }
            else if(!is_numeric($_POST['amountNet']) or !is_numeric($_POST['amountGross']) or !is_numeric($_POST['amountTax']) or !is_numeric($_POST['amountNettCurrency'])){
                global $x;
                $x = 1;
            }
            else if(!is_numeric($_POST['amountGross'])){
                global $x;
                $x = 1;
            }
            if($x == 0) {
                $currencyName = array_search($_POST['currency'],currencyEnum::currencyTable);
                InvoicePurchaseToDB::insertToDB($_POST['invoiceNumber'], $_POST['vatID'], $_POST['amountNet'], $_POST['amountGross'],
                    $_POST['amountTax'], $currencyName, $_POST['amountNettCurrency'], $_POST['addDate']);
                global $x;
                $x = 5;
            }
            else{
                echo '<script>alert("Podano złe dane")</script>';
            }
        }
        if(isset($_POST['submit']) and $x==5){
            InvoicePurchaseToDB::fileUpload($_POST['invoiceNumber']);
        }
    }
}
