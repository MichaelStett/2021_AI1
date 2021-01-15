<?php
require_once __DIR__ . '/../../autoload.php';

class licenseIndexView
{

    /**
     * @param License[] $recordsMainTable Dane do głównej tabeli, wiersze
     * @param int $numberOfRecordsInDB Liczba wszystkich rekordów
     * @param array $reportData Dane do raportów danej sekcji
     * @return false|string
     */
    public static function render( $recordsMainTable, $numberOfRecordsInDB, $reportData = [])
    {
        $id = "licenseIndex";
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
                                    <th scope="row">Klucz seryjny</th>
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
                                    <th scope="row">Wsparcie tech. do</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Ważna do</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Przypisany do</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Notatki</th>
                                    <td class="notate-modalfield"></td>
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
                                    <label for="SearchForm_name">Nazwa</label>
                                    <input id="SearchForm_name" maxlength="30" type="text" class="form-control" pattern="^[\d\w]*$" placeholder="name" onfocusout="filterDataInInvoiceSaleIndexTable();">
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
                    <h1 class="title">Przeglądanie Licencji</h1>
                </div>
                <div class="col"></div>
                <div class="w-100"></div>
                <div class="col"></div>
                <div class="col-md col-md-auto">

                    <h3 class="title">Podsumowanie</h3>
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th scope="row">Łączna ilość licencji</th>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Ilośc licencji nie ważnych</th>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Ilośc licencji bez wsparcia</th>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Ilośc licencji nie przypisanych</th>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Data najstarszej licencji</th>
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
                                <th scope="col">Nr Inwentarzowy</th>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Klucz Seryjny</th>
                                <th scope="col" class="showDataIndexTableWider">Data zakupu</th>
                                <th scope="col" class="showDataIndexTableWider">Nr Faktury</th>
                                <th scope="col" class="showDataIndexTableWider">Wsparcie tech. Do</th>
                                <th scope="col" class="showDataIndexTableWider">Ważna do</th>
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
                                        echo '<th scope="row">'.$val->getInventoryNumber().'</th>';
                                        echo '<td class="invoiceSaleIndexTableContractorName">'.$val->getName().'</td>';
                                        echo '<td class="invoiceSaleIndexTableAddDate">'.$val->getSerialNumber().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getPurchaseDate().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getInvoiceId().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getSupportTo().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getValidTo().'</td>';
                                        echo '<td class="showDataIndexTableWider">'.$val->getAssignedFor().'</td>';
                                        echo '<td class="showDataIndexTableWider"><a href="#" class="notate-tablefield" data-toggle="modal" data-target="#'.$id.'Modal" onclick=\'changeDataInModal('
                                            .json_encode($val)
                                            .');\'>'.$val->getNotes().'</a></td>';
                                        echo '<td class="showDataIndexTableTight"><a href="#" class="badge badge-primary" data-toggle="modal" data-target="#'.$id.'Modal" onclick=\'changeDataInModal('
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