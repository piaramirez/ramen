<?php 
class Login extends Controllers{
    public function __construct(){
        //echo "Estamos dentro de la Class Login </br>";
        parent::__construct();
    }
    public function Login(){
        $data['page_id'] = 1;
        //echo "estamos dentro del método Login";
        $this->view->getView($this, "Login", $data);
    }

}