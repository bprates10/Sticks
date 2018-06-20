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

?>


<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-auto">
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
                    <!--button type="button" class="btn btn-success btn-fill pull-right" style="margin-right: 15px" onclick="newCall();">
                        <i class="fa fa-plus-square"></i>Novo</button-->
                    <button type="button" class="btn btn-secondary btn-fill pull-right"  style="margin-right: 5px" onclick="pesquisarUsuario();"><i class="fa fa-search"></i>Pesquisar</button>
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
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Configuração de Usuários</li>
        </ol>
        <!-- Example DataTables Card-->
    </div>
</div>

<script>
    function pesquisarUsuario() {

        var id        = ($("#id").val()).trim();
        var nome      = ($("#nome").val()).trim();
        var email   = ($("#email").val()).trim();
        var idEmpresa = ($("#idEmpresa").val()).trim();

        var url = "view/configs/listagem_usuarios.php";

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
</script>