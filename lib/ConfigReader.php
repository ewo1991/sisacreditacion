<?php
class ConfigReader
{
    private $_config;
    public function __construct($archivo)
    {
     if (!file_exists($archivo)) {
            throw new Exception('No se encontro el archivo: '.$archivo);
        }
        $this->_config = parse_ini_file($archivo, true);
    }

    public function getConfig()
    {
        return $this->_config;
    }
}
?>
