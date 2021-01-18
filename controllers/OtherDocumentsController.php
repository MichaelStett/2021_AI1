<?php


class OtherDocumentsController
{
    public static function add() {
        if (!isset($_SESSION['uid']) || $_SESSION['uid'] == '') {
            echo "You are not logged in." . PHP_EOL;
            echo LoginIndexView::render();
            return;
        }
        echo OtherDocumentsFormView::render();
        $x = 0;
        if(isset($_POST['name']) and isset($_POST['date'])
            and isset($_POST['notes']) and isset($_POST['firstSide']) and isset($_POST['secondSide'])){
            if(strlen($_POST['name'])<1 and strlen($_POST['notes'])<1) {
                global $x;
                $x = 1;
            }
            else if(strlen($_POST['firstSide'])<1 and strlen($_POST['secondSide'])<1) {
                global $x;
                $x = 1;
            }
            if($x == 0) {
                OtherDocumentsToDB::insertToDB($_POST['name'], $_POST['date'], $_POST['notes'],
                    $_POST['firstSide'],$_POST['secondSide']);
                global $x;
                $x = 5;
            }
            else{
                echo '<script>alert("Podano złe dane")</script>';
            }
        }
        if(isset($_POST['submit']) and $x == 5){
            OtherDocumentsToDB::fileUpload();
        }
    }
    private static $limit = 2;

    /**
     * @throws Exception
     */
    public static function index() {

        $otherDocumentsRepository = new OtherDocumentsRepository();

        $records = $otherDocumentsRepository->getAll(self::$limit);
        $numOfRecords = $otherDocumentsRepository->getNumberOfRecords();

        echo OtherDocumentsIndexView::render($records, ceil($numOfRecords/self::$limit));
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

        $getparamNames = array("name","dateAddStart","dateAddEnd");

        $params = self::filterGetParameters($getparamNames);

        $otherDocumentsRepository = new OtherDocumentsRepository();

        $records = $otherDocumentsRepository->findBy($params);

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

        $otherDocumentsRepository = new OtherDocumentsRepository();

        $numOfPages = ceil($otherDocumentsRepository->getNumberOfRecords()/self::$limit);
        $records = $page == 0 ? $otherDocumentsRepository->getAll(0) : $otherDocumentsRepository->getAll(self::$limit*$page);
        if ( $page == 0) {
            $records = array_slice($records,  self::$limit*($numOfPages));
        } else {
            $records = array_slice($records,  self::$limit*($page-1),self::$limit);
        }

        return  json_encode(array('data' => $records,'numOfAllPage' => $numOfPages));
    }
}
