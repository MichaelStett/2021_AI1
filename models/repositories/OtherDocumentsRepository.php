<?php


class OtherDocumentsRepository
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
    public function getAll( $limit = 0, $order="addDate") {
        global $config;

//         INNER JOIN `users` as `u` on l.assignedFor=u.id
//         INNER JOIN `invoicepurchase` as `i` on l.invoiceId=l.id
        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $query = "SELECT `id`, `name`, `date`,`numberOfPage`,`notes`
                FROM `otherdocuments` as `o`
                ORDER BY $order DESC".($limit != 0 ? " LIMIT $limit" : "");
        $sth = $pdo->prepare($query);
        $sth->execute();

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        $result = $sth->fetchAll(PDO::FETCH_CLASS, "OtherDocuments");
        return $result;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function getNumberOfRecords() {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $sth = $pdo->query("SELECT COUNT(*) as `count` from `otherdocuments` ");

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        return $sth->fetch(PDO::FETCH_ASSOC)['count'];
    }
}