<?php
require_once __DIR__ . '/../autoload.php';

class InvoicePurchaseController
{
    public static function index()
    {
        echo InvoicePurchaseFormView::render();
    }
}
