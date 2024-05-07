<?php
    class Views{
        function getView($controller, $view, $data=""){
            $controller = get_class($controller);
            echo "</br>".$view.' '.$controller." Estamos dentro de Class Views"; 
            if($controller == "home"){
                $view = "Views/".$view.".php";
            }else if($controller == "Login"){
                $view = "Views/".$view.".php";
                var_dump($data);
               
            }else{
                $view = "Views/".$controller."/".$view.".php";
            }
            //var_dump($view);
            require_once($view); 
        }
    }