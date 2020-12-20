<?php
require_once __DIR__ . '/../autoload.php';

class InvoiceSaleController
{
    public static function index()
    {
        $invoiceSaleRepository = new InvoiceSaleRepository();

        $records = $invoiceSaleRepository->getAll();

        echo invoiceSaleIndexView::render("invoiceSaleIndex",$records);
        return;
    }

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