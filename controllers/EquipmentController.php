<?php


class EquipmentController
{
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