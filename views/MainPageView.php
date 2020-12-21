<?php
require_once __DIR__ . '/../autoload.php';

class MainPageView
{
    // TODO: Add links for pages
    public static function render($params = [])
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <ul>
            <li><a href="">All Invoices</a></li>
            <li><a href="">Sales Invoices</a></li>
            <li><a href="">Purchase Invoices</a></li>
            <li><a href="">Documents</a></li>
            <li><a href="">Equipment List</a></li>
            <li><a href="">Licenses</a></li>
        </ul>
        <?= Layout::footer() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
?>