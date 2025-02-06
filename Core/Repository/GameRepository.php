<?php

class GameRepository extends Database
{

    private $table;
    private $cnx;

    public function __construct()
    {
        $this->table = 'games';
        $this->cnx = parent::getInstance();
    }

    # Recuperer ts les jeux d'une collection
    public function get_all_games($idcollection)
    {
        $req = "SELECT * FROM ".$this->table." WHERE id_collection = ?;";
        $stmt = $this->cnx->prepare($req);
        if ($stmt->execute([$idcollection]))
        {
            return $stmt->fetchAll();
        }

        return false;
    }

    # Recuperer un jeux par son id d'une collection
    public function get_game_by_id($idgame)
    {
        $req = "SELECT * FROM ".$this->table." WHERE id = ?;";
        $stmt = $this->cnx->prepare($req);
        
        if ($stmt->execute([$idgame]))
        {
            return $stmt->fetch();
        }

        return false;
    }

    # Ajouter un jeu dans une colletion
    public function add_game($array)
    {
        $req = "INSERT INTO ".$this->table." (`name`, `genre`, `editeur`, `console`, `id_collection`) VALUES (?,?,?,?,?)";
        $stmt = $this->cnx->prepare($req);
        
        if ($stmt->execute([
            $array['name'],$array['genre'],$array['editeur'],$array['console'],$array['idcollection']
        ])) {
            return 'Votre jeu a bien été enregistré..';
        }

        return null;
    }
    
    # Update un jeu d'une collection
    public function update_game($array)
    {   # name, genre, editeur, nameimg, collection, id_collection
        $req = "UPDATE ".$this->table." 
                SET name=?, genre=?, editeur=?, nameimg=?, console=?, id_collection = ? 
                WHERE id=?";
        $stmt = $this->cnx->prepare($req);

        if ($stmt->execute([$array['name'],$array['genre'],$array['editeur'],$array['nameimg']
            ,$array['console'], $array['idcollection'], $array['id']]))
        {
            return "Le jeu a bien été modifié....";
        }

        return false;
    }
    
    # Delete un jeu d'une collection
    public function delete_game($idgame)
    {
        $req = "DELETE FROM ".$this->table." WHERE id=?";
        $stmt = $this->cnx->prepare($req);

        if ($stmt->execute([$idgame]))
        {
            return "Le jeu a bien été supprimer...";
        }

        return false;
    }

    # Recupere le nb de jeux
    public function get_count_games($idcollection)
    {
        $req = 'SELECT count(name) as nb FROM '.$this->table.' WHERE id_collection = ?;';
        $stmt = $this->cnx->prepare($req);
        $stmt->execute([$idcollection]);
        $res = $stmt->fetch();
        
        if (count($res) > 0)
        {
            return $res['nb'];
        }

        return false;
    }

    # recuperer le dernier jeux enregistre d'un collection
    public function get_last_game($idcollection)
    {
        $result = self::get_all_games($idcollection);

        if ($result != false)
        {
            return $result[count($result)-1];
        }

        return false;
    }

    # TRier par ordre colonne (name,console,genre,editeur order by asc,desc)
}