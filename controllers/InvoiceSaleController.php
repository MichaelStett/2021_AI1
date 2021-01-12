<?php
require_once __DIR__ . '/../autoload.php';

class InvoiceSaleController
{
    private static $limit = 5;
    /**
     * @throws Exception
     */
    public static function index() {
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo "You are not logged in." . PHP_EOL;
            echo LoginIndexView::render();
            return;
        }

        $invoiceSaleRepository = new InvoiceSaleRepository();

        $records = $invoiceSaleRepository->getAll(self::$limit);
        $numOfRecords = $invoiceSaleRepository->getNumberOfRecords();

        echo invoiceSaleIndexView::render($records, ceil($numOfRecords/self::$limit));
    }

    /**
     * @return false|string
     * @throws Exception
     */
    public static function moreData() {
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo "You are not logged in." . PHP_EOL;
            echo LoginIndexView::render();
            return;
        }

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

        $invoiceSaleRepository = new InvoiceSaleRepository();

        $numOfPages = ceil($invoiceSaleRepository->getNumberOfRecords()/self::$limit);
        $records = $page == 0 ? $invoiceSaleRepository->getAll(0) : $invoiceSaleRepository->getAll(self::$limit*$page);
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
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo "You are not logged in." . PHP_EOL;
            echo LoginIndexView::render();
            return;
        }

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
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo "You are not logged in." . PHP_EOL;
            echo LoginIndexView::render();
            return;
        }

        $getparamNames = array("id","invoiceNumber","vatID","name","dateAddStart","dateAddEnd");

        $params = self::filterGetParameters($getparamNames);

        $invoiceSaleRepository = new InvoiceSaleRepository();

        $records = $invoiceSaleRepository->findBy($params);

        header('Content-type: application/json');
        return  json_encode($records) ;
    }

    public static function add() {
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo "You are not logged in." . PHP_EOL;
            echo LoginIndexView::render();
            return;
        }

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

            echo $x;

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
