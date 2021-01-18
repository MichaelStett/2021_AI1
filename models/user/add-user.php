<?php
require_once __DIR__ . '/../../autoload.php';

$validator = new UserValidation();
$errors = $validator->getEmptyValidations();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = $validator->validate($_POST, $_FILES);
}
function returnLastId($pdo){
    $stmt= $pdo->prepare("SELECT id FROM users ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $fetch = $stmt->fetch();
    //echoTop($fetch, 2);
    return $fetch;
}
//returnLastId($dbh);
function insertUser1($data,$pdo){
    $stmt= $dbh->prepare("INSERT INTO users (`username`,`firstName`,lastName,`password`,`login`,`email`) VALUES 
        (:username,:firstName,:lastName,:password,:login,:email)");
    $stmt->execute($data);
}


if (isset($_POST['firstName'])) {
    function createLogin($pdo)
    {
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $_POST['firstName']);
        $name = strtolower(preg_replace("/[^a-zA-Z]/", "", $name));
        $nameChar = $name[0];

        $lastName = iconv('UTF-8', 'ASCII//TRANSLIT', $_POST['lastName']);
        $lastName = strtolower(preg_replace("/[^a-zA-Z]/", "", $lastName));

        $id=returnLastId($pdo);
        $newId=strval($id[0]+1);
        //echoTop($newId);
        $login = $nameChar . $lastName . $newId;
        return $login;
    }

    function createEmail($login)
    {
        $email = "";
        if ($_POST['username'] == 'user' ) {
            $email = "@user.com";
        } else $email = "@admin.com";
        $email = $login . $email;
        //echoTop($email,4);
        return $email;
    }
    $login = createLogin($pdo);
    $email = createEmail($login);
    $data = [
        
        'username' => $_POST['username'],
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'password' => $_POST['password'],
        'login' => $login,
        
        'email' => $email
    ];
    insertUser1($data, $pdo);
}