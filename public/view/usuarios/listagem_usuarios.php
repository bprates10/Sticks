<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 24/01/2018
 * Time: 12:54
 */

include_once "../../model/UsuarioController.php";

$Controller = new UsuarioController();

?>

<div class="content-fluid" id="listagem_maior">
    <!-- Title -->
    <div class="container-fluid">
        <div class="row">
            <div class="header">
                <h2>Usuários</h2>
            </div>
        </div>
    </div>
    <!-- FIM Title -->

    <!-- Campos de Pesquisa -->
    <div class="container-fluid">
        <div class="row">
            <!-- NOME -->
            <div class="col-md-3">
                <div class="form-group">
                    <label class="font-normal">Nome do Usuário</label>
                    <input type="text" cols="3" id="name" class="form-control">
                </div>
            </div>
            <!-- EMAIL -->
            <div class="col-md-3">
                <div class="form-group">
                    <label class="font-normal">E-mail</label>
                    <input type="text" cols="3" id="mail" class="form-control">
                </div>
            </div>
            <!-- LOGIN -->
            <div class="col-md-3">
                <div class="form-group">
                    <label class="font-normal">Login</label>
                    <input type="text" cols="3" id="login" class="form-control">
                </div>
            </div>
            <!-- ATIVO -->
            <div class="col-md-3">
                <div class="form-group">
                    <label class="font-normal">Usuários Ativos</label>
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
            <button type="button" class="btn btn-secondary btn-fill pull-right"  style="margin-right: 5px" onclick="findUser();">
                <i class="fa fa-search"></i>Pesquisar</button>
        </div>
    </div>
    <!-- FIM Botões -->

    <div class="container-fluid">
        <div class="row">
            <h4></h4>
        </div>
    </div>

    <!-- Início Listagem Usuários -->
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
    function findUser() {

        arrUsr = {
            action: "findUser",
            name:   $("#name").val(),
            mail:   $("#mail").val(),
            login:  $("#login").val(),
            active: $("#ativo").val()
        };

        $_POST = arrUsr;

        var url = "usuarios/lista_usuarios.php";
        
        $.ajax({
            "url": url,
            "type": 'POST',
            "data": arrUsr,
            "dataType": "html"
        }).done(function (resp) {
            $("#listagem").html(resp);
        }).fail(function (fail) {
            alert("fail");
        });
    }

    function cadastrar() {

        arrCad = {
            action: "cadastrar"
        };

        var url = "usuarios/cadastro_usuarios.php";

        $.ajax({
            "url": url,
            "type": 'POST',
            "data": arrCad,
            "dataType": 'html'
        }).done(function (resp) {
            console.log(typeof (resp));
            $("#listagem_maior").html(resp);
        }).fail(function (fail) {
            alert ("fail");
        });
    }
</script>