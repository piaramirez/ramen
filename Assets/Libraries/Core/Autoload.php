<?php
    spl_autoload_register(function($class){
        
        if (file_exists("Assets/Libraries/"."Core/".$class.".php")) {
            require_once("Assets/Libraries/"."Core/".$class.".php");
            
        }
    });