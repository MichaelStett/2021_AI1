<?php
require_once __DIR__ . '/../../autoload.php';


$usersList=[];
$config = [];
$config['dsn'] = 'mysql:dbname=arturino; host=localhost';
$config['login'] = 'root';
$config['password'] = '';
try{
    $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt= $pdo->prepare("SELECT * FROM users ORDER BY id ASC");
    $stmt->execute();
    $users = $stmt->fetchAll();
    foreach ($users as $u) {
        $user = new User();
        $user->setId($u['id']);
        $user->setUsername($u['username']);
        $user->setFirstName($u['firstName']);
        $user->setLastName($u['lastName']);
        $user->setPassword($u['password']);
        $user->setLogin($u['login']);
        $user->setEmail($u['email']);

        array_push($usersList,$user);
    }
}
catch(Exception $e){
    throw new Exception($e->getMessage());
}
$data = [
    'username'=>'user',
    'firstName' => "Mariusz",
    'lastName' => "Nowak",
    'password'=>"123456",
    'login' => "mnowak5",
    'email'=>"mnowak5@company.com"
];
function insertUser($data,$pdo){
        $stmt= $pdo->prepare("INSERT INTO users (`id`,`username`,`firstName`,lastName,`password`,`login`,`email`) VALUES 
        (:id,:username,:firstName,:lastName,:password,:login,:email)");
        $stmt->execute($data);
}
//insertUser($data,$dbh);
displayMenu(new BaseListPage(new UserListComponent($usersList),
    null,
    "Użytkownicy",
    new PaginatorComponent(sizeof($usersList)),
    '2021_AI1/index.php/add-user'));

?>
