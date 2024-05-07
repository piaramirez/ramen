<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Style/style.css">
    <title><?php echo($data['tag_page']); ?></title>
</head>
<body>
    <nav class="menu-principal">
        <div class="estructura-menu">
            <div class="logoMenu">
              <a href="home"> <p>空ラーメン</p></a>
            </div>
            <div class="itemMenu">
                <ul class="itemListnav">
                    <div class="item">
                        <div><a href="Menu">Menú</a></div>
                    </div>
                    <div class="item">
                        <div><a href="">Sobre nosotros</a></div>
                    </div>
                    <div class="item">
                        <div><a href="">Contacto</a></div>
                    </div>
                    <div class="item">
                        <div><a href="Login">Login</a></div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div id="<?php echo($data['page_id']); ?>"></div>
    <h1><?php echo $data['page_title'] ?></h1>
    <a href="Login">Login</a>
</body>
</html>