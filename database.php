<?php

$db_ip = "20925b91-0409-444e-9f69-1735d49e9274.pdb.ovh.net:21277";
$db_base = "agenda";
$db_user = "agenda";
$db_pass = "agenda87";


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
