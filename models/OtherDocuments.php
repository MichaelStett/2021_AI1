<?php


class OtherDocuments implements JsonSerializable
{
    private $id;
    private $name;
    private $date;
    private $firstSide;
    private $secondSide;
    private $notes;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return OtherDocuments
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
     * @return OtherDocuments
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return OtherDocuments
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return mixed
     */
    public function getFirstSide()
    {
        return $this->firstSide;
    }

    /**
     * @return mixed
     */
    public function getSecondSide()
    {
        return $this->secondSide;
    }

    /**
     * @param mixed $firstSide
     * * @return OtherDocuments
     */
    public function setFirstSide($firstSide)
    {
        $this->firstSide = $firstSide;
        return $this;
    }

    /**
     * @param mixed $secondSide
     * * @return OtherDocuments
     */
    public function setSecondSide($secondSide)
    {
        $this->secondSide = $secondSide;
        return $this;
    }

    /**
     * @param mixed $notes
     * @return OtherDocuments
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
