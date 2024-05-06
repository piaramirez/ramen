<?php
class homeModel{
     public function __construct(){
       // echo "Estamos desde homeModel  </br>";
    }
    public function getCarrito($params){
        return "datos del carrito: ".$params;
    }
}