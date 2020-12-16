<?php
require_once __DIR__ . '/../autoload.php';

class LoginController
{
    public static function index()
    {
        echo LoginIndexView::render();
        return;
    }

    public static function set()
    {
        print_r($_REQUEST);
        
        $userRepository = new UserRepository();

        $user = $userRepository->findUserToLogin($_REQUEST['username'], $_REQUEST['password']);

        print_r($user->__toString());

        $_SESSION['uid'] = $user->getId();

        die("Tu jest ustawianie sesji");

        // TODO: Przejście do zalogowanej strony
    }

    public static function logout()
    {
        $suc1 = session_unset();
        $suc2 = session_destroy();

        if ($suc1 && $suc2) {
            die("Wylogowano!");
        }
    }
}
?>