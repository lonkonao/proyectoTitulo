<?php

require_once 'Conexion.php';

class Data {

    public $c;

    public function __construct() {
        $this->c = new Conexion();
    }

//   
//    
//     
//      
//        
//    
//   
//
//    Select
//    
//    
//    
//    
//    
//    
//    

    public function existeUsuario($usuario, $pass) {
        $sql = "select * from usuario "
                . "where usuario = '$usuario' and "
                . "pass = '$pass'";
        $us = null;
        $res = $this->c->ejecutar($sql);
        while ($fila = $res->fetch_array()) {
            $us = new Usuario();
            $us->user = $fila[0];
            $us->pswd = $fila[1];
            $us->rut = $fila[2];
            $us->feHabilitacion = $fila[3];
            $us->estado = $fila[4];
            $us->editar = $fila[5];
            $us->estamento = $fila[6];
            $us->institucion = $fila[7];
            
        }
        return $us;
    }

    public function listaInstituciones() {
        $sql = "select * from us_institucion";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo"  <table class='table table-striped'  >";
        echo"     <thead>";
        echo"        <tr>";
        echo"            <th>Id</th>";
        echo"            <th>Institucion</th>";
		echo"            <th>Acciones</th>";
        echo"      </tr>";
        echo"  </thead>";
        echo"  <tbody>";
        while ($row = $res->fetch_array()) {
            echo"        <tr>";
            echo"            <td>" . $row[0] . "</td>";
            echo"            <td>" . $row[1] . "</td>";
            echo"            <td>";
            echo"<div class='btn-group' role='group'>";
            echo" <button type = 'button' class = 'btn btn-danger dropdown-toggle' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>";
            echo"  ACCION";
            echo" <span class = 'caret'></span>";
            echo" </button>";
            echo " <ul class = 'dropdown-menu' role = 'menu'>";
            echo " <li><a href='instituciones.php?id=" . $row[0] . "&nombre=" . $row[1] ."'> Editar Institución</a></li>";
            echo " <li><a onclick = Eliminar('$row[0]')> Eliminar</a></li>";
            echo " </ul>";
            echo " </div>";
            echo"</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>"
        ;
    }

    public function listaUsuarios() {
        $sql = "select u.user,u.rut,u.fe_habilitacion,e.nombre,es.nombre,i.nombre from us_perfil u,us_estado e,us_estamento es,us_institucion i  where u.institucion = i.id and u.estamento = es.id and u.estado = e.id ";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>Usuario</th>";
        echo" <th>R.U.N</th>";
        echo" <th>Habilitacion</th>";
        echo" <th>Estado</th>";
        echo" <th>Estamento</th>";
        echo" <th>Institucion</th>";
	echo" <th>Acciones</th>";
        echo" </tr>";
        echo" </thead>";
        echo" <tbody>";
        while ($row = $res->fetch_array()) {
            echo" <tr style='color: #00598e;font-weight: bold;'>";
            echo" <td>" . $row[0] . "</td>";
            echo" <td>" . $row[1] . "</td>";
            echo" <td>" . $row[2] . "</td>";
            echo" <td>" . $row[3] . "</td>";
            echo" <td>" . $row[4] . "</td>";
			echo" <td>" . $row[5] . "</td>";
            echo" <td>";
            echo"<div class='btn-group' role='group'>";
            echo" <button type = 'button' class = 'btn btn-danger dropdown-toggle' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>";
            echo"  ACCION";
            echo" <span class = 'caret'></span>";
            echo" </button>";
            echo " <ul class = 'dropdown-menu' role = 'menu'>";
            echo " <li><a href='instituciones.php?id=" . $row[0] . "&nombre=" . $row[1] ."'> Editar Usuario</a></li>";
            echo " <li><a onclick = Eliminar('$row[0]')> Eliminar</a></li>";
            echo " </ul>";
            echo " </div>";
            echo"</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>";
       
    }

   

    //    
    //     
    //      
    //        
    //    
    //   
    //
                                        //    Select
    //    
    //    
    //    
    //    
    //    
    //    
    // 
    //   
    //    
    //     
    //      
    //        
    //    
    //   
    //
                                        //    INSERT
    //    
    //    
    //    
    //    
    //    
    //    
    //  
    public function insertInstitucion($nombre) {
        $sql = "insert into us_institucion values (null,'" . $nombre . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion ");location.href="../vista/instituciones.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/instituciones.php"';
            echo '</script>';
        }
    }

    public function insertUsuario($nombre, $pass, $rut, $habilitacion, $estado, $estamento, $institucion) {
        $sql = "insert into us_perfil values ('" . $nombre . "','" . $pass . "','" . $rut . "','" . $habilitacion . "','" . $estado . "','" . $estamento . "','" . $institucion . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/usuarios.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/usuarios.php"';
            echo '</script>';
        }
    }

    //    
    //     
    //      
    //        
    //    
    //   
    //
                                        //    INSERT
    //    
    //    
    //    
    //    
    //    
    //    
    //     
    //    
    //     
    //      
    //        
    //    
    //   
    //
                                        //    combo
    //    
    //    
    //    
    //    
    //    
    //    
    //  

    public function comboEstado() {
        $sql = "select id, nombre from us_estado";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='region' name='estado' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
    }
	
	public function comboEstamentos() {
        $sql = "select id, nombre from us_estamento";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='region' name='estamento' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
    }
	
	public function comboInstitucion() {
        $sql = "select id, nombre from us_institucion";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='region' name='institucion' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
    }
	

	
	

    public function comboRegionFiltro($id) {
        $sql = "select c.codigoInterno,c.nombre from comunas c , regiones r where c.padre = r.codigo and  r.codigo = " . $id;

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<div class='col-sm-10'>";
        echo "<select id='region' name='regionF' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }

    //    
    //     
    //      
    //        
    //    
    //   
    //
                                        //    combo
    //    
    //    
    //    
    //    
    //    
    //    
    //     
    //    
    //     
    //      
    //        
    //    
    //   
    //
                                        //    Update
    //    
    //    
    //    
    //    
    //    
    //    
    //  
    public function upInstitucion($nombre, $id) {
        $sql = "UPDATE us_institucion set nombre='" . $nombre . "' where id='" . $id . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/instituciones.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("El Usuario (' . $nombre . ') Ha Sido Actualizado Correctamente"); location.href="../vista/instituciones.php"';
            echo '</script>';
        }
    }

    public function upUser($id, $user, $per, $es, $ed, $el, $cen) {
        $sql = "UPDATE usuario set usuario='" . $user . "', permiso='" . $per . "', estado='" . $es . "', editar='" . $ed . "', eliminar='" . $el . "', centro='" . $cen . "' where id='" . $id . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/portal.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("La Institución (' . $user . ') Ha Sido Actualizada Correctamente"); location.href="../vista/portal.php"';
            echo '</script>';
        }
    }

    //
    //    
    //    
    //    
    //    
    //    Borrar
    //    
    //    
    //    
    //    
    //    
    //    
    //    
    //    
    //    
    //    
    public function borrarInstitucion($id) {
        $sql = "DELETE FROM us_institucion WHERE id = '" . $id . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/instituciones.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Eliminado Correctamente"); location.href="../vista/instituciones.php"';
            echo '</script>';
        }
    }

    public function desasociarFunEqu($id) {
        $sql = "DELETE FROM funcionarioPc WHERE equipo = '" . $id . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../registrar.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Eliminado Correctamente");location.href="../registrar.php"';
            echo '</script>';
        }
    }

}
