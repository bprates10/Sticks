<?php

include_once "../../model/EmpresasModel.php";

$results = [];

$ativo = "checked";

$EmpresasModel = new EmpresasModel();
//$UsuariosController = new UsuarioController();

$empresas = $EmpresasModel->getCompany();
//$usuarios = $UsuariosController->getUsuario();

?>

<style>
    /* Customize the label (the container) */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
        position: absolute;
        opacity: 0;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>

<!-- Cadastro Novo Usuário -->
<div class="content">
    <div class="container-fluid">

        <!-- Div Esquerda -->
        <div class="col-md-8">
            <div class="card">

                <!-- Título -->
                <div class="header">
                    <h4 class="title">Novo Usuário</h4>
                </div>

                <!-- Início Card Chamados -->
                <div class="content">

                    <input type="hidden" id="acao" value="cadastrarUsuario">

                    <!-- Linha -->
                    <div class="row">

                        <!-- LOGIN -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" class="form-control" id="login" placeholder="Login" required>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" id="mail" placeholder="E-mail" required>
                            </div>
                        </div>

                        <!-- EMPRESA -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Origem</label>
                                <select id="empresa" class="form-control" required>
                                    <option value="all">Todas</option>
                                    <?php foreach ($empresas as $k=>$v) : ?>
                                        <option value="<?= $k; ?>"> <?= $v["ID"] . " - " . $v["NOMEFANTASIA"]; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- TELEFONE -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" id="fone" placeholder="(xx) x xxxx.xxxx">
                            </div>
                        </div>
                    </div>

                    <!-- Linha -->
                    <div class="row">

                        <!-- NOME -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome Completo</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome">
                            </div>
                        </div>

                        <!-- SENHA -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="password" class="form-control" id="pass" placeholder="Senha" required>
                            </div>
                        </div>

                        <!-- CONFIRMA SENHA -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Confirme</label>
                                <input type="password" class="form-control" id="repass" placeholder="Digite novamente" required>
                            </div>
                        </div>

                        <!-- ATIVO -->
                        <div class="col-md-2">
                            <label class="container">Ativo
                                <input type="checkbox" checked value="on">
                                <span class="checkmark" value="on"></span>
                            </label>

                            <label class="container">Inativo
                                <input type="checkbox" value="off">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>

                    <button type="button" class="btn btn-info btn-fill pull-right" onclick="createUser()">Criar Usuário</button>
                    <div class="clearfix"></div>
                </div>
                <!-- FIM Card Chamados -->

            </div>
        </div>
        <!-- FIM Div Esquerda -->

        <!--div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <!--img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/-->
                    <!--h2>Área de Upload</h2>
                </div>
                <div class="content">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="../../view/assets/img/faces/face-3.jpg" alt="..."/>

                            <h4 class="title">Mike Andrew<br />
                                <small>michael24</small>
                            </h4>
                        </a>
                    </div>
                    <p class="description text-center"> "Lamborghini Mercy <br>
                        Your chick she so thirsty <br>
                        I'm in that two seat Lambo"
                    </p>
                </div>
                <hr>
                <div class="text-center">
                    <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                    <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                    <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                </div>
            </div>
        </div-->

    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    function createUser() {

        arrNewUser = {
            action:  'cadastrar',
            login:   $("#login").val(),
            mail:    $("#mail").val(),
            empresa: $("#empresa").val(),
            fone:    $("#fone").val(),
            nome:    $("#nome").val(),
            pass:    $("#pass").val(),
            repass:  $("#repass").val()
        };

        //console.log(arrNewUser);
        var url = "controller/UsuarioController.php";

        $.ajax({
            "url":      url,
            "type":     'POST',
            "data":     arrNewUser,
            "dataType": 'html'
        }).done(function (resp) {
            alert("OK");
        }).fail(function (resp) {
            alert("FAIL");
        });
    }
</script>