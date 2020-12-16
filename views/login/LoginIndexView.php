<?php
require_once __DIR__ . '/../../autoload.php';

class LoginIndexView
{
    public static function render($params = [])
    {
        ob_start();
        ?>
            <?= Layout::header() ?>
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
            <?= Layout::footer() ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
?>