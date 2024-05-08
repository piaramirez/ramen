<?php
class Perfil extends Controllers{
    public function __construct(){
        parent::__construct();
       // echo "Estamos en la clase Perfil";
    }   
    /**
     * Nivel de privilegios
     * 1.- Adminsitrador
     * 2.- RH
     * 3.- Empleado normal
     * 4.- Cliente
     * 5.- Proveedor
     */
    public function Perfil(){
        $data['tag_page'] = "Pruebas de perfil";
        $data['id_Privilegio'] = 1;
        $this->view->getView($this, 'Perfil', $data);
        //echo "Esto es perfik";
    }
    public function PanelAdmin(){
        //echo "Hola, w, estamos en panel Admin";
    }
    public function Configuracion(){
        //Aqui va la configuración
        $data['tag_page'] = "Configuración";
        $this->view->getView($this, 'Perfil/Configuracion', $data);

    }
}