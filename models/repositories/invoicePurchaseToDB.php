<?php
global $config;
class invoicePurchaseToDB
{
    public static function insertToDB($invoiceNumber, $vatID, $amountNett, $amountGross, $amountTAX, $currencyName, $amountNettCurrency,$addDate)
    {
        global $config;
        if(strlen($invoiceNumber)<3){
            echo "zle dane";
        }
        else{
            echo "dobre dane";
            $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdoQuery = "INSERT INTO invoicepurchase (invoiceNumber,addDate, vatID, amountNett, amountGross, amountTAX, currencyName, amountNetCurrency)
        VALUES(:invoiceNumber, :addDate, :vatID, :amountNett, :amountGross, :amountTAX, :currencyName, :amountNetCurrency)";
            $pdoQuery_run = $pdo->prepare($pdoQuery);
            $pdoQuery_exec = $pdoQuery_run->execute([
                ":invoiceNumber" => $invoiceNumber,
                ":addDate" => $addDate,
                ":vatID" => $vatID,
                ":amountNett" => $amountNett,
                ":amountGross" => $amountGross,
                ":amountTAX" => $amountTAX,
                ":currencyName" => $currencyName,
                ":amountNetCurrency" => $amountNettCurrency]);
            if ($pdoQuery_exec) {
                echo "dziala dodanie";
            }
            else{
                echo "nie dziala";
            }
        }
    }
    public static function fileUpload(){
        echo "dodaje plik do uploads";
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "pdf" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to invoicePurchaseToDB file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

}
