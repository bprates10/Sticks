<?php

include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

use \Controllers\ValidaLoginController;

$controller = new Controllers\HomeController();
?>

<!doctype html>
<html lang="pt">
<head>
	<meta charset="utf-8" />
    <link rel="icon" sizes="192x192" href="img/icons/favicon_mask_morte.jpg" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Ticsy - Home</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="view/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="view/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="view/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="view/assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="view/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <!-- Início Barra Lateral de Navegação -->
    <div class="sidebar" data-color="redblue" data-image="../view/assets/img/sidebar-4.jpg">
        <!--Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag -->
        
        <div class="sidebar-wrapper">
            <!-- TITULO -->
            <div class="logo">
                <a href="#" class="simple-text">
                    Ticket System
                </a>
            </div>

            <!-- NAVEGAÇÃO -->
            <ul class="nav">
                
                <li>
                    <a href="#" onclick="findPage('chamados');">
                        <i class="pe-7s-note2"></i>
                        <p>Chamados</p>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="findPage('usuario');">
                        <i class="pe-7s-user"></i>
                        <p>Perfil do Usuário</p>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="findPage('empresas');">
                        <i class="pe-7s-users"></i>
                        <p>Config. de Empresas</p>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="findPage('config');">
                        <i class="pe-7s-mail-open-file"></i>
                        <p>Config. de E-mail</p>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="findPage('dashboard');">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!--li>
                    <a href="view/icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Ícones</p>
                    </a>
                </li>
                <li>
                    <a href="view/maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Mapas</p>
                    </a>
                </li>
                <li>
                    <a href="view/notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notificações</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="view/upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade para PRO</p>
                    </a>
                </li-->
            </ul>
        </div>
    </div>
    <!-- FIM Barra Lateral de Navegação -->

    <!-- DIV Principal -->
    <div class="main-panel">

        <!-- Barra superior de navegação -->
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">

                <!-- Título Principal -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Ferramenta de Chamados</a>
                </div>
                <!-- FIM Título Principal -->

                <div class="collapse navbar-collapse">
                    <!-- Inicio Ícones Barra Superior -->
                    <ul class="nav navbar-nav navbar-left">
                        <!-- Dashboard icon -->
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!--i class="fa fa-dashboard"></i-->
                                <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <!-- Global icon -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe"></i>
                                <b class="caret hidden-lg hidden-md"></b>
                                <p class="hidden-lg hidden-md">
                                    5 Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>
                        <!-- Search icon -->
                        <li>
                            <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>
                    <!-- FIM Ícones Barra Superior -->

                    <!-- Menus Barra Superior -->
                    <ul class="nav navbar-nav navbar-right">

                        <!-- Submenu -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p> Submenu <b class="caret"></b></p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <!-- FIM Submenu -->

                        <!-- Logout -->
                        <li>
                            <a href="index.php">
                            <i class="fa fa-bars" aria-hidden="true" style="margin-right: 30px;" ><p>Logout</p></i>
                        </a></li>
                        <!-- FIM Logout -->

                        <li class="separator hidden-lg"></li>
                    </ul>
                    <!-- FIM Menus Barra Superior -->
                </div>
            </div>
        </nav>
        <!-- FIM Barra superior de navegação -->

        <!-- DIV onde tudo acontece -->
        <div class="content" id="div_principal">

        </div>
        <!-- FIM DIV onde tudo acontece -->

        <!-- Início FOOTER -->
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="home.php">
                                Home/Login
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Empresa
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Projetos
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.google.com">Ticket Systeme</a>, suporte a você e seus clientes
                </p>
            </div>
        </footer>
        <!-- FIM FOOTER -->

    </div>
    <!-- FIM Div Principal -->
</div>

</body>
</html>

<!--   Core JS Files   -->
<script src="view/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="view/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="view/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="view/assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<!--script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="view/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="view/assets/js/demo.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">

    //Alerta de boas vindas
    /*$(document).ready(function(){

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-headphones',
            message: "Bem vindo à <b>Ticsy</b>, sua Ferramenta de Chamados Ticket System !"

        },{
            type: 'info',
            timer: 100
        });

    });*/

    function findPage(acao) {

        $('#div_principal').innerHTML = "";
        var url = "";

        if (acao == 'chamados')
            url = "view/chamados/listagem_chamados.php";
        if (acao == 'usuario')
            url = "/ferramentachamados/view/usuarios/listagem_usuarios.php";
        if (acao == 'empresas')
            url = "/ferramentachamados/view/empresas/listagem_empresas.php";
        if (acao == 'config')
            url = "/ferramentachamados/view/configuracoes/listagem_configs.php";
        if (acao == 'dashboard')
            url = "/ferramentachamados/view/dashboard.php";

        window.history.pushState("teste", "titulo", url);
        //window.history.pushState("obj or string", "title", "/" . url);
        $('#div_principal').load(url);



        /*$.ajax({
            "url"  : "../app/Controllers/HomeController.php",
            "type" : 'POST',
            "data" : {'act' : 'redireciona_url', 'url' : param}
        }).done(function (resp) {
            window.history.pushState("object or string", "Title", "/new-url");
            //console.log(resp);
        }).fail(function (resp) {
            alert("fail");
        });*/
    }

</script>
