<?php
class home extends Controllers{
    public function __construct(){
        parent::__construct();
        
    }
    public function home($param){
        $data['page_id'] = 1;
        $data['tag_page'] =  "いらっしゃいませ | Sora Ramen";
        $data['page_title'] = "いらっしゃいませ";
        $data['page_name'] = "Inicio";
        $this->view->getView($this, "home", $data);

    }
    
}
