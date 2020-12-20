<?php

global $config;

class InvoiceSaleRepository
{

    /**
     * @return InvoiceSale[]
     */
    public function getAll($limit = 25,$order="dataDodania") {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $sth = $pdo->query("SELECT `id`, `numerFaktury`, `dataDodania`, `k`.`vatID`,`nazwa`, `kwotaNetto`, `kwotaPodatku`, `kwotaBrutto`, `kwotaNettoWWalucie`, `nazwaWaluty` FROM `faktury_sprzedazy` as `f` INNER JOIN `kontrahent` as `k` on k.vatID=f.vatID ORDER BY `.$order.`"
            .($limit > 0 ? " LIMIT ".$limit : ""));

        if ($sth != false) {
            $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
        }

        return $result;
    }

    /**
     * @return InvoiceSale[]
     */
    public static function findBy($conditions ,$order="dataDodania") {
        global $config;

        $condition = "";
        if (array_key_exists('id', $conditions) && $condition != "") {
            $condition .= " AND id='".$conditions['id']."'";
        } else if (array_key_exists('id', $conditions)) {
            $condition .= "id='".$conditions['id']."'";
        }
        if (array_key_exists('invoiceNumber', $conditions) && $condition != "") {
            $condition .= " AND numerFaktury='".$conditions['invoiceNumber']."'";
        } else if (array_key_exists('invoiceNumber', $conditions)) {
            $condition .= "numerFaktury='".$conditions['invoiceNumber']."'";
        }
        if (array_key_exists('vatID', $conditions) && $condition != "") {
            $condition .= " AND vatID='".$conditions['vatID']."'";
        } else if (array_key_exists('vatID', $conditions)) {
            $condition .= "vatID='".$conditions['vatID']."'";
        }
        if (array_key_exists('name', $conditions) && $condition != "") {
            $condition .= " AND nazwa='".$conditions['name']."'";
        } else if (array_key_exists('name', $conditions)) {
            $condition .= "nazwa='".$conditions['name']."'";
        }
        // DATA FILTER
        if (array_key_exists('dateAddStart', $conditions) && $condition != "") {
            $condition .= " AND dataDodania>='".$conditions['dateAddStart']."'";
        } else if (array_key_exists('dateAddStart', $conditions) ) {
            $condition .= "dataDodania>='".$conditions['dateAddStart']."'";
        }
        if (array_key_exists('dateAddEnd', $conditions) && $condition != "") {
            $condition .= " AND dataDodania<='".$conditions['dateAddEnd']."'";
        } else if (array_key_exists('dateAddEnd', $conditions)) {
            $condition .= "dataDodania<='".$conditions['dateAddEnd']."'";
        }

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $query = "SELECT `id`, `numerFaktury`, `dataDodania`, `k`.`vatID`,`nazwa`, `kwotaNetto`, `kwotaPodatku`, `kwotaBrutto`, `kwotaNettoWWalucie`, `nazwaWaluty` FROM `faktury_sprzedazy` as `f` INNER JOIN `kontrahent` as `k` on k.vatID=f.vatID WHERE "
            .$condition." ORDER BY `dataDodania`";
        $sth = $pdo->query($query);

        if ($sth != false) {
            $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
            return $result;
        }

        return false;
    }


}
