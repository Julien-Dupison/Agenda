<?php

include "../database.php";
include "../class.php";

CategoriesClass::add(array($_POST['nom'],$_POST['couleur']));