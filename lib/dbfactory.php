<?php
error_reporting ( E_ALL );
ini_set ( "display_errors" , 0);
include_once 'ConfigReader.php';
include_once '../model/Main.php';
include_once 'DbFactory_Interface.php';
include_once 'BaseDatos.php';
include_once 'BaseDatosfactory.php';

class DatabaseFactory implements DbFactory_Interface
{
    public static function create($sIniFile)
    {
        $config = new ConfigReader($sIniFile);
        $config_data = $config->getConfig();
        $database_class = key($config_data).'_spdo';
        include_once $database_class.'.php';
        $db = BaseDatosFactory::create_bd($database_class,$config);
        return $db;
    }

    public static function  getExecute($sIniFile) 
    {
        $config = new ConfigReader($sIniFile);
        $config_data = $config->getConfig();
        $database_class = key($config_data).'_spdo';
        include_once $database_class.'.php';
        $exec = BaseDatosFactory::getExecute($database_class);
        return $exec;
    }
}

?>