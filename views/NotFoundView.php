<?php
require_once __DIR__ . '/../autoload.php';

class NotFoundView {

    public static function render()
    {
        ob_start();
        ?>
        <?= Layout::header( array("show")) ?>

        <h1>404 Page Not Found</h1>

        <?= Layout::footer() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
