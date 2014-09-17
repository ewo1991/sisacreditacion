<?php
class PGSQL_spdo extends BaseDatos
{
    protected static $exec = "SELECT";
    
    public function __construct($config)
    {
        $this->set($config);
        $dns='pgsql:dbname='.$this->dbname.';host='.$this->host.';port='.$this->port;
        $user = $this->user;
        $pass = $this->password;
        parent::__construct($dns,$user,$pass);
    }
    public static function getExec()
    {
        return self::$exec;
    }
    public static function singleton($config)
    {
             if( self::$instance == null )
                {
                    self::$instance = new self($config);
                }
             return self::$instance;
    }
}
?>
