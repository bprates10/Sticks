<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 07/02/2018
 * Time: 23:20
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

// Busca informação do combobox de empresa
$empresasController = new \Controllers\EmpresasController();
$empresas = $empresasController->buscaEmpresas();
$countEmpresa = 0;
$countAtivas = 0;

foreach ($empresas as $emp)
{
    $countEmpresa++;
    if ($emp->getAtivo() == "S")
        $countAtivas++;
}

// Busca informação dos totalizadores de chamados por empresa
$chamadosController = new \Controllers\ChamadosController();
$chamadosTotal      = $chamadosController->getChamadosPorEmpresa();
//varzx($chamadosTotal);
$origem = "";
$contOrigem = 0;
$parceira = "";
$contParceira = 0;
foreach ($chamadosTotal as $k=>$v)
{
    if ($v['CONTORIGEM'] > $contOrigem) {
        $contOrigem = $v['CONTORIGEM'];
        $origem = $v['ORIGEM'];
    }
    if ($v['CONTPARCEIRA'] > $contParceira) {
        $contParceira = $v['CONTPARCEIRA'];
        $parceira = $v['PARCEIRA'];
    }
}
//varzx($origem, $contOrigem, $parceira, $contParceira);

?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Div Navegadora ou Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Início</a>
            </li>
            <li class="breadcrumb-item active">Empresas</li>
        </ol>
        <!-- FIM Div Navegadora ou Breadcrumbs-->

        <!-- Ícones de Empresas -->
        <div class="row">
            <!-- Total de Empresas Cadastradas -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5"><?= $countEmpresa; ?> Empresa(s) Cadastrada(s)</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>

            <!-- Total de Empresas Ativas -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5"><?= $countAtivas; ?> Empresa(s) Ativa(s)</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>

            <!-- Dados Empresa Que Mais Abriu Chamados -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5"><?= $contOrigem; ?> Chamado(s) De <?= $origem; ?></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>

            <!-- Dados Empresa Maior Parceira Chamados -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-support"></i>
                        </div>
                        <div class="mr-5"><?= $contParceira; ?> Chamado(s) para <?= $parceira; ?></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">*Chamados </span>
                        <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- FIM Icon Cards-->

        <!-- Title -->
        <div class="container-fluid">
            <div class="row">
                <div class="header">
                    <h2>Empresas</h2>
                </div>
            </div>
        </div>
        <!-- FIM Title -->

        <!-- Campos de Pesquisa -->
        <div class="container-fluid">
            <div class="row">
                <!-- ID EMPRESA -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="font-normal">ID</label>
                        <input type="text" cols="3" id="id" class="form-control">
                    </div>
                </div>
                <!-- NOME EMPRESA -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-normal">Empresa</label>
                        <input type="text" cols="3" id="name" class="form-control">
                    </div>
                </div>
                <!-- CNPJ -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="font-normal">CNPJ</label>
                        <input type="text" cols="3" id="cnpj" class="form-control" placeholder="00.000.000/0000-00">
                    </div>
                </div>
                <!-- ATIVO -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="font-normal">Empresas Ativas</label>
                        <select id="ativo" cols="2" class="form-control">
                            <option value="null" selected>Ambos</option>
                            <option value="S">Ativos</option>
                            <option value="N">Inativos</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM Campos de Pesquisa -->

        <!-- Botões -->
        <div class="container-fluid">
            <div class="row">
                <button type="button" class="btn btn-success btn-fill pull-right" style="margin-right: 15px" onclick="cadastrar();">
                    <i class="fa fa-plus-square"></i>Novo</button>
                <button type="button" class="btn btn-secondary btn-fill pull-right"  style="margin-right: 5px" onclick="findCompany();">
                    <i class="fa fa-search"></i>Pesquisar</button>
            </div>
        </div>
        <!-- FIM Botões -->

        <div class="container-fluid">
            <div class="row">
                <h4>Listagem</h4>
            </div>
        </div>

        <!-- Início Listagem Empresas -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- Div onde tudo acontece -->
                    <div id="listagem" class="card">

                    </div>
                    <!-- FIM Div onde tudo acontece -->

                </div>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    function findCompany() {
        arrCompany = {
            action: "findCompany",
            id:     $("#id").val(),
            name:   $("#name").val(),
            cnpj:   $("#cnpj").val(),
            active: $("#ativo").val()
        }

        var url = "empresas/lista_empresas.php";

        $.ajax({
            "url": url,
            "type": 'POST',
            "data": arrCompany,
            "dataType": "html"
        }).done(function (resp) {
            //console.log(typeof (resp));
            $("#listagem").html(resp);
        }).fail(function (fail) {
            alert("fail");
        });
    }

    function cadastrar() {

        arrCad = {
            action: "cadastrar"
        };

        var url = "empresas/cadastro_empresas.php";

        $.ajax({
            "url": url,
            "type": 'POST',
            "data": arrCad,
            "dataType": 'html'
        }).done(function (resp) {
            $("#listagem_maior").html(resp);
        }).fail(function (fail) {
            console.log(fail);
        });
    }
</script>