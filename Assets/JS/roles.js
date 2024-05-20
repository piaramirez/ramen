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
            {"data": "idaTrabajo"},
            {"data": "nombreaTrabajo"},
            {"data": "despcionTrabajo"},
            {"data": "statusaTrabajo"},
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
        let nombreTrabajo = document.querySelector("#textNrol").value;
        let descripcionTrabajo = document.querySelector("#descripcionRol").value;
        let statusTrabajo = document.querySelector("#idEstatus").value;
        //alert( statusTrabajo);
        if(nombreTrabajo == ''|| descripcionTrabajo == '' || statusTrabajo == ''){
            alert("El campo nombre es obligatorio");
        }   
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Roles/setRol';
        var formData = new FormData(formRoles);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                alert("Respuesta del servidor:", request.responseText);
                //console.log("Respuesta del servidor:", request.responseText);
                if (request.status == 200) {
                    try {
                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {
                            formRoles.reset();
                            tableRoles.ajax.reload();
                        } else {
                            alert('Error: ' + objData.msg);
                        }
                    } catch (e) {
                        console.error("Error al parsear JSON:", e);
                        //console.error("Respuesta recibida:", request.responseText);
                        alert("Respuesta recibida:", request.responseText);
                    //    alert('Error al procesar la respuesta del servidor.');
                    }
                } else {
                   alert('Error en la solicitud: ' + request.statusText);
                }
            }
        }
        
    }   
});
