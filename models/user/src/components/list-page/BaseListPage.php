<?php
require_once __DIR__ . '/../../autoload.php';

class BaseListPage implements Component
{
    protected $addButtonHref;
    protected $list;
    protected $searchForm;
    protected $paginator;
    protected $title;

    /**
     * BaseListPage constructor.
     * @param $addButtonHref
     * @param $list
     * @param $searchForm
     * @param $paginator
     * @param $title
     */
    public function __construct($list, $searchForm, $title, $paginator, $addButtonHref)
    {
        $this->list = $list;
        $this->searchForm = $searchForm;
        $this->title = $title;
        $this->paginator = $paginator;
        $this->addButtonHref = $addButtonHref;
    }


    public function __toString()
    {
        ob_start();
        ?>
        <h2> <?= $this->title ?></h2>
        <a href='<?= $this->addButtonHref ?>'> Dodaj</a>
        <?= $this->list ?>
        <?= $this->paginator ?>
        <?= $this->searchForm ?>
        <?php
        return ob_get_clean();
    }
}