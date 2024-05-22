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
        <div class="imgTituloInicio">
           <img src="<?php echo media(); ?>Img/Iconos/cubiertos.png" alt="Ícono de cubiertos"> 
           <h1>Conoce nuestros productos más vendidos</h1>
        </div>
    <div class="barraProductos">
        <?php foreach ($data['page_productos'] as $productosI) { ?>
            <div class="cardProductos">
                <img src="<?php echo $productosI['fotoProducto'] ?>" alt="">
                <div class="contenidocardProductos">
                    <h2><?php echo $productosI['nombreProducto'] ?></h2>
                    <p><?php echo $productosI['descripcionProducto'] ?></p>   
                </div>  
                <div class="footerCardProductos">
                   <div class="pedidoPrecio">
                   +
                   <p>$<?php echo formatMoney($productosI['precioProducto']) ?>.mx</p>
                   </div>
                    <a href="Producto/Ramen/<?php  echo $productosI['idProducto'] ?>">Ver más</a>
                </div>       
            </div>
        <?php } ?>
    </div>
    <div class="servicios">
        <div class="datosServicios">
            <img src="<?php echo media() ?>/Img/Iconos/onigiri.png" alt="">
            <h2>¡Conoce nuestro menú!</h2>
            <p>Conoce nuesta variedad de platillos preparado por  cheffs japoneses</p>
            <div class="barraBoton">
                <a class="botonNaranja" href="Menu">Menu</a>
            </div>
        </div>
        <div class="datosServicios">
            <img src="<?php echo media() ?>/Img/Iconos/sushi.png" alt="">
            <h2>Contamos con buffet</h2>
            <p>Conoce nuesta variedad de platillos preparado por  cheffs japoneses</p>
            <div class="barraBoton">
                <a class="botonNaranja" href="Servicios">Servicios</a>
            </div>
        </div>
        <div class="datosServicios">
            <img src="<?php echo media() ?>/Img/Iconos/sushillevar.png" alt="">
            <h2>Servicio de evento</h2>
            <p>Conoce nuesta variedad de platillos preparado por  cheffs japoneses</p>
            <div class="barraBoton">
                <a class="botonNaranja" href="Servicios">Información</a>
            </div>
        </div>
        <div class="datosServicios">
            <img src="<?php echo media() ?>/Img/Iconos/entregadomicilio.png" alt="">
            <h2>Pide a domicilio</h2>
            <p>Conoce nuesta variedad de platillos preparado por  cheffs japoneses</p>
            <div class="barraBoton">
                <a class="botonNaranja" href="Login">Pide ya!</a>
            </div>
        </div>
        <div class="datosServicios">
            <img src="<?php echo media() ?>/Img/Iconos/reservacion.png" alt="">
            <h2>Reserva tu lugar</h2>
            <p>Conoce nuesta variedad de platillos preparado por  cheffs japoneses</p>
            <div class="barraBoton">
                <a class="botonNaranja" href="Login">Pide ya!</a>
            </div>
        </div>
        <div class="datosServicios">
            <img src="<?php echo media() ?>/Img/Iconos/reservacion.png" alt="">
            <h2>Informativa</h2>
            <p>Esta página sólo es Informativa</p>
        </div>
    </div>

    </main>
    <div class="contactanos">
        <h2>Contactanos</h2>
        <p>no te esperes más</p>
        <form class="formularioIndex" action="">
            <input type="text" placeholder="Nombre">
            <input type="email" placeholder="Correo">
            <textarea name="" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
            <input type="submit" value="Enviar">
        </form>
    </div>
    <div id="myModal" class="modal">
  <div class="modal-content">
    <h1>Ups</h1>
    <p>Esta página fue creada con el fin de exponer en emprendimiento 1. </br>
    La página fue descativada por el Administrador
<span>PEDRO ANTONIO RAMÍREZ ALCÁNTARA.</span></br>
para más información. 
<a href="mailto:pia@portafoliopiaramirez.tech">pia@portafoliopiaramirez.tech</a></p>
    <a href="Roles" id="indexBtn">Proyecto WEB</a>
  </div>
</div>

<script src="Assets/JS/js.js"></script>
</body>
</html>