<?php
require_once __DIR__ . '/../../autoload.php';
class UserViewAdd
{
    public static function render($recordsMainTable, $numberOfRecordsInDB, $reportData = [])
    {
        ob_start();
?>
        <?= Layout::header($params); ?>
        <form class='col-12' method="POST">
            <div class='row col-12'>
                <div class='row col-12'>
                    <div class='col-6'>
                        <div class='row col-12'>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="username">Job Title</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username">
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="FirstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="firstName">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="lastName">
                        </div>
                    </div>
                </div>
                
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="PhoneNumber">Passwd</label>
                            <input type="number" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                    </div>
                </div>

                <div class="row col-12">
                    <div class='col-4 offset-md-4'>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block form-control-input" id="AddEqSubmit">
                        </div>
                    </div>
                </div>

            </div>
        </form>

        <div class="col">
            <?= self::addUser() ?>
        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    
    private static function addUser()
    {
        try {
            if (!empty($_POST)) {
                // security
                $dataForm = new DataForm($_POST);
                $dataForm->sanitizeData();
                $dataForm->checkIfExistsData();

                // validate phone number
                if (!is_numeric($dataForm->data['password'])) {
                    throw new InvalidInputExcetion('Given phone number is not number!');
                }
                if (strlen($dataForm->data['password']) >= 4) {
                    throw new InvalidInputExcetion('Given phone number is invalid!');
                }

                // remove all whitespaces from FirstName and LastName
                $dataForm->data['firstName'] = preg_replace('/\s+/', '', $dataForm->data['firstName']);
                $dataForm->data['lastName'] = preg_replace('/\s+/', '', $dataForm->data['lastName']);

                // create login
                $login = strtolower(substr($dataForm->data['firstName'], 0, 1)) . ucfirst($dataForm->data['lastName']);

                // hash password; default password is the same as login
                $password = password_hash($login, PASSWORD_DEFAULT);

                // create entity object
                $user = new User();
                $user->setId($u['id']);
        $user->setUsername($u['username']);
        $user->setFirstName($u['firstName']);
        $user->setLastName($u['lastName']);
        $user->setPassword($u['password']);
        $user->setLogin($u['login']);
        $user->setEmail($u['email']);

                // repository and result
                $userRepository = new UserRepository1();
                $result = $userRepository->insert($user);

                // something goes wrong
                if (!$result) {
                    throw new PDOException('Request processing error.');
                }

                // all OK
                echo NotificationController::renderViewSuccess('User has been added.');
            }
        } catch (Exception $e) {
            echo NotificationController::renderViewDanger($e->getMessage());
        }
    }
}
