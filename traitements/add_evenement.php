<?php

include "../database.php";
include "../class.php";

evenementsClass::add(array($_POST['title'],$_POST['content'],$_POST['datedeb'],$_POST['datefin'],1));