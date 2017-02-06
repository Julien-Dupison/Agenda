<?php

class TypeMatiereClass implements DatabaseClass
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

    public static function getAcronymeFromLibelle($libelle)
    {
        preg_match("/ \\S+$/", $libelle, $matches);
        return str_replace(' ', '', substr($libelle, -strlen($matches[0]), 0));
    }

    public static function selectWithAcronyme($acro)
    {
        global $db;

        $sql = "SELECT * FROM agenda.type_matiere WHERE type_matiere_acronyme = ".$db->quote($acro);
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

}