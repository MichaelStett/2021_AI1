<?php

global $config;

class InvoiceSaleRepository
{

    private static function changeKeys(&$arrayIn, $prefix)
    {
        $newArr = [];
        foreach($arrayIn as $key => &$val){
            $newArr[':'.$key] = $val;
            unset($arrayIn[$key]);
        }
        unset($arrayIn);
        return $newArr;
    }

    /**
     * @return InvoiceSale[]
     */
    public function getAll($limit = 25,$order="addDate") {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $sth = $pdo->prepare("SELECT `id`, `invoiceNumber`, `addDate`, `k`.`vatID`,`name`, `amountNet`, `amountTax`, `amountGross`, `amountNetCurrencyValue`, `amountNetCurrency` FROM `invoiceSale` as `f` INNER JOIN `kontrahent` as `k` on k.vatID=f.vatID ORDER BY :orderBy");
        $sth->execute(array(":orderBy" => "$order"));

        if ($sth != false) {
            $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
        }

        if ($sth == false) {
            throw new Exception("pdo error");
        }
        return $result;
    }

    /**
     * @return InvoiceSale[]
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
            $condition .= " AND invoiceNumber=:invoiceNumber";
        } else if (array_key_exists('invoiceNumber', $conditions)) {
            $condition .= "invoiceNumber=:invoiceNumber";
        }
        if (array_key_exists('vatID', $conditions) && $condition != "") {
            $condition .= " AND vatID=:vatID";
        } else if (array_key_exists('vatID', $conditions)) {
            $condition .= "vatID=:vatID";
        }
        if (array_key_exists('name', $conditions) && $condition != "") {
            $condition .= " AND name=:name";
        } else if (array_key_exists('name', $conditions)) {
            $condition .= "name=:name";
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
        $conditions[":orderBy"] = $order;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $query = "SELECT `id`, `invoiceNumber`, `addDate`, `k`.`vatID`,`name`, `amountNet`, `amountTax`, `amountGross`, `amountNetCurrencyValue`, `amountNetCurrency` FROM `invoiceSale` as `f` INNER JOIN `kontrahent` as `k` on k.vatID=f.vatID WHERE "
            .$condition
            ." ORDER BY :orderBy";
        $sth = $pdo->prepare($query);
        $sth->execute($conditions);

        if ($sth == false) {
            throw new Exception("pdo error");
        }

        $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
        return $result;
    }


}
