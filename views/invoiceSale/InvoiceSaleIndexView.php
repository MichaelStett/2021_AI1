<?php
require_once __DIR__ . '/../../autoload.php';

class InvoiceSaleIndexView
{

    public static function render($records)
    {
        ob_start();
        ?>
        <?= Layout::header() ?>

            <!-- Modal -->
            <div class="modal fade" id="invoiceSaleIndexModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Szczegóły</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="invoiceSaleIndexModalTable" class="table table-striped">
                                <tbody>
                                <tr>
                                    <th scope="row">Nr Fv</th>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nazwa kotrahenta</th>
                                    <td>Jacob</td>
                                </tr>
                                <tr>
                                    <th scope="row">VAT ID</th>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <th scope="row">Data dodania</th>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota netto</th>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota brutto</th>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota podatku VAT</th>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kwota netto (waluta)</th>
                                    <td>123</td>
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
                    <div id="invoice-sale-index">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nr Fv</th>
                                <th scope="col">Nazwa kotrahenta</th>
<!--                                <th scope="col">VAT ID</th>-->
                                <th scope="col">Data dodania</th>
                                <th scope="col">Szczegóły</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?= $records ?>
<!--                                <th scope="row">1</th>-->
<!--                                <td>Mark</td>-->
<!--                                <td>Otto</td>-->
<!--                                <td>-->
<!--                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#invoiceSaleIndexModal">-->
<!--                                        ...-->
<!--                                    </button>-->
<!--                                </td>-->
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