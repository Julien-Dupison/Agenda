<?php

include_once "../database.php";
include_once "../class.php";


$fileRecup = "I1%20Groupe%205%20Apprentis.xml";
$logFile = UtilitaireClass::generateLogFile();

function writeLog($msg)
{
    global $logFile;
    file_put_contents($logFile, $msg, FILE_APPEND);
}

ob_start("writeLog");

try
{
    $edtCurl = new EdtCurlClass($fileRecup);
}
catch (Exception $e)
{
    print_r($e->getMessage());
    print_r($e->getTrace());
    exit(1);
}

$jourModify = array("ajout" => array(), "modifie" => array());
$creneauModify = array("ajout" => array(), "modifie" => array());
foreach ($edtCurl->getJour() as $jour) {
    $date = $jour->Date;
    $jourExists = $edtCurl->jourExists(EdtCurlClass::convertDateForSQL($date));

    if (!$jourExists)
    {
        print_r("Ajout du jour : ".$jour->Date."\n");
        $jourModify["ajout"][] = $jour;
    }
    elseif ($edtCurl->isJourModify($jourExists["jour_date"], array("date" => EdtCurlClass::convertDateForSQL($date))))
    {
        print_r("Modification du jour : ".$jour->Date."\n");
        $jourModify["modifie"][] = $jour;
    }

    foreach ($jour->xpath("./CRENEAU") as $creneau) {
        if (in_array($jour, $jourModify["ajout"]))
        {
            print_r("Ajout du créneau : ".$creneau->Creneau." pour le jour ".$jour->Date."\n");
            $creneauModify["ajout"][] = $creneau;
        }
        else
        {
            $creneauExists = $edtCurl->creneauExists($jourExists["jour_id"], $creneau->Creneau);
            if (!$creneauExists){
                print_r("Ajout du créneau : ".$creneau->Creneau." pour le jour ".$jour->Date."\n");
                $creneauModify["ajout"][] = $creneau;
            }
            elseif ($edtCurl->isCreneauModify($creneauExists["creneau_id"], json_encode($creneau, true)))
            {
                print_r("Modification du créneau : ".$creneau->Creneau." pour le jour ".$jour->Date."\n");
                $creneauModify["modifie"][] = $creneau;
            }
        }
    }
}

$edtCurl->addJours($jourModify["ajout"]);
$edtCurl->addCreneau($creneauModify["ajout"]);

//TODO Modification des créneaux et des jours

ob_end_flush();
