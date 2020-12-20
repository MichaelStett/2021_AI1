<?php

class InvoiceSale implements \JsonSerializable
{
    private $id;
    private $numerFaktury;
    private $dataDodania;
    private $vatID;
    private $nazwa;
    private $kwotaNetto;
    private $kwotaPodatku;
    private $kwotaBrutto;
    private $kwotaNettoWWalucie;
    private $nazwaWaluty;

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
    public function getNumerFaktury()
    {
        return $this->numerFaktury;
    }

    /**
     * @param mixed $numerFaktury
     * @return InvoiceSale
     */
    public function setNumerFaktury($numerFaktury)
    {
        $this->numerFaktury = $numerFaktury;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataDodania()
    {
        return $this->dataDodania;
    }

    /**
     * @param mixed $dataDodania
     * @return InvoiceSale
     */
    public function setDataDodania($dataDodania)
    {
        $this->dataDodania = $dataDodania;
        return $this;
    }

    /**
     * @return mixed
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
     * @return mixed
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param mixed $nazwa
     * @return InvoiceSale
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKwotaNetto()
    {
        return $this->kwotaNetto;
    }

    /**
     * @param mixed $kwotaNetto
     * @return InvoiceSale
     */
    public function setKwotaNetto($kwotaNetto)
    {
        $this->kwotaNetto = $kwotaNetto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKwotaPodatku()
    {
        return $this->kwotaPodatku;
    }

    /**
     * @param mixed $kwotaPodatku
     * @return InvoiceSale
     */
    public function setKwotaPodatku($kwotaPodatku)
    {
        $this->kwotaPodatku = $kwotaPodatku;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKwotaBrutto()
    {
        return $this->kwotaBrutto;
    }

    /**
     * @param mixed $kwotaBrutto
     * @return InvoiceSale
     */
    public function setKwotaBrutto($kwotaBrutto)
    {
        $this->kwotaBrutto = $kwotaBrutto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKwotaNettoWWalucie()
    {
        return $this->kwotaNettoWWalucie;
    }

    /**
     * @param mixed $kwotaNettoWWalucie
     * @return InvoiceSale
     */
    public function setKwotaNettoWWalucie($kwotaNettoWWalucie)
    {
        $this->kwotaNettoWWalucie = $kwotaNettoWWalucie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNazwaWaluty()
    {
        return currencyEnum::currencyTable[$this->nazwaWaluty];
    }

    /**
     * @param mixed $nazwaWaluty
     * @return InvoiceSale
     */
    public function setNazwaWaluty(currencyEnum $nazwaWaluty)
    {
        $this->nazwaWaluty = $nazwaWaluty;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStringfy()
    {
        return json_encode( array(
            $this->id,
            $this->numerFaktury,
            $this->nazwa,
            $this->dataDodania,
            $this->vatID,
            $this->kwotaNetto,
            $this->kwotaBrutto,
            $this->kwotaPodatku,
            $this->kwotaNettoWWalucie,
            $this->nazwaWaluty)
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return
                $this->id.
                $this->numerFaktury.
                $this->nazwa.
                $this->dataDodania.
                $this->vatID.
                $this->kwotaNetto.
                $this->kwotaBrutto.
                $this->kwotaPodatku.
                $this->kwotaNettoWWalucie.
                $this->nazwaWaluty;
    }


    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}