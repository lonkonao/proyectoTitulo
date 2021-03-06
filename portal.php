<?php
    include_once './controlador/ControSeguridad.php';

    $userUsuario = $_SESSION["nombreUser"];
    $rutUsuario = $_SESSION["rutUser"];
    $nombreUsuario = $_SESSION["nomUser"];
    $apellidoUsuario = $_SESSION["apelliUser"];
    $institucionUsuario = $_SESSION["instiUser"];
    $estadoUsuario = $_SESSION["estadoUser"];
    $estamentoUsuario = $_SESSION["estamUser"];
    ?>
<!DOCTYPE html>
<html>
    
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Prevcrim</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- Gritter -->
        <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                    <div class="logo-element">
                                PrevCrim
                            </div>
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                                        </span> <span class="text-muted text-xs block"><?php $nombreUsuario?> <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    
                                    <li><a href="controlador/CerrarSession.php">Cerrar Sesion</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                PrevCrim
                            </div>
                        </li>
                        <?php
                        switch ($estamentoUsuario) {
                            case "Administrador General":

                                echo"<li class='active'>";
                                echo"    <a href='portal.php'><i class='fa fa-home'></i> <span class='nav-label'>Portal</span> <span class='fa arrow'></span></a>";
                                echo"    <ul class='nav nav-second-level'>";
                                echo"        <li class='active'><a href='portal.php'><i class='fa fa-home'></i>Inicio</a></li>";
                                echo"        <li ><a href='#'><i class='fa fa-line-chart'></i>Estadisticas Portal</a></li>";
                                echo"    </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Administracion Portal</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='./vista/instituciones.php'><i class='fa fa-university'></i> Instituciones</a></li>";
                                echo"                                <li><a href='./vista/usuarios.php'><i class='fa fa-user'></i> Usuarios</a></li>";
                                echo"                                <li><a href='./vista/sectores.php'><i class='fa fa-map-marker' aria-hidden='true'></i> Sectores</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Ingresos Datos</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='./vista/delincuente.php'><i class='fa fa-user-secret'></i> Delincuente</a></li>";
                                echo"                                <li><a href='./vista/delito.php'><i class='fa fa-gavel'></i> Delitos</a></li>";
                                echo"                                <li><a href='./vista/parentesco.php'><i class='fa fa-users'></i> Parentesco</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='./vista/reportes.php'><em class='fa fa-print'></em> <span class='nav-label'>Reportes</span> <span class='fa arrow'></span></a> ";
                                                          
                                echo"                        </li>";





                                break;
                            case "Jefe de Zona":

                                echo"<li class='active'>";
                                echo"    <a href='portal.php'><i class='fa fa-home'></i> <span class='nav-label'>Portal</span> <span class='fa arrow'></span></a>";
                                echo"    <ul class='nav nav-second-level'>";
                                echo"        <li class='active'><a href='portal.php'><i class='fa fa-home'></i>Inicio</a></li>";
                                echo"    </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Administracion Portal</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='vista/usuarios.php'><i class='fa fa-user'></i> Usuarios</a></li>";
                                echo"                                <li><a href='vista/sectores.php'><i class='fa fa-map-marker' aria-hidden='true'></i> Sectores</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Ingresos Datos</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='./vista/delincuente.php'><i class='fa fa-user-secret'></i> Delincuente</a></li>";
                                echo"                                <li><a href='./vista/delito.php'><i class='fa fa-gavel'></i> Delitos</a></li>";
                                echo"                                <li><a href='#'><i class='fa fa-users'></i> Parentesco</a></li>";

                                echo"                            </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='./vista/reportes.php'><em class='fa fa-print'></em> <span class='nav-label'>Reportes</span> <span class='fa arrow'></span></a> ";
                                echo"                        </li>";





                                break;
                            case "Operador":

                                echo"<li class>";
                                echo"    <a href='portal.php'><i class='fa fa-home'></i> <span class='nav-label'>Portal</span> <span class='fa arrow'></span></a>";
                                echo"    <ul class='nav nav-second-level'>";
                                echo"        <li class='active'><a href='portal.php'><i class='fa fa-home'></i>Inicio</a></li>";
                                echo"    </ul>";
                                echo"                        </li>";
                                echo"                        <li> ";
                                echo"                            <a href='#'><em class='fa fa-cog'></em> <span class='nav-label'>Ingresos Datos</span> <span class='fa arrow'></span></a> ";
                                echo"                            <ul class='nav nav-second-level'>";
                                echo"                                <li><a href='./vista/delincuente.php'><i class='fa fa-user-secret'></i> Delincuente</a></li>";
                                echo"                                <li><a href='./vista/delito.php'><i class='fa fa-gavel'></i> Delitos</a></li>";
                                echo"                                <li><a href='./vista/parentesco.php'><i class='fa fa-users'></i> Parentesco</a></li>";

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
                                <a href="controlador/CerrarSession.php">
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
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Flot -->
        <script src="js/plugins/flot/jquery.flot.js"></script>
        <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="js/plugins/flot/jquery.flot.spline.js"></script>
        <script src="js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="js/plugins/flot/jquery.flot.pie.js"></script>

        <!-- Peity -->
        <script src="js/plugins/peity/jquery.peity.min.js"></script>
        <script src="js/demo/peity-demo.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>

        <!-- jQuery UI -->
        <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

        <!-- GITTER -->
        <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

        <!-- Sparkline demo data  -->
        <script src="js/demo/sparkline-demo.js"></script>

        <!-- ChartJS-->
        <script src="js/plugins/chartJs/Chart.min.js"></script>

        <!-- Toastr -->
        <script src="js/plugins/toastr/toastr.min.js"></script>


        <script>
            var institucion = "<?php echo $institucionUsuario; ?>";
            var usuario = "<?php echo $userUsuario; ?>";
            var estamento = "<?php echo $estamentoUsuario; ?>";
            $(document).ready(function () {
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('haz ingresado Como ' + estamento + ' De la Institucion ' + institucion, 'Hola ' + usuario);

                }, 1300);


                var data1 = [
                    [0, 4], [1, 8], [2, 5], [3, 10], [4, 4], [5, 16], [6, 5], [7, 11], [8, 6], [9, 11], [10, 30], [11, 10], [12, 13], [13, 4], [14, 3], [15, 3], [16, 6]
                ];
                var data2 = [
                    [0, 1], [1, 0], [2, 2], [3, 0], [4, 1], [5, 3], [6, 1], [7, 5], [8, 2], [9, 3], [10, 2], [11, 1], [12, 0], [13, 2], [14, 8], [15, 0], [16, 0]
                ];
                $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                    data1, data2
                ],
                        {
                            series: {
                                lines: {
                                    show: false,
                                    fill: true
                                },
                                splines: {
                                    show: true,
                                    tension: 0.4,
                                    lineWidth: 1,
                                    fill: 0.4
                                },
                                points: {
                                    radius: 0,
                                    show: true
                                },
                                shadowSize: 2
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                tickColor: "#d5d5d5",
                                borderWidth: 1,
                                color: '#d5d5d5'
                            },
                            colors: ["#1ab394", "#464f88"],
                            xaxis: {
                            },
                            yaxis: {
                                ticks: 4
                            },
                            tooltip: false
                        }
                );

                var doughnutData = [
                    {
                        value: 300,
                        color: "#a3e1d4",
                        highlight: "#1ab394",
                        label: "App"
                    },
                    {
                        value: 50,
                        color: "#dedede",
                        highlight: "#1ab394",
                        label: "Software"
                    },
                    {
                        value: 100,
                        color: "#b5b8cf",
                        highlight: "#1ab394",
                        label: "Laptop"
                    }
                ];

                var doughnutOptions = {
                    segmentShowStroke: true,
                    segmentStrokeColor: "#fff",
                    segmentStrokeWidth: 2,
                    percentageInnerCutout: 45, // This is 0 for Pie charts
                    animationSteps: 100,
                    animationEasing: "easeOutBounce",
                    animateRotate: true,
                    animateScale: false,
                };

                var ctx = document.getElementById("doughnutChart").getContext("2d");
                var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

                var polarData = [
                    {
                        value: 300,
                        color: "#a3e1d4",
                        highlight: "#1ab394",
                        label: "App"
                    },
                    {
                        value: 140,
                        color: "#dedede",
                        highlight: "#1ab394",
                        label: "Software"
                    },
                    {
                        value: 200,
                        color: "#b5b8cf",
                        highlight: "#1ab394",
                        label: "Laptop"
                    }
                ];

                var polarOptions = {
                    scaleShowLabelBackdrop: true,
                    scaleBackdropColor: "rgba(255,255,255,0.75)",
                    scaleBeginAtZero: true,
                    scaleBackdropPaddingY: 1,
                    scaleBackdropPaddingX: 1,
                    scaleShowLine: true,
                    segmentShowStroke: true,
                    segmentStrokeColor: "#fff",
                    segmentStrokeWidth: 2,
                    animationSteps: 100,
                    animationEasing: "easeOutBounce",
                    animateRotate: true,
                    animateScale: false,
                };
                var ctx = document.getElementById("polarChart").getContext("2d");
                var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

            });
        </script>
    </body>
</html>
