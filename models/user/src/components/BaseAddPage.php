<?php
require_once __DIR__.'/../autoload.php';

class BaseAddPage implements Component
{
    protected $title;
    protected $formComponent;

    /**
     * BaseAddPage constructor.
     * @param $title
     * @param $formComponent
     */
    public function __construct($title, $formComponent)
    {
        $this->title = $title;
        $this->formComponent = $formComponent;
    }

    public function __toString()
    {
        ob_start();
        ?>
        <h2> <?= $this->title ?></h2>
        <?= $this->formComponent ?>
        <?php
        return ob_get_clean();
    }
}