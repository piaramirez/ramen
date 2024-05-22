var modal = document.getElementById("myModal");
const villageImages = {
    "Deidara": base_url + "Assets/Img/Mentore/Deidara.jpg",
    "Itachi Uchiha": base_url + "Assets/Img/Mentore/Itachi_uchiha.jpg",
    "Kisame Hoshigaki": base_url + "Assets/Img/Mentore/Kisame_hoshigaki.jpg",
    "Sasori": base_url + "Assets/Img/Mentore/Sasori.jpeg",
    "Hidan": base_url + "Assets/Img/Mentore/Hidan.jpeg",
    "Kakuzu": base_url + "Assets/Img/Mentore/Kakuzu.jpeg",
    "Konan": base_url + "Assets/Img/Mentore/Konan.jpeg",
    "Nagato": base_url + "Assets/Img/Mentore/Nagato.jpeg",
    "Zetsu": base_url + "Assets/Img/Mentore/Zetsu.jpeg",
    "Obito Uchiha": base_url + "Assets/Img/Mentore/Obito_uchiha.jpeg",
    "Pain": base_url + "Assets/Img/Mentore/Pain.jpeg",
    "Orochimaru": base_url + "Assets/Img/Mentore/Orochimaru.jpeg"
};
function getImageUrl(name) {
    if (villageImages[name]) {
        return villageImages[name];
    }
    return null;
}
function openModal(nombreMentor , nombreTrabajo) {

    if (nombreMentor in villageImages) {

        var rutaImagen = villageImages[nombreMentor];

        document.getElementById("mentorImg").src = rutaImagen;

        document.getElementById("mentorName").innerText = nombreMentor;

        document.getElementById("modalMessage").innerText = "Bienvenido, " + nombreTrabajo;

        modal.style.display = "block";
    } else {
        // Manejar el caso cuando el nombre del mentor no existe en villageImages
        console.error("No se encontró una imagen para el mentor:", nombreMentor);
        // Mostrar un mensaje de error o utilizar una imagen predeterminada
    }
}


function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function closeModals() {
    var modal = document.getElementById("myMomodalEdutarE");
    modal.style.display = "none";
}

document.addEventListener('DOMContentLoaded', function() {
    
    var tableRoles = $('#tableRoles').DataTable({
        "processing": true,
        "serverSide": true,
        "language": {
            "url": base_url + "Assets/JS/Json/Spanish.json"
        },
        "ajax": {
            "url": base_url + "Roles/getRoles",
            "dataSrc": function (json) {
                console.log(json); 
                if (json.error) {
                    console.error("Error:", json.error);
                }
                return json.data;
            }
        },
        "columns": [
            {"data": "nombreaTrabajo"},
            {"data": "aldeaTrabajo"},
            {"data": "mentorTrabajo"},
            {"data": "Opciones"}
        ],
        "responsive": true,
        "destroy": true,
        "pageLength": 10,
        "order": [[0, "desc"]]
    });

    var formRoles = document.querySelector("#formRol");
    formRoles.onsubmit = function(e) {
        e.preventDefault();
        let idRol = document.querySelector("#idRol").value;
        let nombreTrabajo = document.querySelector("#textNrol").value;
        let descripcionTrabajo = document.querySelector("#descripcionRol").value;
        let statusTrabajo = document.querySelector("#idEstatus").value;
        let mentorTrabajo = document.querySelector("#mentores").value;
        //alert( foto);
        if(nombreTrabajo == ''|| descripcionTrabajo == '' || statusTrabajo == '' || mentorTrabajo == ''){
            alert("El campo nombre es obligatorio");
        }   

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Roles/setRol';
        var formData = new FormData(formRoles);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            "use strict";
            if (request.readyState == 4) {
                if (request.status == 200) {
                    try {
                        var objData = JSON.parse(request.responseText);
                        console.log(objData);
                        if (objData.status) {
                            formRoles.reset();
                            tableRoles.ajax.reload();
                        

        openModal(mentorTrabajo, nombreTrabajo);
                            
                        } else {
                            alert('Error: ' + objData.msg);
                        }
                        
                    } catch (e) {
                        console.error("Error al parsear JSON:", e);
                        //console.error("Respuesta recibida:", request.responseText);
                       // alert("Respuesta recibida:", request.responseText);
                    //    alert('Error al procesar la respuesta del servidor.');
                    }
                } else {
                   alert('Error en la solicitud: ' + request.statusText);
                }
            }
        }

        
    }


    /*Editar info de roles */
    window.addEventListener('load', function(){
        editarRol();
        eliminarRol();
    }, false);
    function editarRol(){
        document.addEventListener('click', function(event){
            
            if(event.target && event.target.classList.contains('btnEditarRol')){
               $('#myMomodalEdutarE').show();
                document.getElementById("tituloModals").innerText = "Edita los datos del renegado";
                document.getElementById('modal-contents').classList.replace("modal-contents","modalEditarE" );
                //Datos
                var idrol = event.target.getAttribute("idEditarE");
                //alert(idrol);
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Roles/getRole/'+idrol;
                request.open("get", ajaxUrl, true);
                request.send();
                request.onreadystatechange = function() {
                    "use strict";
                    if (request.readyState == 4) {
                        if (request.status == 200) {
                            console.log(request.responseText);
                            try{
                                var objData = JSON.parse(request.responseText);
                                if (objData.status) {
                                    objData.data.forEach(function(roleData) {
                                        document.querySelector('#idRolE').value = roleData.idaTrabajo;
                                        //alert(roleData.nombreaTrabajo);
                                        document.querySelector('#textNrolE').value = roleData.nombreaTrabajo;
                                        document.querySelector('#descripcionRolE').value = roleData.despcionTrabajo;
                                        var mentorName = roleData.mentorTrabajo;
                                        //alert(mentorName);                                
                                        var selectAldea = document.getElementById('idEstatusE');
                                        selectAldea.value = roleData.aldeaTrabajo;
                                        var selectMentor = document.getElementById('mentoresE');
                                        selectMentor.value = roleData.mentorTrabajo;
                                      
                                        var mentorImgUrl = getImageUrl(mentorName);
                                        if (mentorImgUrl) {
                                          document.getElementById('mentorImgE').src = mentorImgUrl;
                                            
                                        //    alert(mentorImgUrl);
                                        } else {
                                            console.log("Imagen no encontrada para el mentor: " + mentorName);
                                        }

                                        
                                    });
                                }
                            }catch (e) {
                                console.error("Error al parsear JSON:", e);
                                //console.error("Respuesta recibida:", request.responseText);
                               // alert("Respuesta recibida:", request.responseText);
                            //    alert('Error al procesar la respuesta del servidor.');
                            }
                        } else {
                           alert('Error en la solicitud: ' + request.statusText);
                        }
                    }
                 
                var formRoles = document.querySelector("#formularioEE");
                formRoles.onsubmit = function(e) {
                    //alert("hola");
                    e.preventDefault();
                    let idRol = document.querySelector("#idRol").value;
                    let nombreTrabajo = document.querySelector("#textNrol").value;
                    let descripcionTrabajo = document.querySelector("#descripcionRol").value;
                    let statusTrabajo = document.querySelector("#idEstatus").value;
                    let mentorTrabajo = document.querySelector("#mentores").value;
                   // alert(idRol);
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url + 'Roles/setUpdate';
                    console.log(ajaxUrl);
                    var formData = new FormData(formRoles);
                    console.log(formData);
                    request.open("POST", ajaxUrl, true);
                    request.send(formData);
                    request.onreadystatechange = function() {
                        "use strict";
                        if(request.readyState == 4){
                            if(request.status == 200) {
                                try {
                                    var objData = JSON.parse(request.responseText);
                                    console.log(objData);
                                    if (objData.status) {
                                        formRoles.reset();
                                        tableRoles.ajax.reload();                    
                                        document.getElementById("myMomodalEdutarE").style.display = "none"; 
                                    } else {
                                        alert('Error: ' + objData.msg);
                                    }
                                }catch (e) {
                                    console.error("Error al parsear JSON:", e);
                                    //console.error("Respuesta recibida:", request.responseText);
                                   // alert("Respuesta recibida:", request.responseText);
                                //    alert('Error al procesar la respuesta del servidor.');
                                }
                                    
                            }else {
                                alert('Error en la solicitud: ' + request.statusText);
                             }
                        }
                    }
                }
            }
        }

        });

    }
    /** Eliminar */
    function eliminarRol(){
        //alert(' GHola');
        document.addEventListener('click', function(event){
            if(event.target && event.target.classList.contains('btnEliminarRol')){
                var confirmacion = confirm("¿Estás seguro de que deseas eliminar este rol?");
                var idrol = event.target.getAttribute("idEditarE");
                if(confirmacion){
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url + 'Roles/delRol/'+idrol;
                    request.open("POST", ajaxUrl, true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.send();
                    request.onreadystatechange = function() {
                        if(request.readyState == 4){
                            if(request.status == 200){
                                alert("Rol eliminado exitosamente.");
                                location.reload();
                                var objData = JSON.parse(request.responseText);
                            if (objData.status && objData.status) {
                                alert("Rol eliminado exitosamente."); // Mensaje de éxito
                                location.reload();// Recargar la página
                            } else {
                                alert(objData.msg);
                                }
                            }else{
                                alert('Error en la solicitud: ' + request.statusText);
                            }
                        }
                    }
                }
                //alert(idrol);
            }
        });
    }






    $('#mentores').on('change', function() {
        const selectedMentor = $(this).val();
        const imageSrc = villageImages[selectedMentor] || base_url + "Assets/Img/logo.png"; // Default image if no match
        $('#villageImage').attr('src', imageSrc);
    
        const mentorText = selectedMentor ? selectedMentor : 'Elígeme a mí';
        $('#Idmentor h1').text(mentorText);
    });
    
    $('#mentoresE').on('change', function() {
        const selectedMentor = $(this).val();
        const imageSrc = villageImages[selectedMentor] || base_url + "Assets/Img/logo.png"; // Default image if no match
        $('#mentorImgE').attr('src', imageSrc);
    
        const mentorText = selectedMentor ? selectedMentor : 'Elígeme a mí';
        $('#textomodal h2').text(mentorText);
    });

    });
    
     $('#nuevoIntegranteBtn').on('click', function() {
            $('#formularioRoles').show();
            $('#tableContainer').hide();
        });

        $('#verRolesBtn').on('click', function() {
            $('#formularioRoles').hide();
            $('#tableContainer').show();
        });
    
