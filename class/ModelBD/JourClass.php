<?php


class JourClass implements DatabaseClass
{
    public static function selectAll()
    {
        global $db;

        $sql = "SELECT * FROM agenda.jour";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public static function select($id)
    {
        global $db;

        $sql = "SELECT * FROM agenda.jour WHERE jour_id = ".$db->quote($id);
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($params)
    {
        global $db;

        $sql = "INSERT INTO agenda.jour (jour_date, jour_libelle) VALUES (".$db->quote($params["date"]).", ".$db->quote($params["libelle"]).")";
        print_r($sql."\n");
        return $req = $db->query($sql);
    }

    public static function edit($params)
    {
        // TODO: Implement edit() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
        return false;
    }

    public static function selectWithDate($date)
    {
        global $db;

        $sql = "SELECT * FROM agenda.jour WHERE jour_date = ".$db->quote($date);
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

}