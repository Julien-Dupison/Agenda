<?php

include "../database.php";
include "../class.php";

categoriesClass::add(array($_POST['nom'],$_POST['couleur']));