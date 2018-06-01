<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 16/02/2018
 * Time: 15:59
 */

//include_once "../../model/EmpresasModel.php";

//$results = [];

//$EmpresasModel = new EmpresasModel();
//$UsuariosController = new UsuarioController();

//$empresas = $EmpresasModel->getCompany();
//$usuarios = $UsuariosController->getUsuario();

?>

<!-- Cadastro Nova Empresa -->
<div class="content">
    <div class="container-fluid">

        <!-- Div Esquerda -->
        <div class="col-md-8">
            <div class="card">

                <!-- Título -->
                <div class="header">
                    <h4 class="title">Nova Empresa</h4>
                </div>

                <!-- Início Card Cadastro Empresa -->
                <div class="content">

                    <input type="hidden" id="acao" value="cadastrarEmpresa">

                    <!-- Linha -->
                    <div class="row">

                        <!-- NOME FANTASIA -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome Fantasia</label>
                                <input type="text" class="form-control" id="nomefantasia" placeholder="Nome da Empresa" required="required">
                            </div>
                        </div>

                        <!-- RAZÃO SOCIAL -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Razão Social</label>
                                <input type="text" class="form-control" id="razaosocial" placeholder="Razão Social" required="required">
                            </div>
                        </div>

                    </div>

                    <!-- Linha -->
                    <div class="row">

                        <!-- CNPJ -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" placeholder="xx.xxx.xxx/xxxx-xx" required>
                            </div>
                        </div>

                        <!-- PAÍS -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>UF</label>
                                <input type="text" class="form-control" id="pais" placeholder="País">
                            </div>
                        </div>

                        <!-- ESTADO -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" id="uf" placeholder="Estado" required>
                            </div>
                        </div>

                        <!-- CIDADE -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" class="form-control" id="city" placeholder="Cidade" required>
                            </div>
                        </div>

                    </div>

                    <!-- Linha -->
                    <div class="row">
                        <!-- ATIVO -->
                        <div class="col-md-3">
                            <label class="container">Ativo
                                <input type="checkbox" checked value="on">
                                <span class="checkmark" value="on"></span>
                            </label>

                            <label class="container">Inativo
                                <input type="checkbox" value="off">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <!-- TELEFONE -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" id="fone" data-mask="(00) 0 0000.0000" placeholder="(xx) x xxxx.xxxx">
                            </div>
                        </div>

                        <!-- GLN/IE -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>GLN ou IE</label>
                                <input type="text" class="form-control" id="glnie" placeholder="GLN ou IE">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-info btn-fill pull-right" onclick="createCompany()">Criar Empresa</button>
                    <div class="clearfix"></div>
                </div>
                <!-- FIM Card Cadastro Empresas -->

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
    function createCompany() {

        arrNewUser = {
            action:         'cadastrar',
            nomefantasia:   $("#nomefantasia").val(),
            razaosocial:    $("#razaosocial").val(),
            cnpj:           $("#cnpj").val(),
            pais:           $("#pais").val(),
            uf:             $("#uf").val(),
            city:           $("#city").val(),
            fone:           $("#fone").val(),
            glnie:          $("#glnie").val()
        };

        var url = "../controller/EmpresasController.php";

        $.ajax({
            "url":      url,
            "type":     'POST',
            "data":     arrNewUser,
            "dataType": 'html'
        }).done(function (resp) {
            alert(resp);
        }).fail(function (resp) {
            alert(resp);
        });
    }
</script>