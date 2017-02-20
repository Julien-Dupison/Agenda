<?php

class UtilisateurClass implements DatabaseClass
{
    public static function selectAll ()
    {
        global $db;

        $sql = "SELECT * FROM utilisateurs WHERE utilisateur_visibilite = '1'";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function select ($id)
    {
        global $db;

        $sql = "SELECT * FROM utilisateurs WHERE utilisateur_id = $id AND utilisateur_visibilite = '1'";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    /*
        array(nom,prenom,username,password,mail);
    */
    public static function add ($param)
    {
        global $db;

        $sql = "INSERT INTO utilisateurs (utilisateur_nom,utilisateur_prenom,utilisateur_username,utilisateur_password,utilisateur_mail) VALUES (?,?,?,?,?)";
        $db->prepare($sql)->execute($param);
    }

    public static function edit ($params)
    {
        global $db;

        $sql = "UPDATE utilisateurs SET utilisateur_nom = '$param[1]', utilisateur_prenom = '$param[2]', utilisateur_username = '$param[3]', utilisateur_password = '$param[4]', utilisateur_mail = '$param[5]' WHERE utilisateur_id = $param[0]";
        $db->prepare($sql)->execute();
    }

    public static function delete ($id)
    {
        global $db;

        $sql = "UPDATE utilisateurs SET utilisateur_visibilite = '0' WHERE utilisateur_id = $id";
        $req = $db->prepare($sql)->execute();
    }

    public static function search($username,$password)
    {
        global $db;

        $sql = "SELECT * FROM utilisateurs WHERE utilisateur_username = '$username' AND utilisateur_password = '$password' AND utilisateur_visibilite = '1'";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public static function searchAll($string)
    {
        global $db;

        $sql = "SELECT * FROM utilisateurs WHERE utilisateur_nom LIKE '%$string%' OR utilisateur_prenom LIKE '%$string%' LIMIT 20";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
