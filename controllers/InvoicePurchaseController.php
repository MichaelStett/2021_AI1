<?php

require_once __DIR__ . '/../autoload.php';

class InvoicePurchaseController
{
    private static $limit = 3;

    public static function index()
    {
        $invoicePurchaseRepository = new InvoicePurchaseRepository();

        $records = $invoicePurchaseRepository->getAll(self::$limit);
        $numOfRecords = $invoicePurchaseRepository->getNumberOfRecords();

        echo InvoicePurchaseIndexView::render($records, ceil($numOfRecords/self::$limit));
    }

    /**
     * @return false|string
     * @throws Exception
     */
    public static function moreData() {
        if(!isset($_GET["page"])) {
            return "";
        }
        $page = htmlspecialchars($_GET["page"]);

        //$page = 1;
        if (!is_numeric($page)) {
            return "";
        }
        $page = ceil($page);
        //return $page;

        $invoicePurchaseRepository = new InvoicePurchaseRepository();

        $numOfPages = ceil($invoicePurchaseRepository->getNumberOfRecords()/self::$limit);
        $records = $page == 0 ? $invoicePurchaseRepository->getAll(0) : $invoicePurchaseRepository->getAll(self::$limit*$page);
        if ( $page == 0) {
            $records = array_slice($records,  self::$limit*($numOfPages));
        } else {
            $records = array_slice($records,  self::$limit*($page-1),self::$limit);
        }

        return  json_encode(array('data' => $records,'numOfAllPage' => $numOfPages));
    }

    /**
     * @param string[] $params
     * @return array
     */
    private static function filterGetParameters($params) {
        $retParams = [];
        foreach ($params as $val) {
            if(isset($_GET[$val])) {
                $retParams[$val] = htmlspecialchars($_GET[$val]);
            }
        }
        return $retParams;
    }

    /**
     * @return false|string
     * @throws Exception
     */
    public static function filterData() {
        $getparamNames = array("id","invoiceNumber","vatID","name","dateAddStart","dateAddEnd");

        $params = self::filterGetParameters($getparamNames);

        $invoicePurchaseRepository = new InvoicePurchaseRepository();

        $records = $invoicePurchaseRepository->findBy($params);

        header('Content-type: application/json');
        return  json_encode($records) ;
    }

    public static function add()
    {
        echo InvoiceSaleFormView::render();
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
                invoiceSaleToDB::insertToDB($_POST['invoiceNumber'], $_POST['vatID'], $_POST['amountNet'], $_POST['amountGross'],
                    $_POST['amountTax'], $currencyName, $_POST['amountNettCurrency'], $_POST['addDate']);
                global $x;
                $x = 5;
            }
            else{
                echo '<script>alert("Podano złe dane")</script>';
            }
        }
        if(isset($_POST['submit']) and $x == 5){
            invoiceSaleToDB::fileUpload($_POST['invoiceNumber']);
        }
    }
}
