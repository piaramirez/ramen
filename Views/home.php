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
           <p>Bienvenidos</p>
           </div>
            <div class="degradado"></div>
           
        </div>
    </div>
    <main class="ProductosyServiciosHome">
        <div class="">
            <h1>Conoce nuestros productos más vendidos</h1>
        </div>
    <?php foreach ($data['page_productos'] as $productosI) { ?>
           <div class="">
           <img src="<?php echo $productosI['fotoProducto'] ?>" alt="">
            <h2><?php echo $productosI['nombreProducto'] ?></h2>
            <p><?php echo $productosI['descripcionProducto'] ?></p>
            <p><?php echo $productosI['precioProducto'] ?></p>
           
           </div>
    <?php
    }

    ?>
    <div class="servicios">
        Aquí va los servicios que ofrecemos
    </div>

    </main>
    <div class="contactanos">
        <h2>Contactanos</h2>
        <p>Si tienes alguna duda o sugerencia, no dudes en contactarnos</p>
        <form action="">
            <input type="text" placeholder="Nombre">
            <input type="email" placeholder="Correo">
            <textarea name="" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
            <input type="submit" value="Enviar">
        </form>
    </div>
    

</body>
</html>