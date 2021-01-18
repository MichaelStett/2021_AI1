<?php
require_once __DIR__ . '/../../autoload.php';
class LicenseFormView
{
    public static function render()
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <h2>Licencje</h2>
        <form action="./index.php?action=license-add" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">Nazwa</label>
                    <input type="text" name="name" class="form-control"><br>
                </div>
                <div class="form-group col-md-3">
                    <label for="serialNumber">Numer Seryjny</label>
                    <input type="text" name="serialNumber" class="form-control"><br>
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="customFile">Załącz plik</label>
                    <input type="file" name="fileToUpload" class="form-control" id="fileToUpload" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="purchaseDate">Data Zakupu:</label>
                    <input type="date" name="purchaseDate" class="form-control"><br>
                </div>
                <div class="form-group col-md-3">
                    <label for="invoiceId">Id Faktury Zakupu</label>
                    <input type="text" name="invoiceId" class="form-control"><br>
                </div>
                <div class="form-group col-md-3">
                    <label for="validTo">Ważne do:</label>
                    <input type="date" name="validTo" class="form-control"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="assignedFor">Na czyim stanie:</label>
                    <input type="text" name="assignedFor" class="form-control"><br>
                </div>
                <div class="form-group col-md-3">
                    <label for="supportTo">Wsparcie techniczne do:</label>
                    <input type="date" name="supportTo" class="form-control"><br>
                </div>
                <div class="form-group col-md-3">
                    <label for="notes">Notatki:</label>
                    <input type="text" name="notes" class="form-control"><br>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
        </form>
        <h3>Wolne Faktury Zakupu</h3>
        <?php
        $html = ob_get_clean();
        return $html;
    }
    public static function invoices($records){
        ob_start();
        ?>
        <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id Faktury Zakupu</th>
            <th scope="col">Nr Faktury Zakupu</th>
            <th scope="col">Data dodania</th>
            <th scope="col">kwota Netto</th>
        </tr>
        </thead>
        <tbody class="span3">
        <?php
        for($i = 0; $i < sizeof($records); $i++){
            echo "<tr>";
            echo "<td>" .$records[$i]['id']. "</td>";
            echo "<td>" .$records[$i]['invoiceNumber']. "</td>";
            echo "<td>" .$records[$i]['addDate']. "</td>";
            echo "<td>" .$records[$i]['amountNet']. "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
        </table>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
