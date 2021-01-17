<?php


class OtherDocuments implements JsonSerializable
{
    private $id;
    private $name;
    private $date;
    private $numOfPage;
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
    public function getNumOfPage()
    {
        return $this->numOfPage;
    }

    /**
     * @param mixed $numOfPage
     * @return OtherDocuments
     */
    public function setNumOfPage($numOfPage)
    {
        $this->numOfPage = $numOfPage;
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