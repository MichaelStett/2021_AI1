<?php
require_once __DIR__ . '/../../autoload.php';


class UserListComponent implements Component
{
    protected $values;

    public function __construct($values)
    {
        $this->values = $values;
    }

    public function __toString()
    {
        ob_start();
        ?>
        <table>
            <thead>
            <tr>
                <th> Id</th>
                <th> Login</th>
                <th> Imię</th>
                <th> Nazwisko</th>
                <th>Passord</th>
                <th> Stanowisko</th>
                <th> Adres email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->values as $user): ?>
                <tr>
                    <td> <?= $user->getId() ?> </td>
                    <td> <?= $user->getUsername() ?> </td>
                    <td> <?= $user->getFirstName() ?> </td>
                    <td> <?= $user->getLastName() ?> </td>
                    <td><?= $user->getPassword() ?></td>
                    <td> <?= $user->getLogin() ?> </td>
                    <td> <?= $user->getEmail() ?> </td>
                </tr>
            <?php endforeach; ?>


            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }

}