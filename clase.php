<?php
global $user,$password,$dbname;
    $user = "root";
    $password = "";
    $dbname ="sisacreditacion";

class informativo{

    private $cnx = NULL;

    public function __construct($host, $user, $password, $dbname) {
        $this->cnx = new mysqli($host, $user, $password, $dbname);
        
        if (mysqli_connect_error()) {
            die('Error 100: ' . mysqli_connect_error());
        }
    }    
    public function call($procedure, $param = NULL){
        $sql = "call ".$procedure." (";
        if(!is_null($param)){
            for($i=0;$i<count($param);$i++){
                if($i == (count($param)-1)){
                    $sql .= " '$param[$i]') ";
                }else{
                    $sql .= " '$param[$i]',";
                }
            }
        }else{
            $sql .= ") ";
        }
        return $this->query($sql);
    }
    
    public function query($sql){      
        $result = mysqli_query($this->cnx,$sql); 
        $data=  $this->format($result);
        mysqli_free_result($result); 
        return $data;
    }
    
    public function format($stmt){
        
        $rs = array();
        $data = array();
        $rs["error"] = $this->cnx->error;
        if ($rs["error"] == '') {
            $rs["status"] = true;
            if(is_object($stmt)){
                //Numero de Columnas
                $rs["cols"] = $stmt->field_count;
                //Numero de Filas
                $rs["rows"] = $stmt->num_rows;
                //Total conteo Filas*columnas
                $rs["total"] = $rs["cols"] * $rs["rows"];
                //Array q guarda el nombre de los campos
                $rs["fieldname"] = array();
                $fields = $stmt->fetch_fields();
                for ($j = 0; $j < $rs["cols"]; $j++)
                    $rs["fieldname"][] = $fields[$j]->name;
                while ($row = $stmt->fetch_assoc()) {
                    $data[]= $row;
                }   
                $rs["data"]=$data;
                if ($rs["cols"] == 1 && $rs["rows"] == 1)
                    $rs["val"] = $rs[0][0];
            }
        } else {
            $rs["status"] = false;
        }
        
        //$this->cnx->close();

        return $rs;

    }
	
}
class carachupa {

    private $cnx = NULL;

    public function __construct($host, $user, $password, $dbname, $port) {
        $this->cnx = new mysqli($host, $user, $password, $dbname, $port);
        
        if (mysqli_connect_error()) {
            die('Error 100: ' . mysqli_connect_error());
        }
    }    
    public function call($procedure, $param = NULL){
        $sql = "call ".$procedure." (";
        if(!is_null($param)){
            for($i=0;$i<count($param);$i++){
                if($i == (count($param)-1)){
                    $sql .= " '$param[$i]') ";
                }else{
                    $sql .= " '$param[$i]',";
                }
            }
        }else{
            $sql .= ") ";
        }
        return $this->query($sql);
    }
    
    public function query($sql){      
        $result = mysqli_query($this->cnx,$sql); 
        $data=  $this->format($result);
        mysqli_free_result($result); 
        return $data;
    }
    
    public function format($stmt){
        
        $rs = array();
        $data = array();
        $rs["error"] = $this->cnx->error;
        if ($rs["error"] == '') {
            $rs["status"] = true;
            if(is_object($stmt)){
                //Numero de Columnas
                $rs["cols"] = $stmt->field_count;
                //Numero de Filas
                $rs["rows"] = $stmt->num_rows;
                //Total conteo Filas*columnas
                $rs["total"] = $rs["cols"] * $rs["rows"];
                //Array q guarda el nombre de los campos
                $rs["fieldname"] = array();
                $fields = $stmt->fetch_fields();
                for ($j = 0; $j < $rs["cols"]; $j++)
                    $rs["fieldname"][] = $fields[$j]->name;
                while ($row = $stmt->fetch_assoc()) {
                    $data[]= $row;
                }   
                $rs["data"]=$data;
                if ($rs["cols"] == 1 && $rs["rows"] == 1)
                    $rs["val"] = $rs[0][0];
            }
        } else {
            $rs["status"] = false;
        }
        
        //$this->cnx->close();

        return $rs;

    }
	
}

function creation($sql)
{
	global $host,$user,$password, $dbname;

	$con = new informativo($host, $user, $password, $dbname);
	$rs = $con->query($sql);
	return $rs;
}

?>