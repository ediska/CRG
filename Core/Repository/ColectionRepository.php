<?php


class ColectionRepository extends Database
{
    private $table;
    private $cnx;

    public function __construct()
    {
        $this->cnx = parent::getInstance();
        $this->table = 'collection'; 
    }

    public function create_collection($name, $id_user)
    {
        $req = "INSERT INTO `".$this->table."` (`name`,`id_user`) VALUES(?,?);";
        $stmt = $this->cnx->prepare($req);
        $stmt->execute([$name, $id_user]);
    }
}