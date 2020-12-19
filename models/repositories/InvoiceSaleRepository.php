<?php

global $config;

class InvoiceSaleRepository
{

    /**
     * @return InvoiceSale[]
     */
    public function getAll($limit = 0) {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $sth = $pdo->query("SELECT * FROM `invoice_sale` ORDER BY `invoiceNumber`".($limit > 0 ? " LIMIT ".$limit : ""));

        if ($sth != false) {
            $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
        }

        return $result;
    }


}
