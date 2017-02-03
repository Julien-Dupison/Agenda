<?php

include "../database.php";
include "../class.php";

categories::add(array($_POST['nom'],$_POST['couleur']));