<?php

class UserViewShow
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <div class="UsersFound card">

            <h5 class="card-header">Found Users</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">email</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              
                            </tr>
                            <?= self::renderUsersRows() ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    public static function renderUsersRows()
    {
        // repositories
        $userRepository = new UserRepository1();

        // result entities
        $users = $userRepository->select();

        // render results
        $i = 1;
        foreach ($users as $key => &$user) {
            self::renderRow($user, $i);
            $i++;
        }
    }

    public static function renderRow(User &$user, int $lp)
    {
        echo "
    <tr>
        <th scope='row'>$lp</th>
        <td>" . $user->getUsername() . "</td>
        <td>" . $user->getFirstName() . "</td>
        <td>" . $user->getLastName() . "</td>
        <td>" . $user->getLogin() . "</td>
        <td>" . $user->getEmail() . "</td>
    </tr>
    ";
         
    }
}
