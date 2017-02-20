<?php
    include "../database.php";
    include "../class.php";

    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = UtilisateurClass::search($username,$password);

    if($user){
        $_SESSION["id_user"] = $user["utilisateur_id"];
        $return = array("status" => true);
    } else {
        $return = array("status" => false);
    }

    echo json_encode($return);