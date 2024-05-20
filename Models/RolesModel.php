<?php
class RolesModel extends Mysql{
    public function __construct(){
    //    echo "Estamos en el constructor RolesModel <br>";
        parent::__construct();
    }
    public function selectRoles(){
        $sql = "SELECT * FROM areaTrabajo WHERE statusaTrabajo != 0";
        $request = $this->SelectAll($sql);
        //formant($request);
        return $request;  
    }
    public function insertRol(string $rol, string $descripcion, int $staus){
        $return = "";
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $staus;
        $sql = "SELECT * FROM areaTrabajo WHERE nombreaTrabajo = '{$this->strRol}'";
        $request = $this->SelectAll($sql);
        //Revisa que venga vació el campo para insertar
        //var_dump("isertRol. req:", $request);
        if (empty($request)) {
            $query_insert = "INSERT INTO areaTrabajo(nombreaTrabajo, despcionTrabajo, statusaTrabajo) VALUES(?,?,?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request_insert = $this->insert($query_insert, $arrData);
            var_dump("request_insert. req:", $request_insert);
             return $return.= $request_insert;
            //var_dump("hola retorna el último id", $request_insert);
            // echo "No hay registros <br>";
        }else{
            $return.= "exist";
            echo "Si hay registros <br>";
        }
    }
}