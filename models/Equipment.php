<?php


class Equipment implements JsonSerializable
{
    private $inventoryNumber;
    private $name;
    private $serialNumber;
    private $purchaseDate;
    private $warrantyTo;
    private $amountNet;
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
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
     * @return Equipment
     */
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWarrantyTo()
    {
        return $this->warrantyTo;
    }

    /**
     * @param mixed $warrantyTo
     * @return Equipment
     */
    public function setWarrantyTo($warrantyTo)
    {
        $this->warrantyTo = $warrantyTo;
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
     * @return Equipment
     */
    public function setAmountNet($amountNet)
    {
        $this->amountNet = $amountNet;
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
     * @return Equipment
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