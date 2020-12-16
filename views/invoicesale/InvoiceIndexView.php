<?php
require_once __DIR__ . '/../../autoload.php';

class InvoiceIndexView
{
    public static function render()
    {
        ob_start();
        ?>
        <?= Layout::header() ?>
        <div class="login-form">

        </div>
        <?= Layout::footer() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
?>