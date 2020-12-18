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
            echo '<th scope="row">'.$val->getTaxId().'</th>';
            echo '<td>'.$val->getContractorName().'</td>';
            echo '<td>'.$val->getAddDate().'</td>';
            echo '<td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick="javascript:changeDataInInvoiceSaleIndexModal('.
                $val->getInvoiceNumber().','
                .$val->getContractorName().','
                .$val->getTaxId().','
                .$val->getAddDate().','
                .$val->getAmountNet().','
                .$val->getAmountGross().','
                .$val->getAmountTax().','
                .$val->getAmountNetCurrencyValue().','
                .$val->getAmountNetCurrency()
                .')"></button></td>';
        }
        $result = ob_get_clean();

        echo InvoiceSaleIndexView::render($result);
        return;
    }


}
?>