<?php
global $config;
class OtherDocumentsToDB
{
    public static function insertToDB($name, $date, $notes, $firstSide, $secondSide)
    {
        global $config;
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoQuery = "INSERT INTO otherdocuments (name, date, notes, firstSide, secondSide)
        VALUES(:name, :date, :notes, :firstSide, :secondSide)";
        $pdoQuery_run = $pdo->prepare($pdoQuery);
        $pdoQuery_exec = $pdoQuery_run->execute([
            ":name" => $name,
            ":date" => $date,
            ":notes" => $notes,
            ":firstSide" => $firstSide,
            ":secondSide" => $secondSide]);
    }
    public static function fileUpload(){
        global $config;
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoQuery = "SELECT MAX(id) FROM otherdocuments";
        $pdoQuery_run = $pdo->prepare($pdoQuery);
        $pdoQuery_run->execute();
        $id = $pdoQuery_run->fetchObject();
        $id = strval(array_values(get_object_vars($id))[0]) . '-';
        $target_dir = "uploads/OtherDocsUploads/";
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
