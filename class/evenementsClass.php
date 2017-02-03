<?php
class evenements implements DatabaseClass {

    public static function selectAll(){
        global $db;

        $sql = "SELECT * FROM evenements WHERE evenement_visibilite = 1 ORDER BY evenement_id ASC";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function select($id){
        global $db;

        $sql = "SELECT * FROM evenements WHERE evenement_id = $id";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public static function selectDate($date = 'NOW()'){
        global $db;
        if($date == 'NOW()'){
            $sql = "SELECT * FROM evenements WHERE CAST(".$date." AS DATE) BETWEEN evenement_datedeb AND evenement_datefin AND evenement_visibilite = 1 ORDER BY evenement_id ASC";
        } else {
            $sql = "SELECT * FROM evenements WHERE '".$date."' BETWEEN evenement_datedeb AND evenement_datefin AND evenement_visibilite = 1 ORDER BY evenement_id ASC";
        }
       return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
        array($titre,$contenu,datedeb,datefin,categorie);
    */
    public static function add($param){
        global $db;

        $sql = "INSERT INTO evenements (evenement_titre,evenement_contenu,evenement_datedeb,evenement_datefin,evenement_catégorie) VALUES (?,?,?,?,?)";
        $req = $db->prepare($sql)->execute($param);
    }

    /*
        array($id,$contenu,$datedeb,$datefin,$categorie);
    */
    public static function edit($param){
        global $db;

        $sql = "UPDATE evenements SET evenement_titre = '$param[1]', evenement_contenu = '$param[2]', evenement_datedeb = '$param[3]', evenement_datefin = '$param[4]', evenement_catégorie = '$param[5]' WHERE evenement_id = $param[0]";
        $req = $db->prepare($sql)->execute();
    }

    /*
        $id, $titre
     */
    public static function editTitre($id,$titre){
        global $db;

        $sql = "UPDATE evenements SET evenement_titre = '$titre' WHERE evenement_id = $id";
        $req = $db->prepare($sql)->execute();
    }

    /*
        $id, $contenu
     */
    public static function editContenu($id,$contenu){
        global $db;

        $sql = "UPDATE evenements SET evenement_contenu = '$contenu' WHERE evenement_id = $id";
        $req = $db->prepare($sql)->execute();
    }

    /*
        $id
    */
    public static function delete($id){
        global $db;

        $sql = "UPDATE evenements SET evenement_visibilite = '0' WHERE evenement_id = $id";
        $req = $db->prepare($sql)->execute();
    }

    /*
        $id
    */
    public static function deleteReal($id){
        global $db;

        $sql = "DELETE FROM evenements WHERE evenement_id = $id";
        $ordos = $db->prepare($sql);
        $ordos->execute();
    }

}
?>