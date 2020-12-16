<?php
class Layout
{
    public static function header($params = [])
    {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="pl">

            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="" />
                <meta name="author" content="Szwarc Tymejczyk Kruszyna Przybysz" />
                <title>Fakturomat</title>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
                <link rel="stylesheet" href="styles.css">

            </head>

            <body>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

                    <div class="container-fluid">
        <?  ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function footer($params = [])
    {
        ob_start();
        ?>
                    </div>
                <div class="container-fluid">
                    <footer class="bg-light text-center text-lg-start">
                        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                            © 2020 Copyright: Arturino Zespol
        <!--                    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>-->
                        </div>
                    </footer>
                </div>
                <?php
                    echo (!in_array('noincludescript',$params)) ? '<script src="scripts.js"></script>' : '';
                ?>
            </body>
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
