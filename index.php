<?php
require_once __DIR__ . '/autoload.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

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
        echo InvoiceSaleController::add();
        break;
    case 'invoicePurchase-show':
        echo InvoicePurchaseController::index();
        break;
    case 'invoicePurchase-more':
        //InvoiceController::show();
        echo InvoicePurchaseController::moreData();
        break;
    case 'invoicePurchase-filter':
        //InvoiceController::show();
        echo InvoicePurchaseController::filterData();
        break;
    case 'invoicePurchase-add':
        echo InvoicePurchaseController::add();
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
        LoginController::index();
        break;
    case 'login-set':
        LoginController::set();
        break;
    case 'logout':
        LoginController::logout();
        break;
    default:
        header('Location: index.php?action=login');
        break;
}
?>