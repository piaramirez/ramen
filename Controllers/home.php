<?php
class home extends Controllers{
    public function __construct(){
        parent::__construct();
        
    }
    public function home(){
        $data['page_id'] = 1;
        $data['tag_page'] =  "いらっしゃいませ | Sora Ramen";
        $data['page_title'] = "いらっしゃいませ";
        $data['page_name'] = "Inicio";
        $datosProducto = $this->model->getProducto();
       // echo formant($test);
        $data['page_productos'] = $datosProducto;
        $this->view->getView($this, "home", $data);

        

    }
    /**
     * Función de prueba para insertar
     */
    public function pruebasInser(){
       // echo "dentro de la funcion pruebasInser";
        $data = $this->model->setUser('Ora', 'k');
        //echo "después de datos";
        print_r($data);
        
    }
    /**
     * pruebas de traer todo
     */
    public function datos(){
        $data = $this->model->getUser($id);
        print_r($data);
    }
    public function actualizas($id){
        $data = $this->model->updateUser(4,"Padrinazo","worales");
        print_r($data);
    }
    public function traerTodo(){
        $data = $this->model->getUsers();
        print_r($data);
    }
    public function eliminar($id){
        $data = $this->model->deleteUser($id);
        print_r($data);
    }
}
