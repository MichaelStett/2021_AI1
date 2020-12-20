<?php
require_once __DIR__ . '/../autoload.php';

class InvoiceSaleController
{
    public static function index()
    {
        $invoiceSaleRepository = new InvoiceSaleRepository();

        $records = $invoiceSaleRepository->getAll();

        ob_start();
        $i = 0;
        foreach ($records as $val) {
            echo '<th scope="row">'.$val->getNumerFaktury().'</th>';
            echo '<td class="invoiceSaleIndexTableContractorName">'.$val->getNazwa().'</td>';
            echo '<td class="invoiceSaleIndexTableAddDate">'.$val->getDataDodania().'</td>';
            echo '<td class="showDataIndexTableWider">'.$val->getVatID().'</td>';
            echo '<td class="showDataIndexTableWider">'.$val->getKwotaNetto().'</td>';
            echo '<td class="showDataIndexTableWider">'.$val->getKwotaBrutto().'</td>';
            echo '<td class="showDataIndexTableWider">'.$val->getKwotaPodatku().'</td>';
            echo '<td class="showDataIndexTableWider">'.$val->getKwotaNettoWWalucie().' ('.$val->getNazwaWaluty().')</td>';
            echo '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInInvoiceSaleIndexModal('
                .$val->getStringfy()
                .');\'>...</a></td>';
            echo '<td class="showDataIndexTableWider"><a class="btn" href="index.php?action=getFile&fileType=showData&fileNumber='.$val->getId().'"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>';
        }
        $result = ob_get_clean();

        echo dataIndexView::render("invoiceSaleIndex",$result);
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
        return  json_encode($records[0]) ;
    }


}
?>