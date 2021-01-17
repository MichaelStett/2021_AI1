<?php
require_once __DIR__ . '/../autoload.php';

class LoginController
{
    private $_repo;

    public function __construct(IRepository $repository)
    {
        $this->_repo = $repository;
    }

    public function index()
    {
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo LoginIndexView::render();
            return;
        }

        InvoiceSaleController::index();
    }

    public function set()
    {
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            $exist = $this->_repo->exist($_REQUEST);

            if ($exist) {
                $user = $this->_repo->getByUsername($_REQUEST['username']);

                $_SESSION['uid'] = hash("md5", $user);

                $_SESSION['userType'] = $user->getRole();

                // echo "Successfully logged in for: " . $user . PHP_EOL;

                InvoiceSaleController::index();
            }
            else {
                echo "Wrong credentials" . PHP_EOL;
                LoginController::index();
            }
        }
        else {
//            echo "You are already logged in." . PHP_EOL;
            InvoiceSaleController::index();
        }

    }

    public static function logout()
    {
        session_unset();
        session_destroy();

//        echo "Successfully logged out." . PHP_EOL;
        echo LoginIndexView::render();
    }
}
