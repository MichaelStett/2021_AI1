<?php
require_once __DIR__ . '/../../autoload.php';

class LoginIndexView
{
    public static function render()
    {
        ob_start();
        ?>
            <?= Layout::header( array("show")) ?>
                <div class="login-form">
                    <form name="loginForm" action="/controller.php?action=login-set" method="post" onsubmit="return validateLoginForm()" >
                        <h2 class="text-center">Log in</h2>
                        <div class="form-group">
                            <input name="user-name" type="text" class="form-control" placeholder="Username" required>
                            <div id="invalid-feedback-login" class="invalid-feedback" style="display: none">
                                Please provide a valid username starting from world characterr.
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <div id="invalid-feedback-password" class="invalid-feedback" style="display: none">
                                Please provide a valid password .
                            </div>
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
            function validateLoginForm() {
                const patt_user = /^\D[\w]{3,16}$/;
                const patt_password = /^[\w]{3,16}$/;
                var loginForm = document.forms["loginForm"];
                if (!patt_user.test(loginForm["user-name"].value)) {
                    document.getElementById('invalid-feedback-login').style.display = "block";
                    return false;
                }
                document.getElementById('invalid-feedback-login').style.display = "none";
                if (!patt_password.test(loginForm["password"].value)) {
                    document.getElementById('invalid-feedback-password').style.display = "block";
                    return false;
                }
                document.getElementById('invalid-feedback-password').style.display = "none";
                return true;

            }
        </script>
            <?= Layout::footer(array("noincludescript")) ?>
        <?php
        $html = ob_get_clean();
        return $html;
    }
}
?>