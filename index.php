<?php
require_once("Config/Config.php");
    $url = !empty( $_GET['url']) ? $_GET['url']: 'home/home';
    $arrUrl = explode("/", $url);
    $controller  = $arrUrl[0];
    $metodo = $arrUrl[0];
    $param = "";
    if(!empty( $arrUrl[1])){
        if( $arrUrl[1] != ""){
            $metodo = $arrUrl[1];
        }
    }
    if(!empty($arrUrl[2])){
        if($arrUrl[2] != ""){
            for($i=2; $i<count($arrUrl); $i++){
                $param.= $arrUrl[$i].',';
            }
            $param = trim($param, ',');
        }
    }
    //$test = LIBS."Core/".$class.".php";
    //var_dump($test);
    spl_autoload_register(function($class){
        
        if (file_exists(LIBS."Core/".$class.".php")) {
            require_once(LIBS."Core/".$class.".php");
            
        }
    });
    //Load
    $controllerFile =  "Controllers/".$controller.".php";
    if(file_exists($controllerFile)){
        require_once($controllerFile);
        $controller = new $controller(); 
        if(method_exists($controller, $metodo)){
            $controller->{$metodo}($param);
        }else{
            echo "No existe, pa";
        }
            
    }else{
        echo "No existe el controlador";
    }
?>
