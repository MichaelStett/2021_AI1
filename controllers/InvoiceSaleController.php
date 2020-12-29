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

        echo invoiceSaleIndexView::render($records, ceil($numOfRecords/self::$limit));
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

        $invoiceSaleRepository = new InvoiceSaleRepository();

        $records = $invoiceSaleRepository->findBy($params);

        header('Content-type: application/json');
        return  json_encode($records) ;
    }


}
?>