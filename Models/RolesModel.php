<?php
class RolesModel extends Mysql{
    public function __construct(){
    //    echo "Estamos en el constructor RolesModel <br>";
        parent::__construct();
    }
    public function selectRoles(){
        $sql = "SELECT * FROM areaTrabajo";
        $request = $this->SelectAll($sql);
        //formant($request);
        return $request;  
    }
    public function selectRol(int $intIdRol){
        $this->intIdRol = $intIdRol;
        $sql = "SELECT * FROM areaTrabajo WHERE idaTrabajo = $this->intIdRol";
        $request = $this->SelectAll($sql);
        return $request;  
    }
    public function insertRol(string $rol, string $descripcion, string $aldea, string $mentor){
        $return = "";
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->strAldea = $aldea;
        $this->strMentor = $mentor;
        
        $sql = "SELECT * FROM areaTrabajo WHERE nombreaTrabajo = '{$this->strRol}'";
        $request = $this->SelectAll($sql);
        //Revisa que venga vació el campo para insertar
  
        if (empty($request)) {
            $query_insert = "INSERT INTO areaTrabajo(nombreaTrabajo, despcionTrabajo, aldeaTrabajo, mentorTrabajo) VALUES(?,?,?,?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->strAldea, $this->strMentor);
            $request_insert = $this->insert($query_insert, $arrData);
             return $return.= $request_insert;
            
            // echo "No hay registros <br>";
        }else{
            $return.= "exist";

        }
    }
    public function updateRol(int $intIdRol,string $strRol,string  $strDescripcion, string $strAldea, string $strMentor){
        $this->intIdRol = $intIdRol;
        $this->strRol = $strRol;
        $this->strDescripcion = $strDescripcion;
        $this->strAldea = $strAldea;
        $this->strMentor = $strMentor;
        $sql = " SELECT * FROM areaTrabajo WHERE idaTrabajo = {$this->intIdRol}";
        $request = $this->SelectAll($sql);
       //var_dump("DAtos que vienen de resque antes if", $request);
        //cho "dartos";
        if (!empty($request)) {
            //echo "dentro de emptu";
            $sql = "UPDATE areaTrabajo set nombreaTrabajo = ?, despcionTrabajo = ?, aldeaTrabajo = ?, mentorTrabajo = ? where idaTrabajo = {$this->intIdRol}";
            $arrData = array($this->strRol, $this->strDescripcion, $this->strAldea, $this->strMentor);
            //var_dump("DAtos que vienen ed arr", $arrData);
            //var_dump("DAtos que vienen ed arr", $arrData);
            $request = $this->actualizarDatos($sql, $arrData);
            //var_dump("DAtos que vienen de resque ya cargado", $request); 

        }else{
            $request = "exist";
        }
        //var_dump($request);
        return $request;
    }
    public function deleteRol(int $intIdRol) {
        $this->intIdRol = $intIdRol;
        $sql = "DELETE FROM areaTrabajo WHERE idaTrabajo = $this->intIdRol";    
        $request = $this->eliminarDatos($sql);
    
        if ($request) {
            // La eliminación fue exitosa
            $response = array(
                'status' => true,
                'message' => 'El rol fue eliminado exitosamente.'
            );
        } else {
            // Hubo un error en la eliminación
            $response = array(
                'status' => false,
                'message' => 'Hubo un error al intentar eliminar el rol.'
            );
        }
    
        // Devuelve la respuesta como un JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
}