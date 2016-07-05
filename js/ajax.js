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
function EliminarSector(id) {
    if (confirm("¿En realidad desea eliminar este Sector?")) {
        ajax = objetoAjax();
        ajax.open("POST", "../controlador/ControEliminarSectores.php", true);
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

function EliminarUsuario(id) {
    if (confirm("En realidad desea eliminar esta Usuario?")) {
        ajax = objetoAjax();
        ajax.open("POST", "../controlador/controEliminarUsuarios.php", true);
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

function PassUser(id, usuario, pass1, pass2) {
    id = document.frmPass.id.value;
    usuario = document.frmPass.usuario.value;
    pass1 = document.frmPass.pass1.value;
    pass2 = document.frmPass.pass2.value;

    ajax = objetoAjax();
    if (pass1 == pass2) {
        ajax.open("POST", "../controlador/ControEditarPassUser.php", true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4) {
                alert('Los datos fueron guardados con exito!');
                window.location.reload(true);
            }
        }
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("id=" + id + "&usuario=" + usuario + "&pass=" + pass1);
    } else {
        alert("La Contraseña Ingresada No Es Valida");
    }

}

