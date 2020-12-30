<?php
global $config;
class invoicePurchaseToDB
{
    public static function insertToDB($invoiceNumber, $vatID, $amountNet, $amountGross, $amountTax, $currencyName, $amountNettCurrency,$addDate)
    {
        global $config;
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoQuery = "INSERT INTO invoicepurchase (invoiceNumber,addDate, vatID, amountNett, amountGross, amountTAX, currencyName, amountNetCurrency)
        VALUES(:invoiceNumber, :addDate, :vatID, :amountNet, :amountGross, :amountTax, :currencyName, :amountNetCurrency)";
        $pdoQuery_run = $pdo->prepare($pdoQuery);
        $pdoQuery_exec = $pdoQuery_run->execute([
            ":invoiceNumber" => $invoiceNumber,
            ":addDate" => $addDate,
            ":vatID" => $vatID,
            ":amountNet" => $amountNet,
            ":amountGross" => $amountGross,
            ":amountTax" => $amountTax,
            ":currencyName" => $currencyName,
            ":amountNetCurrency" => $amountNettCurrency]);
    }
    public static function fileUpload($invoiceNumber){
        global $config;
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoQuery = "SELECT id FROM invoicepurchase WHERE invoiceNumber=:invoiceNumber";
        $pdoQuery_run = $pdo->prepare($pdoQuery);
        $pdoQuery_run->bindParam(':invoiceNumber', $invoiceNumber, PDO::PARAM_INT);
        $pdoQuery_run->execute();
        $id = $pdoQuery_run->fetchObject();
        $id = strval($id->id) . '-';
        $target_dir = "uploads/";
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

}
