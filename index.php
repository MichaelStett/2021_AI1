<?php
require_once __DIR__ . '/autoload.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

$loginController = new LoginController(new UserRepository());

switch ($action) {
    case 'invoice-list':
        //InvoiceController::index();
        break;
    case 'invoiceSale-show':
        //InvoiceController::show();
        echo InvoiceSaleController::index();
        break;
    case 'invoiceSale-more':
        //InvoiceController::show();
        echo InvoiceSaleController::moreData();
        break;
    case 'invoiceSale-filter':
        //InvoiceController::show();
        echo InvoiceSaleController::filterData();
        break;
    case 'invoiceSale-add':
        break;
    case 'invoicePurhase-show':

        break;
    case 'invoicePurchase-add':
        echo InvoicePurchaseController::index();
        break;
    case 'otherDocuments-show':

        break;
    case 'otherDocuments-add':

        break;
    case 'license-show':

        break;
    case 'license-add':

        break;
    case 'generateRaport-show':

        break;
    case 'generateRaport-set':

        break;
    case 'admin':

        break;
    case 'equipment-show':

        break;
    case 'equipment-add':

        break;
    case 'login':
        $loginController->index();
        break;
    case 'login-set':
        $loginController->set();
        break;
    case 'logout':
        $loginController->logout();
        break;
    default:
        header('Location: index.php?action=login');
        break;
}
?>