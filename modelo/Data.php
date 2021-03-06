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
        $sql = "select u.user,u.pswd,u.rut,u.nombre,u.apellidos,u.fe_habilitacion,e.nombre,es.nombre,i.nombre "
                . "from us_perfil u,us_estado e,us_estamento es,us_institucion i  "
                . "where u.institucion = i.id and u.estamento = es.id and u.estado = e.id "
                . "and user = '$usuario' and "
                . "pswd = '$pass'";
        $us = null;
        $res = $this->c->ejecutar($sql);
        while ($fila = $res->fetch_array()) {
            $us = new Usuario();
            $us->user = $fila[0];
            $us->pswd = $fila[1];
            $us->rut = $fila[2];
            $us->nombre = $fila[3];
            $us->apellidos = $fila[4];
            $us->feHabilitacion = $fila[5];
            $us->estado = $fila[6];
            $us->estamento = $fila[7];
            $us->institucion = $fila[8];
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
            echo " <li><a href='instituciones.php?id=" . $row[0] . "&nombre=" . $row[1] . "'> Editar Institución</a></li>";
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

    public function listaUsuarios($estamento) {
        $sql = "select u.user,u.rut,u.nombre,u.apellidos,u.fe_habilitacion,e.nombre,es.nombre,i.nombre from us_perfil u,us_estado e,us_estamento es,us_institucion i  where u.institucion = i.id and u.estamento = es.id and u.estado = e.id ";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover table-responsive dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>Usuario</th>";
        echo" <th>R.U.N</th>";
        echo" <th>Nombres</th>";
        echo" <th>Apellidos</th>";
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
            echo" <td>" . $row[6] . "</td>";
            echo" <td>" . $row[7] . "</td>";
            echo" <td>";
            echo"<div class='btn-group' role='group'>";
            echo" <button type = 'button' class = 'btn btn-danger dropdown-toggle' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>";
            echo"  ACCION";
            echo" <span class = 'caret'></span>";
            echo" </button>";
            echo " <ul class = 'dropdown-menu' role = 'menu'>";
            switch ($estamento) {
                case 'Administrador General':
                    echo " <li><a href='usuarios.php?usuario=" . $row[0] . "&rut=" . $row[1] . "&nom=" . $row[2] . "&ape=" . $row[3] . "&hab=" . $row[4] . "&es=" . $row[5] . "&esta=" . $row[6] . "&institu=" . $row[7] . "'> Editar Usuario</a></li>";
                    echo " <li><a onclick = EliminarUsuario('$row[1]')> Eliminar</a></li>";
                    echo " <li><a onclick = Pass('$row[1]','$row[0]')> Cambiar Contraseña</a></li>";

                    break;

                default:
                    echo " <li>Sin Permisos</li>";
                    break;
            }

            echo " </ul>";
            echo " </div>";
            echo"</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>";
    }
    
    public function listaDelincuentes() {
        $sql = "    select d.rut,d.nombre,d.apellidoP,d.apellidoM,d.apodo,d.domicilioP,r.nombre,c.nombre,d.fono_fijo,d.fono_p,d.fecha_nacimiento,e.nombre from dl_delincuente d,regiones r,comunas c ,dl_estado e where e.id = d.estado and r.codigo = d.region and c.codigoInterno = d.comuna ";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover table-responsive dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>R.U.N</th>";
        echo" <th>Nombres</th>";
        echo" <th>Apellidos</th>";
        echo" <th>Apodo</th>";
        echo" <th>Domicilio</th>";
        echo" <th>Region</th>";
        echo" <th>Comuna</th>";
        echo" <th>Telefono Fijo</th>";
        echo" <th>Telefono Celular</th>";
        echo" <th>Fecha Nacimiento</th>";
        echo" <th>Estado</th>";
        echo" </tr>";
        echo" </thead>";
        echo" <tbody>";
        while ($row = $res->fetch_array()) {
            echo" <tr style='color: #00598e;font-weight: bold;'>";
            echo" <td>" . $row[0] . "</td>";
            echo" <td>" . $row[1] . "</td>";
            echo" <td>" . $row[2] . " " . $row[3] . "</td>";
           
            echo" <td>" . $row[4] . "</td>";
            echo" <td>" . $row[5] . "</td>";
            echo" <td>" . $row[6] . "</td>";
            echo" <td>" . $row[7] . "</td>";
            echo" <td>" . $row[8] . "</td>";
            echo" <td>" . $row[9] . "</td>";
            echo" <td>" . $row[10] . "</td>";
            echo" <td>" . $row[11] . "</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>";
    }
    
    public function listaHistorial() {
        $sql = "select h.rut_delincuente,d.nombre,d.apellidoP,d.apellidoM,h.direccion,c.nombre,r.nombre,s.nombre from historialubicaciones h, dl_delincuente d,comunas c, regiones r,conf_sector s where s.cod = h.sector and r.codigo = h.region and c.codigointerno = h.comuna and d.rut = h.rut_delincuente ";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover table-responsive dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>R.U.N</th>";
        echo" <th>Nombres</th>";
        echo" <th>Apellido Paterno</th>";
        echo" <th>Apellido Materno</th>";
        echo" <th>Domicilio</th>";
        echo" <th>Comuna</th>";
        echo" <th>Region</th>";
        echo" <th>Sector</th>";
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
            echo" <td>" . $row[6] . "</td>";
            echo" <td>" . $row[7] . "</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>";
    }


    public function listaUsuariosF($estamento, $filtro) {
        $sql = "select u.user,u.rut,u.nombre,u.apellidos,u.fe_habilitacion,e.nombre,es.nombre,i.nombre from us_perfil u,us_estado e,us_estamento es,us_institucion i where u.institucion = i.id and u.estamento = es.id and u.estado = e.id and i.nombre = '" . $filtro . "'";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover table-responsive dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>Usuario</th>";
        echo" <th>R.U.N</th>";
        echo" <th>Nombres</th>";
        echo" <th>Apellidos</th>";
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
            echo" <td>" . $row[6] . "</td>";
            echo" <td>" . $row[7] . "</td>";
            echo" <td>";
            echo"<div class='btn-group' role='group'>";
            echo" <button type = 'button' class = 'btn btn-danger dropdown-toggle' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>";
            echo"  ACCION";
            echo" <span class = 'caret'></span>";
            echo" </button>";
            echo " <ul class = 'dropdown-menu' role = 'menu'>";
            switch ($estamento) {
                case 'Administrador General':
                    echo " <li><a href='usuarios.php?usuario=" . $row[0] . "&rut=" . $row[1] . "&nom=" . $row[2] . "&ape=" . $row[3] . "&hab=" . $row[4] . "&es=" . $row[5] . "&esta=" . $row[6] . "&institu=" . $row[7] . "'> Editar Usuario</a></li>";
                    echo " <li><a onclick = EliminarUsuario('$row[1]')> Eliminar</a></li>";
                    echo " <li><a onclick = Pass('$row[1]','$row[0]')> Cambiar Contraseña</a></li>";

                    break;

                default:
                    echo " <li>Sin Permisos</li>";
                    break;
            }

            echo " </ul>";
            echo " </div>";
            echo"</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>";
    }

    public function listaSectores() {
        $sql = "select * from conf_sector ";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover table-responsive dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>Codigo</th>";
        echo" <th>Nombre</th>";
        echo" <th>Calle Norte</th>";
        echo" <th>Calle Oeste</th>";
        echo" <th>Calle Sur</th>";
        echo" <th>Calle Este</th>";
        echo" <th>Color</th>";
        echo" <th>Descripcion</th>";
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
            echo" <td>" . $row[6] . "</td>";
            echo" <td>" . $row[7] . "</td>";
            echo" <td>";
            echo"<div class='btn-group' role='group'>";
            echo" <button type = 'button' class = 'btn btn-danger dropdown-toggle' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>";
            echo"  ACCION";
            echo" <span class = 'caret'></span>";
            echo" </button>";
            echo " <ul class = 'dropdown-menu' role = 'menu'>";

            echo " <li><a href='sectores.php?cod=" . $row[0] . "&nombre=" . $row[1] . "&calleN=" . $row[2] . "&calleO=" . $row[3] . "&calleS=" . $row[4] . "&calleE=" . $row[5] . "&color=" . $row[6] . "&descripcion=" . $row[7] . "'> Editar Sector</a></li>";
            echo " <li><a onclick = EliminarSector('$row[0]')> Eliminar</a></li>";



            echo " </ul>";
            echo " </div>";
            echo"</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>";
    }

    public function listaParentesco($estamento) {
        $sql = "select p.id, p.rut1,tp.parentesco,p.rut2 from parentensco p , tipoparentesco tp where tp.id = p.parentesco";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover table-responsive dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>Id</th>";
        echo" <th>R.U.N</th>";
        echo" <th>Tipo Parentensco</th>";
        echo" <th>R.U.N</th>";
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
            echo" <td>";
            echo"<div class='btn-group' role='group'>";
            echo" <button type = 'button' class = 'btn btn-danger dropdown-toggle' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>";
            echo"  ACCION";
            echo" <span class = 'caret'></span>";
            echo" </button>";
            echo " <ul class = 'dropdown-menu' role = 'menu'>";
switch ($estamento) {
                case 'Administrador General':
                   echo " <li><a onclick = EliminarParentesco('$row[0]')> Eliminar</a></li>";

                    break;
                case 'Jefe de Zona':
                    echo " <li><a onclick = EliminarParentesco('$row[0]')> Eliminar</a></li>";
                    break;

                default:
                    echo " <li>Sin Permisos</li>";
                    break;
            }

           



            echo " </ul>";
            echo " </div>";
            echo"</td>";
            echo" </tr>";
        }
        echo" </tbody>";
        echo" </table>";
    }
    
    public function listaParentesco2() {
        $sql = "select p.rut1,tp.parentesco,p.rut2 from parentensco p , tipoparentesco tp where tp.id = p.parentesco";
        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <table class='table table-striped table-bordered table-hover table-responsive dataTables-example'>";
        echo" <thead>";
        echo" <tr>";
        echo" <th>R.U.N</th>";
        echo" <th>Tipo Parentensco</th>";
        echo" <th>R.U.N</th>";
        echo" <th>Acciones</th>";
        echo" </tr>";
        echo" </thead>";
        echo" <tbody>";
        while ($row = $res->fetch_array()) {
            echo" <tr style='color: #00598e;font-weight: bold;'>";
            echo" <td>" . $row[0] . "</td>";
            echo" <td>" . $row[1] . "</td>";
            echo" <td>" . $row[2] . "</td>";
            
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

    public function insertUsuario($user, $pass, $rut, $nombre, $apellido, $habilitacion, $estado, $estamento, $institucion) {
        $sql = "insert into us_perfil values ('" . $user . "','" . $pass . "','" . $rut . "','" . $nombre . "','" . $apellido . "','" . $habilitacion . "','" . $estado . "','" . $estamento . "','" . $institucion . "')";
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

    public function insertDelitoDelincuente($rut, $cod) {
        $sql = "insert into delincuenteDelito values (null,'" . $rut . "','" . $cod . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/delito.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/delito.php"';
            echo '</script>';
        }
    }

    public function insertSectores($cod, $nombre, $calle_n, $calle_o, $calle_s, $calle_e, $color, $descripcion) {
        $sql = "insert into conf_sector values ('" . $cod . "','" . $nombre . "','" . $calle_n . "','" . $calle_o . "','" . $calle_s . "','" . $calle_e . "','" . $color . "','" . $descripcion . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/sectores.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/sectores.php"';
            echo '</script>';
        }
    }

    public function insertDelincuentes($rut, $nombre, $apeP, $apeM, $apodo, $domici, $reg, $comu, $fonoF, $fonoP, $fecha, $esta) {
        $sql = "insert into dl_delincuente values ('" . $rut . "','" . $nombre . "','" . $apeP . "','" . $apeM . "','" . $apodo . "','" . $domici . "','" . $reg . "','" . $comu . "','" . $fonoF . "','" . $fonoP . "','" . $fecha . "','" . $esta . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion ");location.href="../vista/delincuente.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/delincuente.php"';
            echo '</script>';
        }
    }

    public function insertDelitos($cod, $descripcion, $direccion, $comuna, $region, $sector, $fecha, $obv) {
        $sql = "insert into dat_delito values ('" . $cod . "','" . $descripcion . "','" . $direccion . "','" . $comuna . "','" . $region . "','" . $sector . "','" . $fecha . "','" . $obv . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion ");location.href="../vista/delito.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/delito.php"';
            echo '</script>';
        }
    }

    public function insertParentesco($rut1, $parentesco, $rut2) {
        $sql = "insert into parentensco values (null,'" . $rut1 . "','" . $parentesco . "','" . $rut2 . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/parentesco.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/parentesco.php"';
            echo '</script>';
        }
    }
    
    public function insertUbicaciones($rut, $direccion, $comuna,$region,$sector) {
        $sql = "insert into historialubicaciones values (null,'" . $rut . "','" . $direccion . "','" . $comuna . "','" . $region . "','" . $sector . "')";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/delincuente.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Registrado Correctamente"); location.href="../vista/delincuente.php"';
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
        echo "<select id='region' name='estado' class='form-control m-b'  >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
    }

    public function comboEstadoFiltro($filtro) {
        $sql = "select id, nombre from us_estado";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='region' name='estado' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {
            if ($filtro == $resultado[1]) {
                echo "<option value='" . $resultado[0] . "' selected> " . $resultado[1] . "</option>";
            } else {
                echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
            }
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

    public function comboEstamentosFiltro($filtro) {
        $sql = "select id, nombre from us_estamento";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='region' name='estamento' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {
            if ($filtro == $resultado[1]) {
                echo "<option value='" . $resultado[0] . "' selected> " . $resultado[1] . "</option>";
            } else {
                echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
            }
        }
        echo "</select>";
    }

    public function comboEstamentosSinAdmin() {
        $sql = "select * from us_estamento where nombre not like '%Administrador General%';";

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

    public function comboInstitucionFiltro($filtro) {
        $sql = "select id, nombre from us_institucion where nombre = '".$filtro."' ";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='region' name='institucion' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {
            if ($filtro == $resultado[1]) {
                echo "<option value='" . $resultado[0] . "' selected> " . $resultado[1] . "</option>";
            } else {
                echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
            }
        }
        echo "</select>";
    }
    public function comboRegionFiltro($id) {
        $sql = "select c.codigoInterno,c.nombre from comunas c , regiones r where c.padre = r.codigo and  r.codigo = " . $id;

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo" <div class = 'col-sm-10'>";
        echo "<select id='region' name='regionF' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
        echo"</div>";
    }

    public function comboRegion() {
        $sql = "select codigo, nombre from regiones";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='region' name='region' class='form-control m-b' required>";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
    }

    public function comboEstadoDel() {
        $sql = "select id, nombre from dl_estado";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='estadoDeli' name='estadoDeli' class='form-control m-b' required>";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
    }

    public function comboDeli() {
        $sql = "select rut,nombre,apellidoP,apellidoM from dl_delincuente;";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='comboDeli' name='ComboDeli' class='chosen' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[0] . "|" . $resultado[1] . " " . $resultado[2] . " " . $resultado[3] . "</option>";
        }
        echo "</select>";
    }

    public function comboDeli2() {
        $sql = "select rut,nombre,apellidoP,apellidoM from dl_delincuente;";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='comboDeli' name='ComboDeli2' class='chosen' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[0] . "|" . $resultado[1] . " " . $resultado[2] . " " . $resultado[3] . "</option>";
        }
        echo "</select>";
    }

    public function comboParentesco() {
        $sql = "select * from tipoparentesco;";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='comboDeli' name='ComboParen' class='chosen' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
    }

    public function comboDelitos() {
        $sql = "select cod from dat_delito;";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='comboDeli' name='ComboDeli' class='chosen' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[0] . "</option>";
        }
        echo "</select>";
    }

    public function combosector() {
        $sql = "select cod, nombre from conf_sector";

        $tildes = $this->c->ejecutar("SET NAMES 'utf8'");
        $res = $this->c->ejecutar($sql);
        echo "<select id='sector' name='sector' class='form-control m-b' >";
        while ($resultado = $res->fetch_array()) {

            echo "<option value='" . $resultado[0] . "'> " . $resultado[1] . "</option>";
        }
        echo "</select>";
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

    public function upUsuarios($user, $estado, $estamento, $rut) {
        $sql = "UPDATE us_perfil set user='" . $user . "', estado='" . $estado . "', estamento='" . $estamento . "' where rut='" . $rut . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/usuarios.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("El Usuario (' . $user . ') Ha Sido Actualizado Correctamente"); location.href="../vista/usuarios.php"';
            echo '</script>';
        }
    }

    public function upPassUsuarios($pass, $rut) {
        $sql = "UPDATE us_perfil set pswd='" . $pass . "' where rut='" . $rut . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/usuarios.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("El Usuario (' . $user . ') Ha Sido Actualizado Correctamente"); location.href="../vista/usuarios.php"';
            echo '</script>';
        }
    }

    public function upSectores($cod, $nombre, $calle_n, $calle_o, $calle_s, $calle_e, $color, $descripcion) {
        $sql = "UPDATE conf_sector set nombre='" . $nombre . "',calle_n='" . $calle_n . "',calle_o='" . $calle_o . "',calle_s='" . $calle_s . "',calle_e='" . $calle_e . "',color='" . $color . "',descripcion='" . $descripcion . "' where cod='" . $cod . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/sectores.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("El Sector (' . $nombre . ') Ha Sido Actualizado Correctamente"); location.href="../vista/sectores.php"';
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

    public function borrarUsuario($rut) {
        $sql = "DELETE FROM us_perfil WHERE rut = '" . $rut . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/usuario.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Eliminado Correctamente"); location.href="../vista/usuario.php"';
            echo '</script>';
        }
    }
    
    public function borrarParentesco($id) {
        $sql = "DELETE FROM parentensco WHERE id = '" . $id . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/usuario.php?e=1"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Eliminado Correctamente"); location.href="../vista/usuario.php"';
            echo '</script>';
        }
    }

    public function borrarSector($id) {
        $sql = "DELETE FROM conf_sector WHERE cod = '" . $id . "'";
        if (!$this->c->ejecutar($sql)) {
            echo '<script language="javascript">';
            echo 'alert("Error, No se Realizo la accion");location.href="../vista/sectores.php"';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Eliminado Correctamente"); location.href="../vista/sectores.php"';
            echo '</script>';
        }
    }


}
