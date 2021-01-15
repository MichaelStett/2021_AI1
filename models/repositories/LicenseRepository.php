<?php


class LicenseRepository
{
    /**
     * @param array $arrayIn
     * @param string $keyPrefix
     * @return array
     */
    private static function changeKeys(&$arrayIn, $keyPrefix)
    {
        $newArr = [];
        foreach($arrayIn as $key => &$val){
            $newArr[$keyPrefix.$key] = $val;
            unset($arrayIn[$key]);
        }
        unset($arrayIn);
        return $newArr;
    }

    /**
     * @param int $limit
     * @param string $order
     * @return License[]
     * @throws Exception
     */
    public function getAll( $limit = 0, $order="purchaseDate") {
        global $config;

//         INNER JOIN `users` as `u` on l.assignedFor=u.id
//         INNER JOIN `invoicepurchase` as `i` on l.invoiceId=l.id
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $query = "SELECT `inventoryNumber`, `name`, `serialNumber`,`purchaseDate`,`supportTo`, `validTo`, `notes`, `assignedFor`, `invoiceId`
                FROM `license` as `l`
                ORDER BY $order DESC".($limit != 0 ? " LIMIT $limit" : "");
        $sth = $pdo->prepare($query);
        $sth->execute();

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        $result = $sth->fetchAll(PDO::FETCH_CLASS, "License");
        return $result;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function getNumberOfRecords() {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $sth = $pdo->query("SELECT COUNT(*) as `count` from `license` ");

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        return $sth->fetch(PDO::FETCH_ASSOC)['count'];
    }

    /**
     * @param array $conditions
     * @param string $order
     * @return License[]
     * @throws Exception
     */
    public static function findBy($conditions ,$order="purchaseDate") {
        global $config;

        $condition = "";

        if (array_key_exists('name', $conditions) && $condition != "") {
            $condition .= " AND name LIKE :name";
            $conditions['name'] = "%".$conditions['name']."%";
        } else if (array_key_exists('name', $conditions)) {
            $condition .= "name LIKE :name";
            $conditions['name'] = "%".$conditions['name']."%";
        }

        $conditions = self::changeKeys($conditions,":");

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);

        $query = "SELECT `inventoryNumber`, `name`, `serialNumber`,`purchaseDate`,`supportTo`, `validTo`, `notes`, `assignedFor`, `invoiceId`
                FROM `license` as `l`
                WHERE ".$condition
                ." ORDER BY $order DESC";
        //var_dump($query);
        $sth = $pdo->prepare($query);
        $sth->execute($conditions);

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        $result = $sth->fetchAll(PDO::FETCH_CLASS, "License");
        return $result;
    }
}