<?php
global $config;
class EquipmentToDB
{
    public static function insertToDB($name, $serialNumber, $purchaseDate, $warrantyTo,
                                      $amountNet, $notes,$assignedFor,$invoiceId)
    {
        global $config;
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoQuery = "INSERT INTO equipment (name, serialNumber, purchaseDate, warrantyTo, amountNet, notes, assignedFor, invoiceId)
        VALUES(:name, :serialNumber, :purchaseDate, :warrantyTo, :amountNet, :notes, :assignedFor, :invoiceId)";
        $pdoQuery_run = $pdo->prepare($pdoQuery);
        $pdoQuery_exec = $pdoQuery_run->execute([
            ":name" => $name,
            ":purchaseDate" => $purchaseDate,
            ":warrantyTo" => $warrantyTo,
            ":notes" => $notes,
            ":assignedFor" => $assignedFor,
            ":serialNumber" => $serialNumber,
            ":amountNet" => $amountNet,
            ":invoiceId" => $invoiceId]);
    }
    public static function fileUpload(){
        global $config;
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoQuery = "SELECT MAX(inventoryNumber) FROM equipment";
        $pdoQuery_run = $pdo->prepare($pdoQuery);
        $pdoQuery_run->execute();
        $id = $pdoQuery_run->fetchObject();
        $id = strval(array_values(get_object_vars($id))[0]) . '-';
        $target_dir = "uploads/EquipmentUploads/";
        $target_file = $target_dir . $id . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "pdf" ) {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo '<script>alert("Przepraszamy, twój plik nie został dodany")</script>';
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Plik ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " został dodany pomyślnie.";
            } else {
                echo '<script>alert("Wystąpił błąd podczas uploadu pliku")</script>';
            }
        }
    }
    public static function getAll() {
        global $config;
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $allInvoices = array();
        foreach($pdo->query('SELECT id, invoiceNumber, addDate, amountNet FROM invoicepurchase WHERE
            invoicepurchase.id NOT IN(SELECT invoiceId FROM equipment)') as $row) {
            $oneRow = array("id" => $row["id"],
                "invoiceNumber" => $row["invoiceNumber"],
                "addDate" => $row["addDate"],
                "amountNet" => $row["amountNet"],
            );
            array_push($allInvoices, $oneRow);
        }
        return $allInvoices;
    }

}
