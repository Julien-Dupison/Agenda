<?php
    session_start();
    $login = $_POST["login"];
    $password = $_POST["password"];

    //TODO : recupérer l'id de l'utilisateur en base et remplir la session

    $_SESSION["id_user"] = 1;
    $return = array("status" => "true");

    echo json_encode($return);

?>