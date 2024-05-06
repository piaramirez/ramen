<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sora Ramen | Bienvenidos</title>
</head>
<body>
    <h1>Hola</h1>
</body>
</html>