<?php

class InvoicePurchase implements \JsonSerializable
{
    private $id;
    private $name;
    private $invoiceNumber;
    private $taxId;
    private $date;
    private $amountNet;
    private $amountGross;
    private $amountTax;
    private $amountNetCurrency;
    private $amountNetCurrencyValue;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return InvoicePurchase
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return InvoicePurchase
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param mixed $invoiceNumber
     * @return InvoicePurchase
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * @param mixed $taxId
     * @return InvoicePurchase
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return InvoicePurchase
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmountNet()
    {
        return $this->amountNet;
    }

    /**
     * @param mixed $amountNet
     * @return InvoicePurchase
     */
    public function setAmountNet($amountNet)
    {
        $this->amountNet = $amountNet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmountGross()
    {
        return $this->amountGross;
    }

    /**
     * @param mixed $amountGross
     * @return InvoicePurchase
     */
    public function setAmountGross($amountGross)
    {
        $this->amountGross = $amountGross;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmountTax()
    {
        return $this->amountTax;
    }

    /**
     * @param mixed $amountTax
     * @return InvoicePurchase
     */
    public function setAmountTax($amountTax)
    {
        $this->amountTax = $amountTax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmountNetCurrency()
    {
        return $this->amountNetCurrency;
    }

    /**
     * @param mixed $amountNetCurrency
     * @return InvoicePurchase
     */
    public function setAmountNetCurrency($amountNetCurrency)
    {
        $this->amountNetCurrency = $amountNetCurrency;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmountNetCurrencyValue()
    {
        return $this->amountNetCurrencyValue;
    }

    /**
     * @param mixed $amountNetCurrencyValue
     * @return InvoicePurchase
     */
    public function setAmountNetCurrencyValue($amountNetCurrencyValue)
    {
        $this->amountNetCurrencyValue = $amountNetCurrencyValue;
        return $this;
    }



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
            currencyEnum::currencyTable[$this->amountNetCurrency].",";
    }

    /**
     * @return string
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        $vars['amountNetCurrency'] = currencyEnum::currencyTable[$vars['amountNetCurrency']];

        return $vars;
    }
}