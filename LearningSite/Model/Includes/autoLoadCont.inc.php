<?php
spl_autoload_register('pathSetter');

function pathSetter($classname)
{
    $path = "../Model/Classes/";
    $ext = ".class.php";
    $fullPath = $path . $classname . $ext;
    
    if (!file_exists($fullPath))
    {
        echo "The file @ ".$fullPath. " Does not Exist.";
        return false;
    }
    else
    {
        include_once $fullPath;
    }
}
?>