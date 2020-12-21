<?php
class InvoicePurchaseFormView
{
    public static function render()
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <form action="http://localhost:63342/mybranch/index.php?action=invoicePurchase-add" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="invoiceNumber">Numer Faktury</label>
                    <input type="text" name="invoiceNumber" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="vatID">vat ID kontrahenta</label>
                    <input type="text" name="vatID" class="form-control"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="amountNett">kwota Netto</label>
                    <input type="text" name="amountNett" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="amountGross">kwota Brutto</label>
                    <input type="text" name="amountGross" class="form-control"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="amountTAX">kwota podatku</label>
                    <input type="text" name="amountTAX" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="currencyName">waluta</label>
                    <input type="text" name="currencyName" class="form-control"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="amountNettCurrency">kwota w walucie</label>
                    <input type="text" name="amountNettCurrency" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="addDate">Data:</label>
                    <input type="date" name="addDate" class="form-control"><br>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label class="form-label" for="customFile">Załącz plik</label>
                <input type="file" name="fileToUpload" class="form-control" id="fileToUpload" />
            </div>
            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
        </form>
        <?php
        if(isset($_POST['invoiceNumber']) and isset($_POST['vatID']) and isset($_POST['amountNett'])
            and isset($_POST['amountGross']) and isset($_POST['amountTAX']) and isset($_POST['currencyName']) and
            isset($_POST['addDate']) and isset($_POST['amountNettCurrency'])){
                invoicePurchaseToDB::insertToDB($_POST['invoiceNumber'],$_POST['vatID'],$_POST['amountNett'],$_POST['amountGross'],
                $_POST['amountTAX'],$_POST['currencyName'],$_POST['amountNettCurrency'],$_POST['addDate']);
            }
        if(isset($_POST['submit'])){
            invoicePurchaseToDB::fileUpload();
        }
        $html = ob_get_clean();
        return $html;
    }
}