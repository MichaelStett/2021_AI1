<?php

global $config;

class InvoiceSaleRepository
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
     * @return InvoiceSale[]
     * @throws Exception
     */
    public function getAll( $limit = 25, $order="addDate") {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $query = "SELECT `id`, `invoiceNumber`, `addDate`,k.`vatID`,`name`, `amountNet`, `amountTax`, `amountGross`, `amountNetCurrencyValue`, `amountNetCurrency` FROM `invoiceSale` as `f` INNER JOIN `contractor` as `k` on k.vatID=f.vatID ORDER BY $order DESC".($limit != 0 ? " LIMIT $limit" : "");
        $sth = $pdo->prepare($query);
        $sth->execute();

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
        return $result;
    }

    /**
     * @param array $conditions
     * @param string $order
     * @return InvoiceSale[]
     * @throws Exception
     */
    public static function findBy($conditions ,$order="addDate") {
        global $config;

        $condition = "";

        if (array_key_exists('id', $conditions) && $condition != "") {
            $condition .= " AND id=:id";
        } else if (array_key_exists('id', $conditions)) {
            $condition .= "id=:id";
        }
        if (array_key_exists('invoiceNumber', $conditions) && $condition != "") {
            $condition .= " AND invoiceNumber LIKE :invoiceNumber";
            $conditions['invoiceNumber'] = "%".$conditions['invoiceNumber']."%";
        } else if (array_key_exists('invoiceNumber', $conditions)) {
            $condition .= "invoiceNumber LIKE :invoiceNumber";
            $conditions['invoiceNumber'] = "%".$conditions['invoiceNumber']."%";
        }
        if (array_key_exists('vatID', $conditions) && $condition != "") {
            $condition .= " AND vatID LIKE :vatID";
            $conditions['vatID'] = "%".$conditions['vatID']."%";
        } else if (array_key_exists('vatID', $conditions)) {
            $condition .= "vatID LIKE :vatID";
            $conditions['vatID'] = "%".$conditions['vatID']."%";
        }
        if (array_key_exists('name', $conditions) && $condition != "") {
            $condition .= " AND name LIKE :name";
            $conditions['name'] = "%".$conditions['name']."%";
        } else if (array_key_exists('name', $conditions)) {
            $condition .= "name LIKE :name";
            $conditions['name'] = "%".$conditions['name']."%";
        }
        // DATA FILTER
        if (array_key_exists('dateAddStart', $conditions) && $condition != "") {
            $condition .= " AND addDate>=:dateAddStart";
        } else if (array_key_exists('dateAddStart', $conditions) ) {
            $condition .= "addDate>=:dateAddStart";
        }
        if (array_key_exists('dateAddEnd', $conditions) && $condition != "") {
            $condition .= " AND addDate<=:dateAddEnd";
        } else if (array_key_exists('dateAddEnd', $conditions)) {
            $condition .= "addDate<=:dateAddEnd";
        }

        $conditions = self::changeKeys($conditions,":");

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $query = "SELECT `id`, `invoiceNumber`, `addDate`, `k`.`vatID`,`name`, `amountNet`, `amountTax`, `amountGross`, `amountNetCurrencyValue`, `amountNetCurrency` FROM `invoiceSale` as `f` INNER JOIN `contractor` as `k` on k.vatID=f.vatID WHERE "
            .$condition
            ." ORDER BY $order DESC";
        $sth = $pdo->prepare($query);
        $sth->execute($conditions);

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
        return $result;
    }


}
