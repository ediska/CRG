<?php

class Console
{
    public $id;
    public $name;
    public $marque;
    public $idcollection;

    public function __construct($id, $name, $marque, $idcollection)
    {
        $this->id = $id;
        $this->name = $name;
        $this->marque = $marque;
        $this->idcollection = $idcollection;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
            return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
            $this->name = $name;

            return $this;
    }

    /**
     * Get the value of marque
     */ 
    public function getMarque()
    {
            return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
            $this->marque = $marque;

            return $this;
    }
        
    /**
     * Get the value of idcollection
     */ 
    public function getIdcollection()
    {
            return $this->idcollection;
    }

    /**
     * Set the value of idcollection
     *
     * @return  self
     */ 
    public function setIdcollection($idcollection)
    {
            $this->idcollection = $idcollection;

            return $this;
    }

        


}


?>