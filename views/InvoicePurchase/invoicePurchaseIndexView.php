<?php
require_once __DIR__ . '/../../autoload.php';

class invoicePurchaseIndexView
{

    /**
     * @param array $recordsMainTable Dane do głównej tabeli, wiersze
     * @param int $numberOfRecordsInDB Liczba wszystkich rekordów
     * @param array $reportData Dane do raportów danej sekcji
     * @return false|string
     */
    public static function render( $recordsMainTable, $numberOfRecordsInDB, $reportData = [])
    {
        $id = "invoicePurchaseIndex";
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
                        <form id="<?= $id ?>SearchForm_">
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-md-12">
                                    <label for="SearchForm_name">Kontrahent</label>
                                    <input id="SearchForm_name" maxlength="30" type="text" class="form-control" pattern="^[\d\w]*$" placeholder="FirmaXYZ" onfocusout="filterDataInInvoiceSaleIndexTable();">
                                </div>

                                <div class="form-group col-lg-3  col-md-6">
                                    <label for="SearchForm_dateAddStart">Od</label>
                                    <input id="SearchForm_dateAddStart" type="date" class="form-control" oninput="filterDataInInvoiceSaleIndexTable();">
                                </div>
                                <div class="form-group col-lg-3  col-md-6">
                                    <label for="SearchForm_dateAddEnd">Do</label>
                                    <input id="SearchForm_dateAddEnd" type="date" class="form-control" oninput="filterDataInInvoiceSaleIndexTable();">
                                </div>

                                <div class="form-group col-lg-6  col-md-6">
                                    <label for="SearchForm_invoiceNumber">Numer FV</label>
                                    <input id="SearchForm_invoiceNumber" maxlength="15" type="text" class="form-control" pattern="^\d*$" placeholder="123456" onfocusout="filterDataInInvoiceSaleIndexTable();">
                                </div>
                                <div class="form-group col-lg-6  col-md-6">
                                    <label for="SearchForm_vatID">Vat ID</label>
                                    <input id="SearchForm_vatID" maxlength="15" type="text" class="form-control" pattern="^\d*$" placeholder="123456" onfocusout="filterDataInInvoiceSaleIndexTable();">
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
                    <h1 class="title">Przeglądanie Faktur Zakupu</h1>
                </div>
                <div class="col"></div>
                <div class="w-100"></div>
                <div class="col"></div>
                <div class="col-md col-md-auto">

                    <h3 class="title">Podsumowanie</h3>
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th scope="row">Łączna wartosć brutto</th>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Łączna wartosć netto</th>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Ilość faktur</th>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Data najstarszej faktury</th>
                            <td>Mark</td>
                        </tr>
                        </tbody>
                    </table>

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
                                    $count = 0;
                                    foreach ($recordsMainTable as $val) {
                                        echo '<tr>';
                                        echo '<th scope="row">'.$val->getInvoiceNumber().'</th>';
                                        echo '<td class="invoiceSaleIndexTableContractorName">'.$val->getName().'</td>';
                                        echo '<td class="invoiceSaleIndexTableAddDate">'.$val->getDate().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->gettaxID().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountNet().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountGross().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountTax().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountNetCurrencyValue().' ('.$val->getAmountNetCurrency().')</td>';
                                        echo '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoicePurchasedIndexModal" onclick=\'changeDataInModal('
                                            .json_encode($val)
                                            .');\'>...</a></td>';
                                        echo '<td class="showDataIndexTableWider"><a class="btn" href="index.php?action=getFile&fileType=invoicePurchase&fileNumber='
                                            .$val->getId()
                                            .'"><img class="pdfIcon" src="./images/pdf_image.png"></a></td>';
                                        echo '<td class="showDataIndexTableRowId">'.$count.'</td>';
                                        echo '</tr>';
                                        $count++;
                                    }
                                ?>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <nav id="Nav" class="my-navs" aria-label="...">
                        <ul class="pagination justify-content-end">
                            <li id="NavPrev" class="page-item disabled">
                                <button class="page-link" onclick="changePageInTable('prev');" aria-disabled="true">Previous</button>
                            </li>
                            <li id="NavFirst" class="page-item disabled">
                                <button class="page-link" onclick="changePageInTable(1);" aria-disabled="true" >1</button>
                            </li>
                            <li class="page-item" aria-current="page">
                                <a id="NavPageSelector" class="page-link" href="#">
                                    <input type="number" maxlength="4" min="1" class="form-control" oninput="changePageInTable();">
                                </a>
                            </li>
                            <li id="NavLast" class="page-item">
                                <button  class="page-link" onclick="changePageInTable(parseInt(this.innerText));"><?= $numberOfRecordsInDB ?></button>
                            </li>
                            <li id="NavNext" class="page-item">
                                <button  class="page-link" onclick="changePageInTable('next');">Next</button>
                            </li>
                        </ul>
                    </nav>
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