<?php
class homeModel extends Mysql{
     public function __construct(){
       // echo "Estamos desde homeModel  </br>";
       parent::__construct();
    } 
    /**
     * Cremaos la función de pruebas de insert
     */
    public function setUser(string $nombre, string $email){
      //var_dump($nombre, $email, "Datos desde el modelo <br>");
      $sqlInsert = "INSERT INTO Usuarios(nombreUser, correoUser) VALUES(?,?)";
      $arrayData= array($nombre, $email);
      //var_dump($sqlInsert, $arrayData,"Datos dentro del array <br>");
      $restInsert = $this->insert($sqlInsert, $arrayData);
     //var_dump($restInsert, "Datos de restInsert <br>");
      return $restInsert;
    }
    /**
     * Creamos la función para traer todos los datos
     */
    public function getUsers($id){

      $sql = "SELECT * FROM Usuarios";
      $request = $this->buscarDatos($sql);
      return $request;
    }
    public function updateUser(int $id, string $nombre, string $correo){
    //  echo "Estamos dentro de updateUser";
      $sql = "UPDATE Usuarios SET nombreUser = ?, correoUser = ? WHERE idusuarios = $id";
      $arrayData = array($nombre, $correo);
      //var_dump($sql, $arrayData, "Datos dentro de updateUser <br>");
      $request = $this->actualizarDatos($sql, $arrayData);
      return $request;
    }
}