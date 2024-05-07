<?php
class Error extends Controllers{
    public function __construct(){
        echo "Estoy desde Error";
        parent::__construct();
    }
    public function notFound(){
        $this->view->getView($this, "Error");
    }
}