<?php
require_once __DIR__ . '/autoload.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

$loginController = new LoginController(new UserRepository());
$fileController = new FileController();

if ($action == 'login-set') {
    $loginController->set();
}
else if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
    $loginController->index();
} else {
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
            echo OtherDocumentsController::index();
            break;
        case 'otherDocuments-more':
            echo OtherDocumentsController::moreData();
            break;
        case 'otherDocuments-filter':
            echo OtherDocumentsController::filterData();
            break;
        case 'otherDocuments-add':
            echo NotFoundView::render();
            break;
        case 'license-show':
            echo LicenseController::index();
            break;
        case 'license-more':
            echo LicenseController::moreData();
            break;
        case 'license-filter':
            echo LicenseController::filterData();
            break;
        case 'license-add':
            echo NotFoundView::render();
            break;
        case 'generateReport-show':
            echo NotFoundView::render();
            break;
        case 'generateReport-set':
            echo NotFoundView::render();
            break;
        case 'admin':
            echo NotFoundView::render();
            break;
        case 'equipment-show':
            echo EquipmentController::index();
            break;
        case 'equipment-more':
            echo EquipmentController::moreData();
            break;
        case 'equipment-filter':
            echo EquipmentController::filterData();
            break;
        case 'equipment-add':
            echo NotFoundView::render();
            break;
        case 'login':
            $loginController->index();
            break;
        case 'logout':
            $loginController->logout();
            break;
        case 'getFile':
            $fileController->get();
            break;
        default:
            header('Location: index.php?action=login');
            break;
    }
}
