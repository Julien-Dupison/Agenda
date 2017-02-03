<?php
include "../database.php";
include "../class.php";

evenements::editContenu($_POST['id'],$_POST['valeur']);