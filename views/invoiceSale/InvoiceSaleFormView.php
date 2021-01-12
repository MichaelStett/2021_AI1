<?php
require_once __DIR__ . '/../../autoload.php';
class InvoiceSaleFormView
{
    public static function render()
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <h2>Faktury Sprzedaży</h2>
        <form action="./index.php?action=invoiceSale-add" method="post" enctype="multipart/form-data">
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
                <option value="PLN"><?php echo currencyEnum::currencyTable[0]?></option>
                <option value="EUR"><?php echo currencyEnum::currencyTable[1]?></option>
                <option value="CHF"><?php echo currencyEnum::currencyTable[2]?></option>
                <option value="GBP"><?php echo currencyEnum::currencyTable[3]?></option>
                <option value="USD"><?php echo currencyEnum::currencyTable[4]?></option>
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
        $html = ob_get_clean();
        return $html;
    }
}