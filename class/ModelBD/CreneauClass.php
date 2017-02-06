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

    public static function selectAllInformations($idJour){
        global $db;

        $sql = "SELECT creneau_id, creneau_numero, Salle, matiere_libelle, professeur_acronyme, type_matiere.type_matiere_libelle FROM creneau
        LEFT JOIN matiere ON creneau.matiere_id = matiere.matiere_id
        LEFT JOIN lien_professeur_matiere ON matiere.matiere_id = lien_professeur_matiere.matiere_id
        LEFT JOIN professeur ON lien_professeur_matiere.professeur_id = professeur.professeur_id
        LEFT JOIN type_matiere ON creneau.type_matiere_id = type_matiere.type_matiere_id
        WHERE jour_id = ".$db->quote($idJour);

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function select($id)
    {
        global $db;

        $sql = "SELECT * FROM agenda.creneau WHERE creneau_id = ".$db->quote($id);
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($params)
    {
        global $db;

        $sql = "INSERT INTO agenda.creneau(matiere_id, jour_id,type_matiere_id, creneau_numero, Salle) VALUES (?,?,?,?,?)";
        $req = $db->prepare($sql)->execute($params);
        if ($req)
        {
            print_r("Créneau ajouté : ".print_r($params, true)."\n\n");
        }
        else{
            print_r("Créneau non ajouté : ".print_r($params, true)."\n\n");
        }
        return $req;
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