<?php

class InvoicePurchase
{
    private $id;
    private $invoiceNumber;
    private $taxId;
    private $date;
    private $amountNet;
    private $amountGross;
    private $amountTax;
    private $amountNetCurrency;
    private $amountNetCurrencyValue;

    /**
     * @param mixed $invoiceNumber
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAmountGross()
    {
        return $this->amountGross;
    }

    /**
     * @return mixed
     */
    public function getAmountNet()
    {
        return $this->amountNet;
    }

    /**
     * @return mixed
     */
    public function getAmountNetCurrency()
    {
        return $this->amountNetCurrency;
    }

    /**
     * @return mixed
     */
    public function getAmountNetCurrencyValue()
    {
        return $this->amountNetCurrencyValue;
    }

    /**
     * @return mixed
     */
    public function getAmountTax()
    {
        return $this->amountTax;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * @param mixed $amountGross
     */
    public function setAmountGross($amountGross)
    {
        $this->amountGross = $amountGross;
    }

    /**
     * @param mixed $amountNet
     */
    public function setAmountNet($amountNet)
    {
        $this->amountNet = $amountNet;
    }

    /**
     * @param mixed $amountNetCurrency
     */
    public function setAmountNetCurrency($amountNetCurrency)
    {
        $this->amountNetCurrency = $amountNetCurrency;
    }

    /**
     * @param mixed $amountNetCurrencyValue
     */
    public function setAmountNetCurrencyValue($amountNetCurrencyValue)
    {
        $this->amountNetCurrencyValue = $amountNetCurrencyValue;
    }

    /**
     * @param mixed $amountTax
     */
    public function setAmountTax($amountTax)
    {
        $this->amountTax = $amountTax;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $taxId
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
    }
    /**
     * @return mixed
     */
    public function getStringfy()
    {
        return json_encode( array(
                $this->id,
                $this->invoiceNumber,
                $this->date,
                $this->taxId,
                $this->amountNet,
                $this->amountGross,
                $this->amountTax,
                $this->amountNetCurrencyValue,
                $this->amountNetCurrency)
        );
    }

}