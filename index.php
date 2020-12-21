<?php
require_once __DIR__ . '/autoload.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'invoice-list':
        InvoiceController::index();
        break;
    case 'invoice-sales-list':
        InvoiceController::sales_list();
        break;
    case 'invoice-sales-details':
        InvoiceController::sales_details();
        break;
    case 'invoice-sales-add':
        InvoiceController::sales_add();
        break;
    case 'invoice-purchased-list':
        InvoiceController::purchased_list();
        break;
    case 'invoice-purchased-details':
        InvoiceController::purchased_details();
        break;
    case 'invoice-purchased-add':
        InvoiceController::purchased_add();
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
