<?php

class InvoiceSale
{
    private $id;
    private $invoiceNumber;
    private $contractorName;
    private $taxId;
    private $addDate;
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
     * @return InvoiceSale
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
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
     * @return mixed
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
     * @return mixed
     */
    public function getContractorName()
    {
        return $this->contractorName;
    }

    /**
     * @param mixed $contractorName
     * @return InvoiceSale
     */
    public function setContractorName($contractorName)
    {
        $this->contractorName = $contractorName;
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
     * @return InvoiceSale
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
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
     * @return InvoiceSale
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
     * @return InvoiceSale
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
     * @return InvoiceSale
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
        return currencyEnum::currencyTable[$this->amountNetCurrency];
    }

    /**
     * @param mixed $amountNetCurrency
     * @return InvoiceSale
     */
    public function setAmountNetCurrency(currencyEnum $amountNetCurrency)
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
     * @return InvoiceSale
     */
    public function setAmountNetCurrencyValue($amountNetCurrencyValue)
    {
        $this->amountNetCurrencyValue = $amountNetCurrencyValue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStringfy()
    {
        return json_encode( array(
            $this->id,
            $this->invoiceNumber,
            $this->contractorName,
            $this->addDate,
            $this->taxId,
            $this->amountNet,
            $this->amountGross,
            $this->amountTax,
            $this->amountNetCurrencyValue,
            $this->amountNetCurrency)
        );
    }

}