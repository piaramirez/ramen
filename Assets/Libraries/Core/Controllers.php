<?php
class Controllers{
    public function __construct(){
        echo "Estamos desde controlles";
    }
    public function loadModel(){
        $model= get_class($this)."Model";
        $routClass = "Models/".$model.".php";
    }
}