<?php

global $config;

class InvoiceSaleRepository
{

    /**
     * @return InvoiceSale[]
     */
    public function getAll() {
        global $config;

        $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
        $sth = $pdo->query("SELECT * FROM `invoice_sale`");

        if ($sth != false) {
            $result = $sth->fetchAll(PDO::FETCH_CLASS, "InvoiceSale");
        }

        return $result;
    }


}
