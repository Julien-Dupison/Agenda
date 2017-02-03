<?php

$db_ip = "127.0.0.1";
$db_base = "agenda";
$db_user = "root";
$db_pass = "";


try
{
	$db = new PDO('mysql:host='.$db_ip.';dbname='.$db_base.'', $db_user, $db_pass);
	$db->exec("SET CHARACTER SET utf8");
}

catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>
