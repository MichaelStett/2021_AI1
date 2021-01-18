<?php
require_once __DIR__ . '/../autoload.php';


class PaginatorComponent implements Component
{
    protected $totalCount;
    protected $pageSize = 10;

    /**
     * PaginatorComponent constructor.
     * @param $totalCount
     */
    public function __construct($totalCount)
    {
        $this->totalCount = $totalCount;
    }


    public function __toString()
    {
        $pages = ceil($this->totalCount / $this->pageSize);
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        ob_start();
        ?>
        <div class='dropdown'>
            <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton'
                    data-toggle='dropdown'
                    aria-haspopup='true' aria-expanded='false'>
                Numer strony
            </button>
            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <a class='dropdown-item' href='<?= $uri ?>?numerStrony=<?= $i-1 ?>'> <?= $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
