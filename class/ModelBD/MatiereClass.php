<?php


class MatiereClass implements DatabaseClass
{
    public static function selectAll()
    {
        // TODO: Implement selectAll() method.
    }

    public static function select($id)
    {
        // TODO: Implement select() method.
    }

    public static function add($params)
    {
        // TODO: Implement add() method.
    }

    public static function edit($params)
    {
        // TODO: Implement edit() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function selectWithLibelle($libelle)
    {
        global $db;
        $matches=[];
        preg_match("/ \\S+$/", $libelle, $matches);
        $libelle = substr($libelle, 0, -strlen($matches[0]));

        $sql = "SELECT * FROM agenda.matiere WHERE matiere_libelle LIKE ".$db->quote($libelle);
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

}