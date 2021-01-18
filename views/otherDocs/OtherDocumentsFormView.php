<?php
require_once __DIR__ . '/../../autoload.php';
class OtherDocumentsFormView
{
    public static function render()
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <h2>Inne Dokumenty</h2>
        <form action="./index.php?action=otherDocuments-add" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">Nazwa</label>
                    <input type="text" name="name" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="date">Data:</label>
                    <input type="date" name="date" class="form-control"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="firstSide">Pierwsza strona</label>
                    <input type="text" name="firstSide" class="form-control"><br>
                </div>
                <div class="form-group col-md-4">
                    <label for="secondSide">Druga Strona</label>
                    <input type="text" name="secondSide" class="form-control"><br>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="notes">Notatki</label>
                    <input type="text" name="notes" class="form-control"><br>
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