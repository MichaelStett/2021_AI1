<?php
require_once __DIR__ . '/../../autoload.php';
interface Component
{
    public function __toString();
}
class BaseFormComponent implements Component
{
    protected $fields;
    protected $method = "post";
    protected $readonly = false;

    public function __toString()
    {
        ob_start();
        ?>
        <form method="<?= $this->method ?>" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              enctype="multipart/form-data">
            <?php foreach ($this->fields as $field): ?>
                <?= $field ?>
            <?php endforeach; ?>

            <?php
            if (!$this->readonly) { ?>
                <input type='submit'>
            <?php } ?>

        </form>
        <?php
        return ob_get_clean();
    }
}
class AddUserComponent extends BaseFormComponent implements Component
{

    public function __construct($errors)
    {
        $this->fields = array(
            new TextInputField('username (admin /user)', 'username', $errors['username']),
            new TextInputField('Name', 'firstName', $errors['firstName']),
            new TextInputField('Last Name', 'lastName', $errors['lastName']),
            new TextInputField('Password', 'password', $errors['password']),
            
            
        );

    }

}
