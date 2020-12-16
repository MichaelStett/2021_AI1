<?php
class Layout
{
    public static function header()
    {
        ob_start();
        ?>
            <html>
            <head>
                <title>Arturino</title>
                 <!-- TODO: Dodac css -->
            </head>
            <body>
            <?= self::navbar() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function footer()
    {
        ob_start();
        ?>
            <footer>&copy; 2020 Arturino </footer>
            </body>
            </html>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    private static function navbar()
    {
        ob_start();
        ?>
        <nav>
            <ul>
                <li>Home</li>
                <li>About us</li>
                <li><?= isset($_SESSION['uid']) && $_SESSION['uid'] ? 'Zalogowany' : 'Nie zalogowany' ?></li>
            </ul>
        </nav>
        <?php
        $html = ob_get_clean();
        return $html;
    }

}
?>
