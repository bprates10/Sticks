<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 09/07/2018
 * Time: 16:35
 */

?>

<!-- Início Div Esquerda/Cima-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <!-- Título -->
    <a class="navbar-brand" href="index.html">Stick's Suporte</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navegadores -->
    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- List Navegador Lateral-->
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <!-- Menu Início -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Início">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-fw fa-address-card"></i>
                    <!--span class="nav-link-text" onclick="buscaPagina('inicio');">Início</span>   <a href="?pagina=orcamentos">Orçamentos</a-->
                    <span>Início</span>
                </a>
            </li>

            <!-- Menu Chamados -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Chamados">
                <a class="nav-link" href="?pagina=view/chamados/lista_chamados.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <!--span class="nav-link-text" onclick="buscaPagina('chamados');">Chamados</span-->
                    <span>Chamados</span>
                </a>
            </li>

            <!-- Menu Relatórios/Gráficos -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Relatórios">
                <a class="nav-link" href="?pagina=view/relatorios/lista_relatorios.php">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <!--span class="nav-link-text" onclick="buscaPagina('relatorios')">Relatórios</span-->
                    <span>Relatórios</span>
                </a>
            </li>

            <!-- Menu de Configuração de Usuários -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuários">
                <a class="nav-link" href="?pagina=view/usuarios/lista_usuarios.php">
                    <i class="fa fa-fw fa-table"></i>
                    <!--span class="nav-link-text" onclick="buscaPagina('configUsers')">Configuração de Usuários</span-->
                    <span>Usuários</span>
                </a>
            </li>

            <!-- Menu de Configuração de Empresas -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empresas">
                <a class="nav-link" href="?pagina=view/empresas/listagem_empresas.php">
                    <i class="fa fa-fw fa-table"></i>
                    <!--span class="nav-link-text" onclick="buscaPagina('configUsers')">Configuração de Usuários</span-->
                    <span>Empresas</span>
                </a>
            </li>

            <!-- Abaixo estão listados os demais navegadores do NavBar -->
            <!-- Outros navegadores >
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-wrench"></i>
                <span class="nav-link-text">Components</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseComponents">
                <li>
                  <a href="navbar.html">Navbar</a>
                </li>
                <li>
                  <a href="cards.html">Cards</a>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-file"></i>
                <span class="nav-link-text">Example Pages</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                <li>
                  <a href="login.html">Login Page</a>
                </li>
                <li>
                  <a href="register.html">Registration Page</a>
                </li>
                <li>
                  <a href="forgot-password.html">Forgot Password Page</a>
                </li>
                <li>
                  <a href="blank.html">Blank Page</a>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-sitemap"></i>
                <span class="nav-link-text">Menu Levels</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseMulti">
                <li>
                  <a href="#">Second Level Item</a>
                </li>
                <li>
                  <a href="#">Second Level Item</a>
                </li>
                <li>
                  <a href="#">Second Level Item</a>
                </li>
                <li>
                  <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
                  <ul class="sidenav-third-level collapse" id="collapseMulti2">
                    <li>
                      <a href="#">Third Level Item</a>
                    </li>
                    <li>
                      <a href="#">Third Level Item</a>
                    </li>
                    <li>
                      <a href="#">Third Level Item</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
              <a class="nav-link" href="#">
                <i class="fa fa-fw fa-link"></i>
                <span class="nav-link-text">Link</span>
              </a>
            </li>
            <!-- FIM Outros navegadores -->
        </ul>
        <!-- FIM List Navegador Lateral -->

        <!-- Icone inferior NavBar -->
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <!-- FIM Icone inferior NavBar -->

        <!-- List Navegador Superior -->
        <ul class="navbar-nav ml-auto">

            <!-- Icon Mensages - Ícone de Mensagem no canto superior esquerdo -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="d-lg-none">Messages
                      <span class="badge badge-pill badge-primary">12 New</span>
                    </span>
                    <span class="indicator text-primary d-none d-lg-block">
                      <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">New Messages:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>David Miller</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>Jane Smith</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>John Doe</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all messages</a>
                </div>
            </li>

            <!-- Icon Alerts - Ícone de Alertas no canto superior esquerdo -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
                      <span class="badge badge-pill badge-warning">6 New</span>
                    </span>
                    <span class="indicator text-warning d-none d-lg-block">
                      <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">New Alerts:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <span class="text-success">
                        <strong>
                          <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                      </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <span class="text-danger">
                        <strong>
                          <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                      </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <span class="text-success">
                        <strong>
                          <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                      </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a>
                </div>
            </li>

            <!-- Text Search - Campo de busca no canto superior esquerdo -->
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for...">
                        <span class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                </form>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
        <!-- FIM List Navegador Superior -->

    </div>
    <!-- FIM Navegadores -->
</nav>
