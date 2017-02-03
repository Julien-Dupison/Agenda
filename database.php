<?php

try
{
	$db = new PDO('mysql:host='.BD_HOST.':'.BD_PORT.';dbname='.BD_NAME.'', BD_USER, BD_PASSWORD);
	$db->exec("SET CHARACTER SET utf8");
}

catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>
