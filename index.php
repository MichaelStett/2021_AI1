<?php
require_once __DIR__ . '/autoload.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'invoicePurchase-add':
        invoicePurchaseController::index();
        break;
    default:
        header('Location: index.php?action=invoicePurchase-add');
        break;
}
?>