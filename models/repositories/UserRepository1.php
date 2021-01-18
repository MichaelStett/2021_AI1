<?php

class UserRepository1
{
    private $connect = null;

    public function __construct()
    {
        try {
            global $config;
            $this->connect = new PDO($config['dsn'], $config['login'], $config['password']);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute();

            $users = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new User();
                $user = new User();
                $user->setId($u['id']);
        $user->setUsername($u['username']);
        $user->setFirstName($u['firstName']);
        $user->setLastName($u['lastName']);
        $user->setPassword($u['password']);
        $user->setLogin($u['login']);
        $user->setEmail($u['email']);

             

                array_push($users, $user);
            }

            return $users;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findById(int $id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id=:id";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => Validation::sanitizeInt($id)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $user = new User();
            $user->setId($u['id']);
        $user->setUsername($u['username']);
        $user->setFirstName($u['firstName']);
        $user->setLastName($u['lastName']);
        $user->setPassword($u['password']);
        $user->setLogin($u['login']);
        $user->setEmail($u['email']);

           

            $user->setLogin($login);

            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findByLogin(string $login)
    {
        try {
            $sql = "SELECT * FROM users WHERE login=:login";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'login' => Validation::sanitizeText($login)
            ));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return null;
            }

            $user = new User();
             $user->setId($u['id']);
        $user->setUsername($u['username']);
        $user->setFirstName($u['firstName']);
        $user->setLastName($u['lastName']);
        $user->setPassword($u['password']);
        $user->setLogin($u['login']);
        $user->setEmail($u['email']);


           
            $user->setLogin($login);

            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert(User $user)
    {
        try {
            $sql = "INSERT INTO users (`id`,`username`,`firstName`,lastName,`password`,`login`,`email`) VALUES (:id,:username,:firstName,:lastName,:password,:login,:email)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'password' => $user->getPassword(),
                'login' => $user->getLogin(),
                'email' => $user->getEmail()
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(User $user)
    {
        try {
            $sql = "update users (`id`,`username`,`firstName`,lastName,`password`,`login`,`email`) VALUES (:id,:username,:firstName,:lastName,:password,:login,:email)";
            $stmt = $this->connect->prepare($sql);

            $result = $stmt->execute(array(
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'password' => $user->getPassword(),
                'login' => $user->getLogin(),
                'email' => $user->getEmail()
            ));

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
