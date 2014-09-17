<?php


class BaseDatosFactory
{
    public static function create_bd($type,$config)
    {
        $clsbase = 'BaseDatos';
        if(class_exists($type) && is_subclass_of($type, $clsbase))
           return call_user_func( array( $type, "singleton" ),$config );
        else 
            throw new Exception("NO SE RECONOCE EL TIPO DE BASE DE DATOS : ".$type);        
    }

    public static function getExecute($type)
    {
        $clsbase = 'BaseDatos';
        if(class_exists($type) && is_subclass_of($type, $clsbase))
           return call_user_func( array( $type, "getExec" ));
        else
            throw new Exception("NO SE RECONOCE EL TIPO DE BASE DE DATOS : ".$type);        
    }
}


?>