function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}




function Eliminar(id) {
    if (confirm("En realidad desea eliminar esta Institucion?")) {
        ajax = objetoAjax();
        ajax.open("POST", "../controlador/controEliminarInstituciones.php", true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4) {
                alert('El registro fue eliminado con exito!');
                window.location.reload(true);
            }
        }
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("id=" + id)
    } else {
        //Sin acciones
    }

}
