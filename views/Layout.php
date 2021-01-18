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

                <!-- TODO: Dodać role użytkowiników -->
                <?= self::navbar()  ?>

                <div class="container-fluid">

        <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function footer($params = [])
    {
        ob_start();
        ?>
                    </div>
                    <div style="padding-bottom: 50px"></div>
                    <div class="footer fixed-bottom">
                        <footer class="bg-light text-center text-lg-start">
                            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                                © 2020 Copyright: Arturino Zespol
                            </div>
                        </footer>
                    </div>
                    <script src="scripts.js"></script>
                </body>
            </html>
        <?php
        $html = ob_get_clean();
        return $html;
    }

    private static function navbar($params = [])
    {
        $userType = isset($_SESSION['userType']) ? $_SESSION['userType'] : null;

        ob_start();
        ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Fakturomat</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        switch ($userType) {
            case "employee":
                ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Wyświetl ...
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/index.php?action=otherDocuments-show">Sprzęt</a>
                            <a class="dropdown-item" href="/index.php?action=license-show">Licencje</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=logout">Logout</a>
                    </li>
                </ul>

                <?php
                break;
            case "auditor":
                ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Wyświetl ...
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./index.php?action=invoiceSale-show">FV sprzedaży</a>
                            <a class="dropdown-item" href="./index.php?action=invoicePurchase-show">FV zakupu</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./index.php?action=otherDocuments-show">Sprzęt</a>
                            <a class="dropdown-item" href="./index.php?action=license-show">Licencje</a>
                            <a class="dropdown-item" href="./index.php?action=otherDocuments-show">Pozostałe dokumenty</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=logout">Logout</a>
                    </li>
                </ul>

                <?php
                break;
            case "admin":
                ?>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Wyświetl ...
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="./index.php?action=invoiceSale-show">FV sprzedaży</a>
                                    <a class="dropdown-item" href="./index.php?action=invoicePurchase-show">FV zakupu</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./index.php?action=otherDocuments-show">Sprzęt</a>
                                    <a class="dropdown-item" href="./index.php?action=license-show">Licencje</a>
                                    <a class="dropdown-item" href="./index.php?action=otherDocuments-show">Pozostałe dokumenty</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dodaj ...
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="./index.php?action=invoiceSale-add">FV sprzedaży</a>
                                    <a class="dropdown-item" href="./index.php?action=invoicePurchase-add">FV zakupu</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./index.php?action=equipment-add">Sprzęt</a>
                                    <a class="dropdown-item" href="./index.php?action=license-add">Licencje</a>
                                    <a class="dropdown-item" href="./index.php?action=otherDocuments-add">Pozostałe dokumenty</a>
                                    <a class="nav-link" href="adduser/add.html?action=add-user">Dodaj uzytkownika</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?action=generateReport-show">Generuj raport</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?action=admin">Administracja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?action=logout">Logout</a>
                            </li>
                        </ul>
<!--                        <form class="form-inline my-2 my-lg-0">-->
<!--                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--                        </form>-->
                <?php
                break;
            default:
                ?>

                <?php
                break;
        }
        ?>
                </div>
            </nav>
        <?php

        $html = ob_get_clean();
        return $html;
    }

}
?>
