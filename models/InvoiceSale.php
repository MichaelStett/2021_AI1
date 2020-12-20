<?php

class InvoiceSale implements \JsonSerializable
{

    private $invoiceNumber;
    private $name;
    private $vatID;
    private $addDate;
    private $amountNet;
    private $amountGross;
    private $amountTax;
    private $amountNetCurrencyValue;
    private $amountNetCurrency;
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return InvoiceSale
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param mixed $invoiceNumber
     * @return InvoiceSale
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * @param mixed $addDate
     * @return InvoiceSale
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getVatID()
    {
        return $this->vatID;
    }

    /**
     * @param mixed $vatID
     * @return InvoiceSale
     */
    public function setVatID($vatID)
    {
        $this->vatID = $vatID;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return InvoiceSale
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return double
     */
    public function getAmountNet()
    {
        return $this->amountNet;
    }

    /**
     * @param mixed $amountNet
     * @return InvoiceSale
     */
    public function setAmountNet($amountNet)
    {
        $this->amountNet = $amountNet;
        return $this;
    }

    /**
     * @return double
     */
    public function getAmountTax()
    {
        return $this->amountTax;
    }

    /**
     * @param mixed $amountTax
     * @return InvoiceSale
     */
    public function setAmountTax($amountTax)
    {
        $this->amountTax = $amountTax;
        return $this;
    }

    /**
     * @return double
     */
    public function getAmountGross()
    {
        return $this->amountGross;
    }

    /**
     * @param mixed $amountGross
     * @return InvoiceSale
     */
    public function setAmountGross($amountGross)
    {
        $this->amountGross = $amountGross;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountNetCurrency()
    {
        return currencyEnum::currencyTable[$this->amountNetCurrency];
    }

    /**
     * @param mixed $amountNetCurrency
     * @return InvoiceSale
     */
    public function setAmountNetCurrency($amountNetCurrency)
    {
        $this->amountNetCurrency = $amountNetCurrency;
        return $this;
    }

    /**
     * @return double
     */
    public function getAmountNetCurrencyValue()
    {
        return $this->amountNetCurrencyValue;
    }

    /**
     * @param currencyEnum $amountNetCurrencyValue
     * @return InvoiceSale
     */
    public function setAmountNetCurrencyValue( currencyEnum $amountNetCurrencyValue)
    {
        $this->amountNetCurrencyValue = $amountNetCurrencyValue;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return
                $this->id.",".
                $this->invoiceNumber.",".
                $this->name.",".
                $this->addDate.",".
                $this->vatID.",".
                $this->amountNet.",".
                $this->amountGross.",".
                $this->amountTax.",".
                $this->amountNetCurrencyValue.",".
                $this->amountNetCurrency.",";
    }


    /**
     * @return string
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}