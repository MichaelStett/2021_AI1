<?php
require_once __DIR__ . '/../autoload.php';


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
