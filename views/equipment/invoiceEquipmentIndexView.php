<?php
require_once __DIR__ . '/../../autoload.php';

class invoiceEquipmentIndexView
{

    /**
     * @param array $recordsMainTable
     * @param int $numberOfRecordsInDB
     * @return false|string
     */
    public static function render( $recordsMainTable, $numberOfRecordsInDB)
    {
        $id = "invoicePurchasedIndex";
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
                                    <th scope="row">Nr Inwentarzowy</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nazwa</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Numer Seryjny</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Data zakupu</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nr Faktury</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gwarancja Do</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Wartość Netto</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Przypisany do</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Notatki</th>
                                    <td></td>
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
                                    <label for="SearchForm_name">Nr Inwentarza</label>
                                    <input id="SearchForm_name" maxlength="30" type="text" class="form-control" pattern="^[\d\w]*$" placeholder="FirmaXYZ" onfocusout="filterDataInInvoiceSaleIndexTable();">
                                </div>
                                <div class="form-group col-lg-6  col-md-6">
                                    <label for="SearchForm_serialNumber">Nr seryjny</label>
                                    <input id="SearchForm_serialNumber" maxlength="15" type="text" class="form-control" pattern="^\d*$" placeholder="123456" onfocusout="filterDataInInvoiceSaleIndexTable();">
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
                                <th scope="col">Nr Inwentarzowy</th>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Numer Seryjny</th>
                                <th scope="col" class="showDataIndexTableWider">Data zakupu</th>
                                <th scope="col" class="showDataIndexTableWider">Nr Faktury</th>
                                <th scope="col" class="showDataIndexTableWider">Gwarancja Do</th>
                                <th scope="col" class="showDataIndexTableWider">Wartość Netto</th>
                                <th scope="col" class="showDataIndexTableWider">Przypisany do</th>
                                <th scope="col" class="showDataIndexTableWider">Notatki</th>
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
                                        echo '<td class="invoiceSaleIndexTableAddDate">'.$val->getAddDate().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getVatID().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountNet().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountGross().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountTax().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAmountNetCurrencyValue().' ('.$val->getAmountNetCurrency().')</td>';
                                        echo '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#invoiceSaleIndexModal" onclick=\'changeDataInModal('
                                            .json_encode($val)
                                            .');\'>...</a></td>';
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
                                <button  class="page-link" onclick="changePageInInvoiceSaleIndexTable('prev');" aria-disabled="true">Previous</button>
                            </li>
                            <li id="NavFirst" class="page-item disabled">
                                <button  class="page-link" onclick="changePageInInvoiceSaleIndexTable('1');" aria-disabled="true" >1</button>
                            </li>
                            <li class="page-item" aria-current="page">
                                <a id="NavPageSelector" class="page-link" href="#">
                                    <input type="number" maxlength="4" min="1" class="form-control" oninput="changePageInInvoiceSaleIndexTable(this.value);">
                                </a>
                            </li>
                            <li id="NavLast" class="page-item">
                                <button  class="page-link" onclick="changePageInInvoiceSaleIndexTable('0');"><?= $numberOfRecordsInDB ?></button>
                            </li>
                            <li id="NavNext" class="page-item">
                                <button  class="page-link" onclick="changePageInInvoiceSaleIndexTable('next');">Next</button>
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