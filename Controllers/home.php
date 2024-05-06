<?php
class home extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function home($param){
        //echo "Hola, bro. Estamos en el método Home </br>";
    }
    public function test($param){
        echo "Datos de los parametros: ".$param;
    }
    public function carrito($param){
        $carrito = $this->model->getCarrito($param);
        echo $carrito;
    }
}
