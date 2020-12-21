<?php
require_once __DIR__ . '/../autoload.php';

class InvoiceController
{
    public static function index()
    {
        // TODO: echo InvoiceIndexView::render();
        echo "Index InvoiceController";
    }

    public static function sales_list()
    {
        // TODO: echo InvoiceSalesListView::render();
        echo "List of Sales Invoices";
    }

    public static function sales_details()
    {
        // TODO: echo InvoiceSalesDetailsView::render($params); <- params with at least invoice Id
        echo "Details of Sale Invoice";
    }

    public static function sales_add()
    {
        // TODO: echo InvoiceSalesAddView::render($params); <- params with new invoice details
        echo "Form for adding new Sales Invoice";
    }

    public static function purchased_list()
    {
        // TODO: echo InvoicePurchasedListView::render();
        echo "List of Purchased Invoices";
    }

    public static function purchased_details()
    {
        // TODO: echo InvoicePurchasedDetailsView::render($params); <- params with at least invoice Id
        echo "Details of Purchase Invoice";
    }

    public static function purchased_add()
    {
        // TODO: echo InvoicePurchasedAddView::render($params); <- params with new invoice details
        echo "Form for adding new Purchase Invoice";
    }
}
