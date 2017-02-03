<?php
include "../database.php";
include "../class.php";

evenements::editTitre($_POST['id'],$_POST['valeur']);