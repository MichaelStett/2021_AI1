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
            echo '<th scope="row">'.$val->getInvoiceNumber().'</th>';
            echo '<td>'.$val->getContractorName().'</td>';
            echo '<td>'.$val->getAddDate().'</td>';
            echo '<td class="invoiceSaleIndexTableWider">'.$val->getTaxId().'</td>';
            echo '<td class="invoiceSaleIndexTableWider">'.$val->getAmountNet().'</td>';
            echo '<td class="invoiceSaleIndexTableWider">'.$val->getAmountGross().'</td>';
            echo '<td class="invoiceSaleIndexTableWider">'.$val->getAmountTax().'</td>';
            echo '<td class="invoiceSaleIndexTableWider">'.$val->getAmountNetCurrencyValue().' ('.$val->getAmountNetCurrency().')</td>';
            echo '<td class="invoiceSaleIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick="changeDataInInvoiceSaleIndexModal(['
                .$val->getInvoiceNumber().',\''
                .$val->getContractorName().'\','
                .$val->getTaxId().',\''
                .$val->getAddDate().'\','
                .$val->getAmountNet().','
                .$val->getAmountGross().','
                .$val->getAmountTax().','
                .$val->getAmountNetCurrencyValue().',\''
                .$val->getAmountNetCurrency()
                .'\']);">...</a></td>';
            echo '<td class="invoiceSaleIndexTableWider"><a class="btn" href="index.php?action=getFile&fileType=invoiceSale&fileNumber='.$val->getId().'"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>';
        }
        $result = ob_get_clean();

        echo InvoiceSaleIndexView::render($result);
        return;
    }


}
?>