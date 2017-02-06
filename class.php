<?php

	function __autoload($className)
	{
        $dos_class = PATH."class";
        $dirFile = file_exists_in_dir($className.".php", $dos_class);
        if ($dirFile !== false)
		{
            require_once($dirFile.DIRECTORY_SEPARATOR.$className.".php");
			return;
        }
        else
		{
            throw new Exception("Impossible de charger $className.");
		}
	}

	function file_exists_in_dir($file, $dir)
	{
        foreach (array_diff(scandir($dir), array('..', '.')) as $item) {
			if (is_dir($dir.DIRECTORY_SEPARATOR.$item))
			{
				$result = file_exists_in_dir($file, $dir.DIRECTORY_SEPARATOR.$item);
				if ($result !== false)
				{
					return $result;
				}
			}
			elseif (trim($item) == trim($file))
			{
				return $dir;
			}
		}
		return false;
	}
?>
