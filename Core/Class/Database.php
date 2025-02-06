<?php

class Database extends PDO
{
    private static $instance;

    private const DBHOST = '';
    private const DBUSER = '';
    private const DBPASS = '';
    private const DBNAME = '';

    private function __construct()
    {
        # DSN de connexion
        # DSN de connexion
        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST;
 
        # Appel du constructeur de la classe PDO
        try{
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);
 
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public static function getInstance():self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}