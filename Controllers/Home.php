<?php
class Home extends Controllers{
    public function __construct(){

    }
    public function home($param){
        echo "Hola, bro. Estamos en el método Home";
    }
    public function test($param){
        echo "Datos de los parametros: ".$param;
    }
}
