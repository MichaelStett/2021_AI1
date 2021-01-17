<?php


class License implements JsonSerializable
{
    private $inventoryNumber;
    private $name;
    private $serialNumber;
    private $purchaseDate;
    private $supportTo;
    private $validTo;
    private $notes;
    private $assignedFor;
    private $invoiceId;

    /**
     * @return mixed
     */
    public function getAssignedFor()
    {
        return $this->assignedFor;
    }

    /**
     * @param mixed $assignedFor
     * @return License
     */
    public function setAssignedFor($assignedFor)
    {
        $this->assignedFor = $assignedFor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param mixed $invoiceId
     * @return License
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInventoryNumber()
    {
        return $this->inventoryNumber;
    }

    /**
     * @param mixed $inventoryNumber
     * @return License
     */
    public function setInventoryNumber($inventoryNumber)
    {
        $this->inventoryNumber = $inventoryNumber;
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
     * @return License
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param mixed $serialNumber
     * @return License
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * @param mixed $purchaseDate
     * @return License
     */
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSupportTo()
    {
        return $this->supportTo;
    }

    /**
     * @param mixed $supportTo
     * @return License
     */
    public function setSupportTo($supportTo)
    {
        $this->supportTo = $supportTo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * @param mixed $validTo
     * @return License
     */
    public function setValidTo($validTo)
    {
        $this->validTo = $validTo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     * @return License
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }



    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}