<?php
class InvoicePurchaseFormView
{
    public static function render()
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <form action="./index.php?action=invoicePurchase-add" method="post" enctype="multipart/form-data">
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
                    <label for="amountNet">kwota Netto</label>
                    <input type="text" name="amountNet" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="amountGross">kwota Brutto</label>
                    <input type="text" name="amountGross" class="form-control"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="amountTax">kwota podatku</label>
                    <input type="text" name="amountTax" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="addDate">Data:</label>
                    <input type="date" name="addDate" class="form-control"><br>
                </div>
            </div>
            <label for="currency">Waluta</label>
            <select name="currency">
                <option value="PLN">PLN</option>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
            </select>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="amountNettCurrency">kwota w walucie</label>
                    <input type="text" name="amountNettCurrency" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label" for="customFile">Załącz plik</label>
                    <input type="file" name="fileToUpload" class="form-control" id="fileToUpload" />
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
        </form>
        <?php
        $x = 0;
        if(isset($_POST['invoiceNumber']) and isset($_POST['vatID']) and isset($_POST['amountNet'])
            and isset($_POST['amountGross']) and isset($_POST['amountTax']) and isset($_POST['currency']) and
            isset($_POST['addDate']) and isset($_POST['amountNettCurrency'])){
            if(strlen($_POST['invoiceNumber'])>25 or !is_numeric($_POST['invoiceNumber'])) {
                global $x;
                $x = 1;
            }
            else if(strlen($_POST['vatID'])!=10 or !is_numeric($_POST['invoiceNumber'])) {
                global $x;
                $x = 1;
            }
            else if(!is_numeric($_POST['amountNet']) or !is_numeric($_POST['amountGross']) or !is_numeric($_POST['amountTax']) or !is_numeric($_POST['amountNettCurrency'])){
                global $x;
                $x = 1;
            }
            else if(!is_numeric($_POST['amountGross'])){
                global $x;
                $x = 1;
            }
            if($x == 0) {
                invoicePurchaseToDB::insertToDB($_POST['invoiceNumber'], $_POST['vatID'], $_POST['amountNet'], $_POST['amountGross'],
                    $_POST['amountTax'], $_POST['currency'], $_POST['amountNettCurrency'], $_POST['addDate']);
            }
            else{
                echo '<script>alert("Podano złe dane")</script>';
            }
        }
        if(isset($_POST['submit']) and $x == 0){
            invoicePurchaseToDB::fileUpload($_POST['invoiceNumber']);
        }
        $html = ob_get_clean();
        return $html;
    }
}