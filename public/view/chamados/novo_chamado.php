<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 12/02/2018
 * Time: 19:54
 */

include_once "../../model/EmpresasModel.php";
include_once "../../model/UsuarioController.php";

$EmpresasModel = new EmpresasModel();
$UsuariosController = new UsuarioController();

$empresas = $EmpresasModel->getCompany();
$usuarios = $UsuariosController->getUsuario();

?>

<!-- Cadastro Novo Usuário -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <!-- Título -->
                <div class="header">
                    <h4 class="title">Novo Chamado</h4>
                </div>

                <!-- Início Card Chamados -->
                <div class="content">
                    <form>
                        <div class="row">

                            <!-- SOLICITANTE -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Solicitante</label>
                                    <input type="text" class="form-control" placeholder="Username" value="michael23">
                                </div>
                            </div>

                            <!-- EMAIL -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <!-- EMPRESA ORIGEM -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Company (disabled)</label>
                                    <input type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
                                </div>
                            </div>

                            <!-- EMPRESA DESTINO -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" value="michael23">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Company" value="Mike">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City" value="Mike">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="number" class="form-control" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <!-- FIM Card Chamados -->

            </div>
        </div>
    </div>
</div>
        <!-- FIM Div Card Usuário -->

<!--div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
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
</div>

</div>
</div>
</div>
