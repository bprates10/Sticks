<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 03/06/2018
 * Time: 16:57
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

// Busca informação do combobox de empresa
$empresasController = new \Controllers\EmpresasController();
$empresas = $empresasController->buscaEmpresas();

// Busca informação dos e-mails
$usuariosController = new \Controllers\UsuarioController();
$usuarios = $usuariosController->listagem();

// Busca informação dos totalizadores de usuários
$usuariosTotal = $usuariosController->getUsuariosTotalizadores($usuariosController->listagem());

?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-auto">

            <!-- Div Navegadora ou Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Início</a>
                </li>
                <li class="breadcrumb-item active">Usuários</li>
            </ol>
            <!-- FIM Div Navegadora ou Breadcrumbs-->

            <!-- Ícones de Usuários -->
            <div class="row">

                <!-- Total de Usuários Ativos -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-10">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5"><?= $usuariosTotal["ativos"] ?> Usuário(s) Ativo(s)!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>

                <!-- Total de Usuários -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-10">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">Total de <?= $usuariosTotal["total"] ?> Usuários</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>

                <!-- Total de Clientes -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-10">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5"><?= $usuariosTotal["clientes"] ?> Clientes(s) Cadastrados(s)</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>

                <!-- Total de Colaboradores -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-10">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-support"></i>
                            </div>
                            <div class="mr-5"><?= $usuariosTotal["colaboradores"] ?> Suporte(s) Cadastrado(s)</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- FIM Icon Cards-->

            <!-- Header -->
            <div class="card-header">
                <div class="row">
                    <div class="header">
                        <h2> Configuração de Usuários</h2>
                    </div>
                </div>
            </div>
            <!-- FIM Header -->

            <!-- Campos de busca -->
            <div class="container-fluid">
                <div class="row">
                    <!-- ID Usuário -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="font-normal"> ID</label>
                            <input type="text" maxlength="5" id="id" class="form-control">
                        </div>
                    </div>
                    <!-- NOME Usuário -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> Nome do Usuário</label>
                            <input type="text" id="nome" cols="3" class="form-control"></input>
                        </div>
                    </div>
                    <!-- E-MAIL -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> E-mail do Usuário</label>
                            <select id="email" cols="2" class="form-control">
                                <option value="all" selected>Não Selecionado</option>
                                <?php foreach ($usuarios as $usuario) : ?>
                                    <option value="<?= $usuario->getEmail(); ?>"><?= $usuario->getEmail(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- EMPRESA -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-normal"> Empresa</label>
                            <select id="idEmpresa" cols="2" class="form-control">
                                <option value="all" selected>Todas</option>
                                <?php foreach ($empresas as $empresa) : ?>
                                    <option value="<?= $empresa->getId(); ?>"><?= $empresa->getId() . " - " . $empresa->getNomefantasia(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM Campos de busca -->

            <!-- Botões -->
            <div class="container-fluid">
                <div class="row" style="float: right">
                    <button type="button" class="btn btn-success btn-fill pull-right" style="margin-right: 15px" onclick="novo()";><i class="fa fa-plus-square"></i>Novo</button>
                    <button type="button" class="btn btn-secondary btn-fill pull-right" style="margin-right: 5px" onclick="pesquisar()";><i class="fa fa-search"></i>Pesquisar</button>
                </div>
            </div>
            <!-- FIM Botões -->

            <!-- Listagem Usuários -->
            <div id="listagem_usuarios"></div>
            <!-- FIM Listagem Usuários -->
        </div>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Início</a>
            </li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>
        <!-- Example DataTables Card-->
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="view/bootbox.min.js"></script>
<script>
    function pesquisar() {

        var id        = ($("#id").val()).trim();
        var nome      = ($("#nome").val()).trim();
        var email   = ($("#email").val()).trim();
        var idEmpresa = ($("#idEmpresa").val()).trim();

        var url = "view/usuarios/listagem_usuarios.php";

        $.ajax({
            "url": url,
            "type": 'POST',
            "data": {
                id : id,
                nome: nome,
                email: email,
                idEmpresa: idEmpresa
            }
        }).done(function (resp) {
            $("#listagem_usuarios").html(resp);
        }).fail(function (fail) {
            alert("fail");
        });
    }

    function novo() {

        alert("bootbox está em segundo plano");
        //bootbox.alert("Your message here…");
        /*bootbox.confirm({
            message: "Deseja cadastrar um novo usuário ?",
            buttons: {
                confirm: {
                    label: 'Sim',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Não',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                alert("OK");
                /*if (result) {
                    $.ajax({
                        "url": "../app/Controllers/UsuarioController.php",
                        "type": 'POST',
                        "data": {act: 'cadastrar_usuario'}
                    }).done(function (resp) {
                        alert(resp);
                        alert("Chamados inseridos com êxito");
                    }).fail(function (resp) {
                        alert(resp);
                        alert("Erro ao importar chamados. Contate o suporte.");
                    });
                }*/
          //  }
        //});
    }
</script>