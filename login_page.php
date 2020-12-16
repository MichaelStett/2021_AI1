<?php

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
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
                font-size: 15px;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {
                font-size: 15px;
                font-weight: bold;
            }
        </style>

    </head>

    <body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <div class="container-fluid">

            <div class="login-form">
                <form name="loginForm" action="/controller.php?action=login-set" method="post" onsubmit="return validateForm()" >
                    <h2 class="text-center">Log in</h2>
                    <div class="form-group">
                        <input name="user-name" type="text" class="form-control" placeholder="Username" pattern="^[\d\w]{3,16}$" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log in</button>
                    </div>
                    <div class="clearfix">
                        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                        <a href="#" class="float-right">Forgot Password?</a>
                    </div>
                </form>
            </div>

        </div>
    </body>

    <script>
        function validateForm() {
            const patt = /^[\d\w]{3,16}$/;
            //const patt_password = /^[\d\w]{3,16}$/;
            var loginForm = document.forms["loginForm"];
            if (!patt.test(loginForm["user-name"].value)) {
                alert("Name must be filled out");
                return false;
            }
            if (!patt.test(loginForm["password"].value)) {
                alert("PAssword must be filled out");
                return false;
            }
            return true;
        }
    </script>
</html>
