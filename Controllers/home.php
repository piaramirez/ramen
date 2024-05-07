<?php
class home extends Controllers{
    public function __construct(){
        parent::__construct();
        
    }
    public function home($param){
        $this->view->getView($this, "home");

    }
    public function test($param){
        echo "Datos de los parametros: ".$param;
    }
    public function carrito($param){
        $carrito = $this->model->getCarrito($param);
        echo $carrito;
    }
}
