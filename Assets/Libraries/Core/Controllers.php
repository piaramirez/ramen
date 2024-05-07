<?php
class Controllers{
    public function __construct(){
        $this->view = new Views();
        $this->loadModel();
    }
    public function loadModel(){
        $model= get_class($this)."Model";
        $routClass = "Models/".$model.".php";
        //echo "esta es la ruta:".$routClass." </br>";
        if (file_exists($routClass)) {
            require_once($routClass);
            $this->model = new $model();
        }else{
            echo " No existe el archivo";
        }
    }
}