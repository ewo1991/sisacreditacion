<?php
 class configuracion
 {
     function saveConfiguracion($p)
     {
        $contend = "[".$p['driver']."]\n";
        $contend .= "host     = ".$p['namehost']."\n";
        $contend .= "dbname   = ".$p['dbname']."\n";
        $contend .= "username = ".$p['username']."\n";
        $contend .= "password = ".$p['password']."\n";        
        $contend .= "port = ".$p['port']."\n";
        
        $name_file = '../lib/config.ini';
        $resp = array('rep'=>'1','str'=>'Ok');
        fopen($name_file, 'w');
        if (is_writable($name_file)) {
           if (!$gestor = fopen($name_file, 'a')) {
                 $resp = array('rep'=>'0','str'=>'No se puede abrir el archivo ('.$name_file.')');
                 exit;
           }
           if (fwrite($gestor, $contend) === FALSE) {
               $resp = array('rep'=>'0','str'=>'No se puede escribir al archivo ('.$name_file.')');
               exit;
           }
           fclose($gestor);

        }
        else {
                $resp = array('rep'=>'0','str'=>'No se puede escribir sobre el archivo ('.$name_file.')');
             }
        return $resp;
      }
         
       
 }
?>
