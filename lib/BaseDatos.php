<?php
abstract class BaseDatos extends PDO
{
    protected static $instance = NULL;
    protected $host;
    protected $port;
    protected $dbname;
    protected $user;
    protected $password;
    protected static $exec;

    public function set(ConfigReader $config)
    {
        $config_data = $config->getConfig();
        $keybd = key($config_data);
        $this->host = $config_data[$keybd]['host'];
        $this->port = $config_data[$keybd]['port'];
        $this->dbname = $config_data[$keybd]['dbname'];
        $this->user = $config_data[$keybd]['username'];
        $this->password = trim($config_data[$keybd]['password']);
    }
}


?>
