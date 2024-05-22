<?php
class Mysql extends Conexion{
    private $conexion;
    private $strquery;
    private $arrValues;
    /**
     * Creaamos el constructor de la clase
     */
    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }
    /**
     * Creamos función para insertar un dato
     */
    public function insert(string $strquery, array $arrValues){

        $this->strquery = $strquery;
        $this->arrValues = $arrValues;
        $insert = $this->conexion->prepare($this->strquery);
      
        $restInsert = $insert->execute($this->arrValues);
        //var_dump($restInsert, "Datos dentro de insert Rest <br>");
        if($restInsert){
            $lastInsert = $this->conexion->lastInsertId();
            //echo "Este es el último id insertado: ".$lastInsert;
        }else{
            $lastInsert= 0;
            //echo "No se pudo insertar";
        }  
        return $lastInsert;
    }
    /**
     * Creamos función para buscar un dato
     */
    public function buscarDatos(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    /**
     * Cramo una funcion que nos de todos los datos
     */
    public function SelectAll(string $strquery){
        $this->strquery = $strquery;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;       
    }
    /**
     * Creamos una función para actualizar un dato
     */
    public function actualizarDatos(string $strquery, array $arrValues){
        $this->strquery = $strquery;
        $this->arrValues = $arrValues;
        //echo "Consulta preparada: " . $this->strquery . "<br>";
        //echo "Valores: " . implode(", ", $this->arrValues) . "<br>";
        $update = $this->conexion->prepare($this->strquery);
      // var_dump($update, $arrValues);
      //var_dump($this->arrValues,  "Datos dentro de actualizar <br>");
        $resExecute = $update->execute($this->arrValues);
        //var_dump($resExecute,  "Datos dentro de actualizar2 <br>");
        return $resExecute;
    }
    /**
     * Creamos una función para eliminar un dato
     */
    public function eliminarDatos(string $query){
        $this->strquery = $query;
        $delete = $this->conexion->prepare($this->strquery);
        $del = $delete->execute();
        return $del;
    }
}