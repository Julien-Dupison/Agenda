<?php
include "../database.php";
include "../class.php";

echo json_encode(UtilisateurClass::searchAll($_GET['search']));