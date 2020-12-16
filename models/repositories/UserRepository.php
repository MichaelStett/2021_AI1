<?php
require_once __DIR__ . '/../../autoload.php';

global $config;

class UserRepository
{
    /**
     * @param $username, $password
     * @return null|User
     * @throws Exception
     */
    public function findUserToLogin($username, $password) {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);

        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $pdo->prepare($sql);

        $result = $statement->execute(array(
            'username' => $username,
            'password' => $password,
        ));

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (! $row) {
            return null;
        }

        $user = new User();
        $user
            ->setId($row['id'])
            ->setUsername($row['username'])
            ->setFirstName($row['firstName'])
            ->setLastName($row['lastName']);

        return $user;
    }
}
?>
