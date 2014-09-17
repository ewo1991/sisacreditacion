<?php
interface DbFactory_Interface
{
    public static function create($sIniFile);
    public static function getExecute($sIniFile);
}
?>