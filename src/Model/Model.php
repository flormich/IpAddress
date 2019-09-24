<?php

abstract class Model
{
    private static $_bdd;

    // Instancie la connexsion a la Bdd
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=lorge_informatique;charset=ISO-8859-1','florian','Recycle74@');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Récupérer la connexion a la BDD
    protected function getBdd()
    {
        if(self::$_bdd == null)
            self::setBdd();
        return self::$_bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM' .table. 'ORDER BY id desc');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}