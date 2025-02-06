<?php

class ConsoleRepository extends Database
{
    private $table;
    private $cnx;

    public function __construct()
    {
        $this->table = 'console';
        $this->cnx = parent::getInstance();
    }

    # Recuperer toutes les consoles d'une collection
    public function get_all_consoles($idcollection)
    {
        $req = "SELECT * FROM ".$this->table." WHERE id_collection = ?;";
        $stmt = $this->cnx->prepare($req);

        if ($stmt->execute([$idcollection]))
        {
            return $stmt->fetchAll();
        }

        return false;
    }

    # Recuperer une console d'une collection
    public function get_console_by_id($idconsole)
    {
        $req = "SELECT * FROM ".$this->table." WHERE id = ?;";
        $stmt = $this->cnx->prepare($req);

        if ($stmt->execute([$idconsole]))
        {
            return $stmt->fetch();
        }

        return false;
    }

    # Ajouter une console dans une collection
    public function add_console($array)
    {
        $req = $req = "INSERT INTO ".$this->table." (`name`, `marque`, `id_collection`) VALUES (?,?,?);";
        $stmt = $this->cnx->prepare($req);

        if($stmt->execute([$array['name'], $array['marque'], $array['idcollection']]))
        {
            return "La console a bien été ajoutée...";
        }

        return false;
    }

    # Editer une console d'une collection
    public function update_console($array)
    {
        $req = "UPDATE ".$this->table." 
                SET name=?, marque=?, id_collection = ? 
                WHERE id=?";
        $stmt = $this->cnx->prepare($req);

        if($stmt->execute([$array['name'],$array['marque'],$array['idcollection'],$array['id']]))
        {
            return true;
        }

        return false;
    }

    # Supprimer une console d'une collection
    public function delete_console($idconsole)
    {
        $req = "DELETE FROM ".$this->table." WHERE id=?";
        $stmt = $this->cnx->prepare($req);

        if ($stmt->execute([$idconsole]))
        {
            return "La console a bien été supprimée...";
        }

        return false;
    }
    
    # Trier l'order des console par (name, marque)

    
}