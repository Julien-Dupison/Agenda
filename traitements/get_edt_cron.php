<?php

include "../database.php";
include "../class.php";

categories::add(array("test_cron","#ffffff"));

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://exnet.3il.fr/rp/TousCom/Emploi%20du%20temps/I1%20Groupe%205%20Apprentis.xml");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, 'dupisonj:comcha16sim');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($resultCode != 200){
    echo curl_error($ch);
}

$fileContents = curl_exec($ch);
$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
$fileContents = trim(str_replace('"', "'", $fileContents));
$simpleXml = simplexml_load_string($fileContents);
echo json_encode($simpleXml);

curl_close($ch);