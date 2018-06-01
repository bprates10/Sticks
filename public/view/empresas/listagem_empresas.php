<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 07/02/2018
 * Time: 23:20
 */

//include_once "../controller/EmpresaController.php";

//$Controllers = new EmpresaController();
//varzx($Controllers);

?>

<div class="content-fluid" id="listagem_maior">
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