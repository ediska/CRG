<?php

class UserRepository extends Database
{

    private $table;
    private $cnx;


    public function __construct()
    {
        $this->cnx = parent::getInstance();
        $this->table = 'users';
    }

    public function get_user_by($field, $data)
    {
        $req = "SELECT  u.id, u.email,u.username,u.password,u.name,u.lastname, cl.id as id_collection, cl.name as collection_name
                FROM 
                    ".$this->table." as u,
                    collection as cl
                WHERE u.".$field." = ?
                AND cl.id_user = u.id;";
        $stmt = $this->cnx->prepare($req);

        if ($stmt->execute([$data]))
        {
            return $stmt->fetch();
        }

        return null;
    }

    public function create_user($array)
    {
        $response = null;

        # Hash du password
        $pass_hash = md5($array['password']);
        # Requete de l'insertion
        $req = "INSERT INTO ".$this->table." (`name`, `lastname`, `username`, `email`, `password`) VALUES(?,?,?,?,?);";
        $stmt = $this->cnx->prepare($req);
        $stmt->execute([
            $array['name'], $array['lastname'], $array['username'], $array['email'], $pass_hash
        ]);

        # Recupereration de last id
        $response = $this->cnx->lastInsertId();

        # Création du dossier de l'user (pour les imgs, excel...)
        mkdir('DATA/'.$array['username']);
        mkdir('DATA/'.$array['username'].'/Img');
        mkdir('DATA/'.$array['username'].'/Excel');

        return $response;
    }


    
}