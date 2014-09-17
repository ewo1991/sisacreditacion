<?php
class MSSQL_spdo extends BaseDatos
{
    protected static $exec = "EXEC";

    public function __construct($config)
     {   $this->set($config);    

        $dns='mssql:dbname='.$this->dbname.';host='.$this->host.';port='.$this->port;
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
