<?php
require_once __DIR__ . '/autoload.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

$loginController = new LoginController(new UserRepository());

switch ($action) {
    case 'invoice-list':
        break;
    case 'invoiceSale-show':
        echo InvoiceSaleController::index();
        break;
    case 'invoiceSale-more':
        echo InvoiceSaleController::moreData();
        break;
    case 'invoiceSale-filter':
        echo InvoiceSaleController::filterData();
        break;
    case 'invoiceSale-add':
        echo InvoiceSaleController::add();
        break;
    case 'invoicePurchase-show':
        echo InvoicePurchaseController::index();
        break;
    case 'invoicePurchase-more':
        echo InvoicePurchaseController::moreData();
        break;
    case 'invoicePurchase-filter':
        echo InvoicePurchaseController::filterData();
        break;
    case 'invoicePurchase-add':
        echo InvoicePurchaseController::add();
        break;
    case 'otherDocuments-show':
    case 'otherDocuments-add':
    case 'license-show':
    case 'license-add':
    case 'generateReport-show':
    case 'generateReport-set':
    case 'admin':
    case 'equipment-show':
    case 'equipment-add':
        echo NotFoundView::render();
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
