<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Style/style.css">
    <title><?php echo($data['tag_page']); ?></title>
</head>
<body>
    <?php require_once("Views/Estructura/menu.php"); ?>
    <div class="cabeceraHome">
        <div class="imgCabecera">
            <img src="Assets/Img/fondo.jpg" alt="">
           <div class="inicioPreubas">
           <h1><?php echo $data['page_title'] ?></h1>
           <p>pepepepepepepep</p>
           </div>
            <div class="degradado"></div>
           
        </div>
    </div>
    <div id="<?php echo($data['page_id']); ?>"></div>
    

</body>
</html>