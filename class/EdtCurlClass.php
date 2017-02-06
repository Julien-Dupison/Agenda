<?php


class EdtCurlClass
{
    /**
     * @var SimpleXMLElement
     */
    private $XmlData;

    function __construct($file)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,URL_EDT."rp/TousCom/Emploi%20du%20temps/".$file);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERPWD, USER_TEST.':'.PWD_TEST);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $fileContents = curl_exec($ch);
        if($fileContents === false){
            throw new Exception("Une erreur est survenue durant le récupération des informations\n".print_r(curl_error($ch), true)."\n");
        }
        curl_close($ch);
        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        $fileContents = trim(str_replace('"', "'", $fileContents));
        $this->XmlData = simplexml_load_string($fileContents);

    }

    public function isCreneauModify($idCreneau, $datas)
    {
        // TODO
        return false;
    }

    public function creneauExists($idJour, $nbCreneau)
    {
        foreach (CreneauClass::selectAllJour($idJour) as $creneau) {
            if ($creneau["creneau_numero"] == $nbCreneau)
            {
                return true;
            }
        }
        return false;
    }

    public function isJourModify($idJour, $datas)
    {
        return false;
    }

    public function jourExists($date)
    {
        $result = JourClass::selectWithDate($date);
        if ($result === false)
        {
            return false;
        }
        elseif(sizeof($result) > 0)
        {
            return $result;
        }
        return false;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getXmlData()
    {
        return $this->XmlData;
    }

    public function getJour()
    {
        return $this->XmlData->xpath("//JOUR");
    }

    public function addJours($jours)
    {
        foreach ($jours as $jour) {
            switch ($jour->Jour)
            {
                case 2:
                    $lib = "Lundi";
                    break;
                case 3:
                    $lib = "Mardi";
                    break;
                case 4:
                    $lib = "Mercredi";
                    break;
                case 5:
                    $lib = "Jeudi";
                    break;
                case 6:
                    $lib = "Vendredi";
                    break;
                default:
                    $lib = "";
            }
            if (!JourClass::add(array("date" => self::convertDateForSQL($jour->Date), "libelle" => $lib)))
            {
                print_r("Une erreur est survenue durant l'ajout du jour ".$jour->Date."\n");
            }
        }
    }

    public function modifyJours($jours)
    {
        foreach ($jours as $jour) {
            JourClass::edit(array("date" => $jour->Date));
        }
    }

    public function addCreneau($creneaux)
    {
        foreach ($creneaux as $creneau) {
            if (!isset($creneau->Activite))
                continue;
            $matiereBD = MatiereClass::selectWithLibelle((string)$creneau->Activite);
            if ($matiereBD === false or sizeof($matiereBD) == 0)
            {
                print_r("Ajout d'une matière : ".$creneau->Activite."\n");
                MatiereClass::add(array((string)$creneau->Activite));
                $matiereBD = MatiereClass::selectWithLibelle((string)$creneau->Activite);
                $idMatiere = $matiereBD["matiere_id"];
            }
            else {
                $idMatiere = $matiereBD["matiere_id"];
            }

            $typeBD = TypeMatiereClass::selectWithAcronyme(TypeMatiereClass::getAcronymeFromLibelle($creneau->Activite));
            $idType = ($typeBD === false or sizeof($typeBD) == 0)?null:$typeBD["type_matiere_id"];

            $jourBD = JourClass::selectWithDate(self::convertDateForSQL($creneau->xpath("./..")[0]->Date));
            $idJour = ($jourBD === false or sizeof($jourBD) == 0)?null:$jourBD["jour_id"];

            CreneauClass::add(array($idMatiere, $idJour, $idType, (string)$creneau->Creneau, (string)$creneau->Salles));
        }
    }

    public function modifyCreneau($creneaux)
    {

    }

    public static function convertDateForSQL($date)
    {
        if (preg_match("#\\d{2}/\\d{2}/\\d{4}#", $date))
        {
            $elems = explode("/", $date);
            $date = $elems[2].'-'.$elems[1].'-'.$elems[0];
        }

        $dateTime = new DateTime($date);

        return $dateTime->format("Y-m-d H:i:s");
    }

}