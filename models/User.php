<?php

class User
{
    private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $password;
    private $role;

    /**
     * @param $params
     */
    public function fromArray($params) {
        $this
            ->setId($params['id'])
            ->setUsername($params['username'])
            ->setFirstName($params['firstName'])
            ->setLastName($params['lastName'])
            ->setRole($params['role']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = hash('md5', $password);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }



    public function getName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
public function getLogin()
    {
        return $this->login;
    }

 
    public function setLogin($login)
    {
        $this->login = $login;
    }
     public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function __toString()
    {
        return $this->getId() . ' ' . $this->getUsername() . ' ' .$this->getFirstName() . ' ' . $this->getLastName(). ' ' . $this->getPassword(). ' ' . $this->getLogin(). ' ' . $this->getEmail() ;
    }
}
