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
<div class="akatsuki">
    <div class="encabezadoRoles">
        <h1><?php echo $data['page_title'] ?></h1>
        <p>Te estamos buscando para que formes párte de este gran equipo,
            si tienes lo que se necesita, no dudes en postularte.
        </p>
        <div class="barradeopciones">
            <ul class="opcionesRol">
               <div class=""><a href="#" id="nuevoIntegranteBtn">Nuevo integrante</a></div>
               <div class=""><a href="#" id="verRolesBtn">Ver todos los Roles</a></div>
            </ul>
        </div>
    </div>

    <div class="formularioRoles" id="formularioRoles" >
        <form class="Formulario" id="formRol"  >
            <input type="hidden" id="idRol" name="idRol" readonly> 
            <div class="grupClassRoles">
                <label for="nombreRol">Nombre del integrante</label>
                <input type="text" name="textNrol" id="textNrol" required placeholder="Ingresa tu renegado nombre">
            </div>
            <div class="grupClassRoles">
                <label for="Descpricion">Historia</label>
               <textarea name="descripcionRol" id="descripcionRol" rows="10" cols="50" required placeholder="Ingresa tu historia"></textarea>
            </div>
            <div class="grupClassRoles">
                <label for="Status">Elige una aldea</label>
                <select name="idEstatus" id="idEstatus" required>
                    <option value="">Elige una opcion</option>
                    <option value="Amegakure">Amegakure</option>
                    <option value="Konohagakure">Konohagakure</option>
                    <option value="Sunagakure">Sunagakure</option>
                    <option value="Kirigakure">Kirigakure</option>
                    <option value="Iwagakure">Iwagakure</option>
                    <option value="Kumogakure">Kumogakure</option>
                    <option value="Otogakure">Otogakure</option>

                </select>
                
            </div>
            <div class="grupClassRoles">
                <label for="Status">Elige un mentor</label>
                <select name="mentores" id="mentores" required>
                    <option value="">Elige una opcion</option>
                    <option value="Deidara">Deidara</option>
                    <option value="Itachi Uchiha">Itachi Uchiha</option>
                    <option value="Kisame Hoshigaki">Kisame Hoshigaki</option>
                    <option value="Sasori">Sasori</option>
                    <option value="Hidan">Hidan</option>
                    <option value="Kakuzu">Kakuzu</option>
                    <option value="Konan">Konan</option>
                    <option value="Nagato">Nagato</option>
                    <option value="Zetsu">Zetsu</option>
                    <option value="Obito Uchiha">Obito Uchiha</option>
                    <option value="Pain">Pain</option>
                    <option value="Orochimaru">Orochimaru</option>
                </select>
                
            </div>
            <div class="grupClassBoton">
                
                <input type="submit" value="Guardar">
                <button type="reset">Borrar</button>
            </div>
        </form>
        <div class="SeleccionAldea">
        <div class="imagePreview" id="Idmentor">
            <h1>Mentores</h1>
            <img id="villageImage" src="<?php echo base_url() ?>Assets/Img/logo.png" alt="Selected Village Image">
        </div>
        <div id="resultado"></div>

    </div>
    </div> 
<div class="tableContainer" id="tableContainer" style="display: none;">
<table id="tableRoles">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Aldea</th>
                <th>Mentor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
   
   
    </div>

    <div id="myModal" class="modal">
  <div class="modal-content" id="modal-content">
    <div class="tituloModal" id="tituloModal"></div>
    <img id="mentorImg" src="" alt="Mentor">
    <div class="textomodal">
    <img src="<?php echo base_url() ?>Assets/Img/logo.png" alt=""><h2 id="mentorName"></h2>
    </div>
    <p id="modalMessage"></p>
    <div class="barraBotonModal">
    
    <button id="closeBtn" onclick="closeModal()">Cerrar</button>
    
    </div>

  </div>
</div>

</div>

<div id="myMomodalEdutarE" class="modal">
<div class="modal-contents" id="modal-contents">
<div class="tituloModals" id="tituloModals"></div>
<img class="mentorImgE" id="mentorImgE" src="" alt="Mentor">
<div class="textomodal" id="textomodal">
<img src="<?php echo base_url() ?>Assets/Img/logo.png" alt=""><h2 id="mentorName"></h2>

</div>
<div class="">

    <form class="formularioEE" id="formularioEE">
        <input type="hidden" id="idRolE" name="idRolE" readonly >
        <div class="grupoFormEE">
            <label for="nombrerenegado">Nombre Renegado</label>        
            <input name="textNrolE" type="text" required id="textNrolE">
        </div>
        <div class="grupoFormEE">
            <label for="nombrerenegado">Nombre Mentor</label>        
            <select name="mentoresE" id="mentoresE" required>
                    <option value="">Elige una opcion</option>
                    <option value="Deidara">Deidara</option>
                    <option value="Itachi Uchiha">Itachi Uchiha</option>
                    <option value="Kisame Hoshigaki">Kisame Hoshigaki</option>
                    <option value="Sasori">Sasori</option>
                    <option value="Hidan">Hidan</option>
                    <option value="Kakuzu">Kakuzu</option>
                    <option value="Konan">Konan</option>
                    <option value="Nagato">Nagato</option>
                    <option value="Zetsu">Zetsu</option>
                    <option value="Obito Uchiha">Obito Uchiha</option>
                    <option value="Pain">Pain</option>
                    <option value="Orochimaru">Orochimaru</option>
                </select>
        </div>
        <div class="grupoFormEE">
            <label for="Status">Elige una aldea</label>
                <select name="idEstatusE" id="idEstatusE" required>
                    <option value="">Elige una opcion</option>
                    <option value="Amegakure">Amegakure</option>
                    <option value="Konohagakure">Konohagakure</option>
                    <option value="Sunagakure">Sunagakure</option>
                    <option value="Kirigakure">Kirigakure</option>
                    <option value="Iwagakure">Iwagakure</option>
                    <option value="Kumogakure">Kumogakure</option>
                    <option value="Otogakure">Otogakure</option>

                </select>
                
        </div>
        <div class="grupoFormEE">
            <label for="despcionTrabajo">Historia</label>
            <textarea name="descripcionRolE" id="descripcionRolE" rows="10" cols="50" required value="despcionTrabajo"></textarea>
        </div>
        <div class="barraBotonModal">
<input type="submit" value="Actualizar" class="btnAction" id="btnAction">
<button id="closeBtn" onclick="closeModals()">Cerrar</button>

</div>
    </form>
</div>


</div>
</div>




<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Incluye JS de DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <!-- Incluye tu archivo JavaScript -->
    <script>
        var base_url = "<?php echo BASE_URL; ?>";
    </script>
    <script src="<?php echo BASE_URL ?>Assets/JS/roles.js" defer></script>
</body>
</html>