<?php
require_once __DIR__ . '/../../autoload.php';

class invoiceSaleIndexView
{

    public static function render($id,$recordsMainTable)
    {
        ob_start();
        ?>
        <?= Layout::header() ?>

            <!-- Modal -->
            <div class="modal fade" id="<?= $id ?>Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Szczegóły</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="<?= $id ?>ModalTable" class="table table-striped">
                                <tbody>
                                <tr>
                                    <th scope="row">Nr Fv</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nazwa kotrahenta</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">VAT ID</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Data dodania</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota netto</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota brutto</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota podatku VAT</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota netto (waluta)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Plik</th>
                                    <td><a class="btn" href="#"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col"></div>

                <div class="col-md col-md-auto">
                    <div id="<?= $id ?>SearchBox" class="my-search-box">
                        <form id="<?= $id ?>SearchForm">
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-md-12">
                                    <label for="SearchFormContractorName">Kontrahent</label>
                                    <input id="SearchFormContractorName" maxlength="30" type="text" class="form-control" pattern="^[\d\w]*$" placeholder="FirmaXYZ" oninput="filterDataInInvoiceSaleIndexTable();">
                                </div>

                                <div class="form-group col-lg-3  col-md-6">
                                    <label for="SearchFormStartDate">Od</label>
                                    <input id="SearchFormStartDate" type="date" class="form-control" oninput="filterDataInInvoiceSaleIndexTable();">
                                </div>
                                <div class="form-group col-lg-3  col-md-6">
                                    <label for="SearchFormEndDate">Do</label>
                                    <input id="SearchFormEndDate" type="date" class="form-control" oninput="filterDataInInvoiceSaleIndexTable();">
                                </div>

                                <div class="form-group col-lg-6  col-md-6">
                                    <label for="SearchFormInvoiceNumber">Numer FV</label>
                                    <input id="SearchFormInvoiceNumber" maxlength="15" type="text" class="form-control" pattern="^\d*$" placeholder="123456" oninput="filterDataInInvoiceSaleIndexTable();">
                                </div>
                                <div class="form-group col-lg-6  col-md-6">
                                    <label for="SearchFormVatID">Vat ID</label>
                                    <input id="SearchFormVatID" maxlength="15" type="text" class="form-control" pattern="^\d*$" placeholder="123456" oninput="filterDataInInvoiceSaleIndexTable();">
                                </div>
                            </div>
<!--                                <button type="submit" class="btn btn-primary">Search</button>-->
                        </form>
                    </div>
                </div>

                <div class="col"></div>
            </div>

            <div class="row">
                <div class="col"></div>

                <div class="col-md col-md-auto">
                    <div id="invoice-sale-index" class="my-form-box">

                        <div id="errorDisplayField" class="alert alert-info" style="display: none">
                            Brak wyników dla wyszukiwania!
                        </div>

                        <table id="<?= $id ?>Table" class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nr Fv</th>
                                <th scope="col">Nazwa kotrahenta</th>
                                <th scope="col">Data dodania</th>
                                <th scope="col" class="showDataIndexTableWider">VAT ID</th>
                                <th scope="col" class="showDataIndexTableWider">Kwota netto</th>
                                <th scope="col" class="showDataIndexTableWider">Kwota brutto</th>
                                <th scope="col" class="showDataIndexTableWider">Kwota podatku VAT</th>
                                <th scope="col" class="showDataIndexTableWider">Kwota netto (waluta)</th>
                                <th scope="col" class="showDataIndexTableTight">Szczegóły</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($recordsMainTable as $val) {
                                        echo '<tr>';
                                        echo '<th scope="row">'.$val->getInvoiceNumber().'</th>';
                                        echo '<td class="invoiceSaleIndexTableContractorName">'.$val->getName().'</td>';
                                        echo '<td class="invoiceSaleIndexTableAddDate">'.$val->getAddDate().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getVatID().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountNet().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountGross().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountTax().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountNetCurrencyValue().' ('.$val->getAmountNetCurrency().')</td>';
                                        echo '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInInvoiceSaleIndexModal('
                                            .json_encode($val)
                                            .');\'>...</a></td>';
                                        echo '<td class="showDataIndexTableWider"><a class="btn" href="index.php?action=getFile&fileType=invoiceSale&fileNumber='
                                            .$val->getId()
                                            .'"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>';
                                        echo '</tr>';
                                }
                                ?>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="col"></div>
            </div>

        <?= Layout::footer() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
?>