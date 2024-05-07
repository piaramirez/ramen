<?php
class Menu extends Controllers{
    public function __construct(){
        //echo "Estamos en el contructor de menú";
        parent::__construct();
    }
   
    public function Menu(){
        $data['tag_page']  = "Menú | Sora ramen";
        $this->view->getView($this, 'Menu', $data);
    }
  
    public function Platillos(){
        echo "Aqui muestra la info de los plarillos";
    }
    
    public function Bebidas(){
        echo "Aquí muestra la info de las bebidas";
    }
    public function Postres(){
        echo "Aquí muestra la info de los postres";
    }   


    
}