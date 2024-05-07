<?php
class notFound extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function notFound(){
        $this->view->getView($this, "Error");
    }
}
$notFound = new notFound();
$notFound->notFound();