<?php


class CreneauClass implements DatabaseClass
{
    public static function selectAll()
    {
        global $db;

        $sql = "SELECT * FROM agenda.creneau";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectAllJour($idJour)
    {
        global $db;

        $sql = "SELECT * FROM agenda.creneau WHERE jour_id = ".$db->quote($idJour);
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function select($id)
    {
        global $db;

        $sql = "SELECT * FROM agenda.creneau WHERE creneau_id = ".$db->quote($id);
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }



    public static function add($params)
    {
        global $db;

        $sql = "INSERT INTO agenda.creneau(matiere_id, jour_id,type_matiere_id, creneau_numero, Salle) VALUES (".$params["matiere_id"].", ".$params["jour_id"].", ".$params["type_matiere_id"].", ".$params["numero"].", ".$params["salle"].")";
        return $req = $db->query($sql);
    }

    public static function edit($params)
    {
        // TODO: Implement edit() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

}