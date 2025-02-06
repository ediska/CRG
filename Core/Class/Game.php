<?php


class Game
{
    public $id;
    public $name;
    public $genre;
    public $editeur;
    public $nameimg;
    public $console;
    public $idCollection;


    public function __construct($id, $name, $genre, $editeur, $nameimg, $console, $idCollection)
    {
        $this->id = $id;
        $this->name = $name;
        $this->genre = $genre;
        $this->editeur = $editeur;
        $this->nameimg = $nameimg;
        $this->console = $console;
        $this->idCollection = $idCollection;
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
     * Get the value of genre
     */ 
    public function getGenre()
    {
            return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
            $this->genre = $genre;

            return $this;
    }

    /**
     * Get the value of editeur
     */ 
    public function getEditeur()
    {
            return $this->editeur;
    }

    /**
     * Set the value of editeur
     *
     * @return  self
     */ 
    public function setEditeur($editeur)
    {
            $this->editeur = $editeur;

            return $this;
    }

    /**
     * Get the value of nameimg
     */ 
    public function getNameimg()
    {
            return $this->nameimg;
    }

    /**
     * Set the value of nameimg
     *
     * @return  self
     */ 
    public function setNameimg($nameimg)
    {
            $this->nameimg = $nameimg;

            return $this;
    }

    /**
     * Get the value of console
     */ 
    public function getConsole()
    {
            return $this->console;
    }

    /**
     * Set the value of console
     *
     * @return  self
     */ 
    public function setConsole($console)
    {
            $this->console = $console;

            return $this;
    }

    /**
     * Get the value of idCollection
     */ 
    public function getIdCollection()
    {
            return $this->idCollection;
    }

    /**
     * Set the value of idCollection
     *
     * @return  self
     */ 
    public function setIdCollection($idCollection)
    {
            $this->idCollection = $idCollection;

            return $this;
    }
}