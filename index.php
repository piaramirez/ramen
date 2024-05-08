<?php
require_once("Config/Config.php");
    $url = !empty( $_GET['url']) ? $_GET['url']: 'home/home';
    $arrUrl = explode("/", $url);
    $controller  = $arrUrl[0];
    $metodo = $arrUrl[0];
    $param = "";
    /*echo "Controlador: ".$controller."</br>";
    echo "Método: ".$metodo."</br>";*/
    
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
        echo "Parámetros: ".$param."</br>";
    }
    /*Mandamos a llamar el autoload que tenemos en core para
    poder acceder a las clases que estamos usando */
    require_once("Assets/Libraries/Core/Autoload.php");
    /*
    Mandamos a llamar el archivo Load con el cual mandamos a llamar los métodos
    de los controladores
    */
    require_once("Assets/Libraries/Core/Load.php");
?>
