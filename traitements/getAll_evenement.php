<?php
include "../database.php";
include "../class.php";

if(isset($_POST['date'])){
    echo json_encode(EvenementsClass::selectDate($_POST['date']));
} else {
    echo json_encode(EvenementsClass::selectDate());
}