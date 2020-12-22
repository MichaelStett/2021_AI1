<?php
require_once __DIR__ . '/../autoload.php';

class InvoiceSaleController
{
    private static $limit = 2;
    /**
     * @throws Exception
     */
    public static function index()
    {
        $invoiceSaleRepository = new InvoiceSaleRepository();

        $records = $invoiceSaleRepository->getAll(self::$limit);
        $numOfRecords = $invoiceSaleRepository->getNumberOfRecords();

        echo invoiceSaleIndexView::render("invoiceSaleIndex",$records, ceil($numOfRecords/self::$limit));
        return;
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
     * @return false|string
     * @throws Exception
     */
    public static function filterData() {
        $params = [];

        if(isset($_GET["id"])) {
            $params['id'] = htmlspecialchars($_GET["id"]);
        }
        if(isset($_GET["invoiceNumber"])) {
            $params['invoiceNumber'] = htmlspecialchars($_GET["invoiceNumber"]);
        }
        if(isset($_GET["vatID"])) {
            $params['vatID'] = htmlspecialchars($_GET["vatID"]);
        }
        if(isset($_GET["name"])) {
            $params['name'] = htmlspecialchars($_GET["name"]);
        }
        if(isset($_GET["dateAddStart"])) {
            $params['dateAddStart'] = htmlspecialchars($_GET["dateAddStart"]);
        }
        if(isset($_GET["dateAddEnd"])) {
            $params['dateAddEnd'] = htmlspecialchars($_GET["dateAddEnd"]);
        }

        $invoiceSaleRepository = new InvoiceSaleRepository();

        $records = $invoiceSaleRepository->findBy($params);

        header('Content-type: application/json');
        return  json_encode($records) ;
    }


}
?>