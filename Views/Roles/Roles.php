<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/Style/style.css">
    <title><?php echo $data['tag_page'] ?></title>
</head>
<body>
<nav class="menu-principal-perfiles" id="Menu">
    <input type="checkbox" class="checkBurger" id="checkBurger">
        <label for="checkBurger" class="nav__toggle">
        <svg class="menuBurger" viewBox="0 0 448 512" width="100" title="bars" id="menuBurger">
        <path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
        </svg>
        <svg class="closeMenuBurger" viewBox="0 0 384 512" width="100" title="times">
            <path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />  
        </svg>
    </label>
    <div class="estructura-menu">
    <div class="logoMenu">
        <img src="<?php echo BASE_URL ?>Assets/Img/logo.png" alt="">
    </div>
    <div class="itemMenu">
        <ul class="itemListnav" id="itemListnav">
            <div class="item">
                <a href="Catalogos"><div>Catálogos</div></a>
            </div>
            <div class="item">
                <div><a href="">Usuarios</a></div>
            </div>
            <div class="item">
                <div><a href="Roles">Roles</a></div>
            </div>
            <div class="item">
                <div><a href="Login">Cerrar Sesion</a></div>
            </div>
        </ul>
    </div>
</nav>
    <div class="encabezadoRoles">
        <h1><?php echo $data['page_title'] ?></h1>
        <div class="barradeopciones">
            <ul class="opcionesRol">
               <div class=""><a href="">Agregar nuevo rol</a></div>
               <div class=""><a href="">Ver todos los Roles</a></div>
            </ul>
        </div>
    </div>
    <div class="formularioRoles">
        <form method="get" id="formRol">
            <div class="grupClassRoles">
                <label for="nombreRol">NombreRol</label>
                <input type="text" name="textNrol" id="textNrol">
            </div>
            <div class="grupClassRoles">
                <label for="Descpricion">Descripcion</label>
               <textarea name="descripcionRol" id="descripcionRol"></textarea>
            </div>
            <div class="grupClassRoles">
                <label for="Status">Status</label>
                <select name="idEstatus" id="idEstatus">
                    <option value="">Elige una opcion</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                <div class="grupClassRoles">
                
                <input type="submit" value="Guardar">
            </div>
            </div>
        </form>
    </div>
    <table id="tableRoles">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Incluye JS de DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <!-- Incluye tu archivo JavaScript -->
    <script>
        var base_url = "<?php echo BASE_URL; ?>";
    </script>
    <script src="<?php echo BASE_URL ?>Assets/JS/roles.js"></script>
</body>
</html>