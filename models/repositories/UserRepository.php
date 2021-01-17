<?php
require_once __DIR__ . '/../../autoload.php';

class UserRepository implements IRepository
{
    private $pdo;

    public function __construct()
    {
        global $config;
        $this->pdo = new PDO($config['dsn'], $config['login'], $config['password']);
    }

    public function exist($params)
    {
        $username = $params['username'];
        $password = hash('md5', $params['password']);

        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $this->pdo->prepare($sql);

        $result = $statement->execute(array(
            'username' => $username,
            'password' => $password,
        ));

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (! $row) {
            return null;
        }

        $user = new User();
        $user->fromArray($row);

        return $user;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        throw new NotImplementedException();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        throw new NotImplementedException();
    }

    /**
     * @param $username
     * @return User|null
     */
    public function getByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':username', $username);

        $result = $statement->execute();

        $row = $statement->fetch();

        if (! $row) {
            return null;
        }

        $user = new User();
        $user->fromArray($row);

        return $user;
    }

    public function create($params)
    {
        // TODO: Implement create() method.
        throw new NotImplementedException();
    }

    public function update($params)
    {
        // TODO: Implement update() method.
        throw new NotImplementedException();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        throw new NotImplementedException();
    }
}
