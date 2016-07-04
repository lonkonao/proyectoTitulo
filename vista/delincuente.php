<!DOCTYPE html>
<html>
    <?php
    include_once '../controlador/ControSeguridad.php';

    $userUsuario = $_SESSION["nombreUser"];
    $rutUsuario = $_SESSION["rutUser"];
    $nombreUsuario = $_SESSION["nomUser"];
    $apellidoUsuario = $_SESSION["apelliUser"];
    $institucionUsuario = $_SESSION["instiUser"];
    $estadoUsuario = $_SESSION["estadoUser"];
    $estamentoUsuario = $_SESSION["estamUser"];
    ?>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Prevcrim</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- Gritter -->
        <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

        <link href="../css/animate.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

        <link href="../css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="../css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

        <link href="../css/plugins/steps/jquery.steps.css" rel="stylesheet">


    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                    <img alt="image" class="img-circle" src="../img/profile_small.jpg" />
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                                        </span> <span class="text-muted text-xs block">USER <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="profile.html">Perfil</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html">Cerrar Sesion</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                PrevCrim
                            </div>
                        </li>
                        <?php
                        switch ($estamentoUsuario) {
                            case "Administrador General":

                                echo"<li>";
                                echo"    <a href='portal.php'><i class='fa fa-home'></i> <span class='nav-label'>Portal</span> <span class='fa arrow'></span></a>";
                                echo"    <ul class='nav nav-second-level'>";
                                echo"        <li><a href='portal.php'><i class='fa fa-home'></i>Inicio</a></li>";
                                echo"        <li ><a href='#'><i class='fa fa-line-chart'></i>Estadisticas Portal</a></li>";
                                echo"    </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Administracion Portal</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='instituciones.php'><i class='fa fa-university'></i> Instituciones</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-user'></i> Usuarios</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li class='active'> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Ingresos Datos</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li class='active'><a href='#'><i class='fa fa-user-secret'></i> Delincuente</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-gavel'></i> Delitos</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-map-marker' aria-hidden='true'></i> Sectores</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-users'></i> Parentesco</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-user-plus'></i> Usuarios</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-print'></em> <span class='nav-label'>Reportes</span> <span class='fa arrow'></span></a> ";
                                echo"                        </li>";





                                break;
                            case "Jefe de Zona":

                                echo"<li>";
                                echo"    <a href='../portal.php'><i class='fa fa-home'></i> <span class='nav-label'>Portal</span> <span class='fa arrow'></span></a>";
                                echo"    <ul class='nav nav-second-level'>";
                                echo"        <li><a href='../portal.php'><i class='fa fa-home'></i>Inicio</a></li>";
                                echo"    </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Administracion Portal</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='#'><i class='fa fa-user'></i> Usuarios</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li class='active'> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Ingresos Datos</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li class='active'><a href='#'><i class='fa fa-user-secret'></i> Delincuente</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-gavel'></i> Delitos</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-map-marker' aria-hidden='true'></i> Sectores</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-users'></i> Parentesco</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-print'></em> <span class='nav-label'>Reportes</span> <span class='fa arrow'></span></a> ";
                                echo"                        </li>";





                                break;
                            case "Operador":

                                echo"<li class='active'>";
                                echo"    <a href='portal.php'><i class='fa fa-home'></i> <span class='nav-label'>Portal</span> <span class='fa arrow'></span></a>";
                                echo"    <ul class='nav nav-second-level'>";
                                echo"        <li class='active'><a href='portal.php'><i class='fa fa-home'></i>Inicio</a></li>";
                                echo"    </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Ingresos Datos</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='#'><i class='fa fa-user-secret'></i> Delincuente</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-gavel'></i> Delitos</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-users'></i> Parentesco</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";




                                break;
                        }
                        ?>
                    </ul>

                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Sistema de Prevencion de Crimen</span>
                            </li>
                            <!--   
                               <li class="dropdown">
                                   <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                       <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                                   </a>
                                   <ul class="dropdown-menu dropdown-messages">
                                       <li>
                                           <div class="dropdown-messages-box">
                                               <a href="profile.html" class="pull-left">
                                                   <img alt="image" class="img-circle" src="img/a7.jpg">
                                               </a>
                                               <div class="media-body">
                                                   <small class="pull-right">46h ago</small>
                                                   <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                   <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                               </div>
                                           </div>
                                       </li>
                                       <li class="divider"></li>
                                       <li>
                                           <div class="dropdown-messages-box">
                                               <a href="profile.html" class="pull-left">
                                                   <img alt="image" class="img-circle" src="img/a4.jpg">
                                               </a>
                                               <div class="media-body ">
                                                   <small class="pull-right text-navy">5h ago</small>
                                                   <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                   <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                               </div>
                                           </div>
                                       </li>
                                       <li class="divider"></li>
                                       <li>
                                           <div class="dropdown-messages-box">
                                               <a href="profile.html" class="pull-left">
                                                   <img alt="image" class="img-circle" src="img/profile.jpg">
                                               </a>
                                               <div class="media-body ">
                                                   <small class="pull-right">23h ago</small>
                                                   <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                   <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                               </div>
                                           </div>
                                       </li>
                                       <li class="divider"></li>
                                       <li>
                                           <div class="text-center link-block">
                                               <a href="mailbox.html">
                                                   <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                               </a>
                                           </div>
                                       </li>
                                   </ul>
                               </li> -->



                            <li>
                                <a href="index.php">
                                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>


                <!--   <div class="row  border-bottom white-bg dashboard-header"> -->
                <!-- main body   -->

                <!--    </div> -->
                <!--   <div class="row"> -->
                <!-- main body   -->

                <!--   </div> -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Registro de Delincuentes</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                </div>
                            </div>
                            <div class="ibox-content">
                                <h2>
                                    Ingreso de Delincuentes
                                </h2>
                                <p>
                                    Siga los pasos para registrar a un delincuente
                                </p>

                                <form id="form" action="#" class="wizard-big">
                                    <h1>Antecedentes Basicos</h1>
                                    <fieldset>
                                        <h2>Antecedentes</h2>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label>R.U.N *</label>
                                                    <input  name="txtRut" type="text" data-mask="99.999.999-*" placeholder="12.345.678-9" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nombres *</label>
                                                    <input  name="txtNombre" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Apellido Paterno *</label>
                                                    <input name="txtApellidoP" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Apellido Materno *</label>
                                                    <input name="txtApellidoM" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Apodo</label>
                                                    <input name="txtApodo" type="text" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="text-center">
                                                    <div style="margin-top: 20px">
                                                        <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <h1>Perfil</h1>
                                    <fieldset>
                                        <h2>Perfil Información</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Domicilio Particular *</label>
                                                    <input name="txtDomicilio" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last name *</label>
                                                    <?php
                                                    require_once '../modelo/Data.php';
                                                    $d = new Data();

                                                    $d->comboRegion();
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input id="email" name="email" type="text" class="form-control required email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Address *</label>
                                                    <input id="address" name="address" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>Warning</h1>
                                    <fieldset>
                                        <div class="text-center" style="margin-top: 120px">
                                            <h2>You did it Man :-)</h2>
                                        </div>
                                    </fieldset>

                                    <h1>Finish</h1>
                                    <fieldset>
                                        <h2>Terms and Conditions</h2>
                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>

    </div>




    <script src="../js/ajax.js"></script>

    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Data Tables -->
    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="../js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="../js/plugins/dataTables/dataTables.tableTools.min.js"></script>
    <!-- Steps -->
    <script src="../js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="../js/plugins/validate/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#region').change(function () {
                var id = $('#region').val();
                $('#comunas').load('ajax.php?id=' + id);
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.dataTables-example').dataTable({
//                    responsive: true,
//                    "dom": 'T<"clear">lfrtip',
//                    "tableTools": {
//                       "sSwfPath": "../js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
//                    },
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    }


                }

            });
        });
    </script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="../js/plugins/toastr/toastr.min.js"></script>

    <!-- Input Mask-->
    <script src="../js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Switchery -->
    <script src="../js/plugins/switchery/switchery.js"></script>

    <script src="../js/ajax.js"></script>



</body>
</html>
