<?php


class UtilitaireClass
{
    public static function generateLogFile($dir = PATH.LOG_PATH)
    {
        if (!file_exists($dir))
            self::generateArbo($dir);
        return $dir.date("Ymd-His").'.log';
    }

    public static function generateArbo($dir)
    {
        if (strpos($dir, PATH) === 0)
        {
            $previousDir = "";
            foreach (explode(DIRECTORY_SEPARATOR, substr($dir, strlen(PATH))) as $dirToCreate) {
                if (!file_exists(PATH.$previousDir.$dirToCreate))
                {
                    if (!mkdir(PATH.$previousDir.$dirToCreate))
                        return false;
                }
                $previousDir .= $dirToCreate.DIRECTORY_SEPARATOR;
            }
            return true;
        }
        return false;
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