<?php


class LicenseController
{
    public static function add() {
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo "You are not logged in." . PHP_EOL;
            echo LoginIndexView::render();
            return;
        }
        echo LicenseFormView::render();
        $invoices = LicenseToDB::getAll();
        echo LicenseFormView::invoices($invoices);
        $x = 0;
        if(isset($_POST['name']) and isset($_POST['serialNumber'])
            and isset($_POST['purchaseDate']) and isset($_POST['supportTo']) and isset($_POST['validTo']) and
            isset($_POST['notes']) and isset($_POST['assignedFor']) and isset($_POST['invoiceId'])){
            if(strlen($_POST['name'])<1 and strlen($_POST['serialNumber'])<1) {
                global $x;
                $x = 1;
            }
            else if(strlen($_POST['assignedFor'])<1 or !is_numeric($_POST['assignedFor'])) {
                global $x;
                $x = 1;
            }
            else if(strlen($_POST['invoiceId'])<1 or !is_numeric($_POST['invoiceId'])) {
                global $x;
                $x = 1;
            }

            if($x == 0) {
                LicenseToDB::insertToDB($_POST['name'], $_POST['serialNumber'], $_POST['purchaseDate'],
                    $_POST['supportTo'],$_POST['validTo'],$_POST['notes'], $_POST['assignedFor'], $_POST['invoiceId']);
                global $x;
                $x = 5;
            }
            else{
                echo '<script>alert("Podano złe dane")</script>';
            }
        }
        if(isset($_POST['submit']) and $x == 5){
            LicenseToDB::fileUpload($_POST['invoiceId']);
        }
    }
    private static $limit = 2;

    /**
     * @throws Exception
     */
    public static function index() {

        $lcienseRepository = new LicenseRepository();

        $records = $lcienseRepository->getAll(self::$limit);
        $numOfRecords = $lcienseRepository->getNumberOfRecords();

        echo LicenseIndexView::render($records, ceil($numOfRecords/self::$limit));
    }

    /**
     * @param string[] $params
     * @return array
     */
    private static function filterGetParameters($params) {

        $retParams = [];
        foreach ($params as $val) {
            if(isset($_GET[$val])) {
                $retParams[$val] = htmlspecialchars($_GET[$val]);
            }
        }
        return $retParams;
    }

    /**
     * @return false|string
     * @throws Exception
     */
    public static function filterData() {

        $getparamNames = array("name");

        $params = self::filterGetParameters($getparamNames);

        $licenseRepository = new LicenseRepository();

        $records = $licenseRepository->findBy($params);

        header('Content-type: application/json');
        return  json_encode($records) ;
    }

    /**
     * @return false|string
     * @throws Exception
     */
    public static function moreData() {
        $page = htmlspecialchars($_GET["page"]);

        //$page = 1;
        if (!is_numeric($page)) {
            return "";
        }
        $page = ceil($page);
        //return $page;

        $licenseRepository = new LicenseRepository();

        $numOfPages = ceil($licenseRepository->getNumberOfRecords()/self::$limit);
        $records = $page == 0 ? $licenseRepository->getAll(0) : $licenseRepository->getAll(self::$limit*$page);
        if ( $page == 0) {
            $records = array_slice($records,  self::$limit*($numOfPages));
        } else {
            $records = array_slice($records,  self::$limit*($page-1),self::$limit);
        }

        return  json_encode(array('data' => $records,'numOfAllPage' => $numOfPages));
    }
}
