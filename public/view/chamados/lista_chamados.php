<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 10/02/2018
 * Time: 21:34
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

// Busca informação do combobox de empresa
$empresasController = new \Controllers\EmpresasController();
$empresas = $empresasController->buscaEmpresas();

// Busca informação do combobox de status
$chamadosController = new \Controllers\ChamadosController();
$chamadosStatus     = $chamadosController->getStatusChamados();

// Busca informação dos totalizadores de chamados
$chamadosTotal      = $chamadosController->getChamadosFiltrados($chamadosController->getChamados());

// Busca informações do combobox de prioridades
$chamadosPrioridadeController = new \Controllers\ChamadosController();
$chamadosPrioridades = $chamadosPrioridadeController->getPrioridadeChamados();

// Busca informação dos e-mails
$usuariosController = new \Controllers\UsuarioController();
$atendentes = $usuariosController->listagem();
$lastUpdate = "";

?>
<!--link rel="stylesheet" type="text/css" href="mystyle.css"-->

<!-- Início Card Chamados -->
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Div Navegadora ou Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Início</a>
          </li>
          <li class="breadcrumb-item active">Chamados</li>
        </ol>
        <!-- FIM Div Navegadora ou Breadcrumbs-->

        <!-- Ícones de Chamados -->
        <div class="row">

            <!-- Total de Chamados Urgentes -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5"><?= $chamadosTotal["urgente"] ?> Chamado(s) Urgente(s)!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>

            <!-- Total de Chamados -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">Total de <?= $chamadosTotal["total"] ?> Chamados</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>

            <!-- Total de Chamados Abertos -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5"><?= $chamadosTotal["abertos"] ?> Chamado(s) Aberto(s)</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>

            <!-- Total de Chamados Fechados -->
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-10">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-support"></i>
                        </div>
                        <div class="mr-5"><?= $chamadosTotal["fechados"] ?> Chamado(s) Fechados(s)</div>
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

        <div class="row">
            <div class="col-lg-8">

                <!-- Bar Chart Card Div de Valores -->
                <!--div-- class="card mb-3">
                  <div class="card-header">
                    <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-8 my-auto">
                        <canvas id="myBarChart" width="100" height="50"></canvas>
                      </div>
                      <div class="col-sm-4 text-center my-auto">
                        <div class="h4 mb-0 text-primary">$34,693</div>
                        <div class="small text-muted">YTD Revenue</div>
                        <hr>
                        <div class="h4 mb-0 text-warning">$18,474</div>
                        <div class="small text-muted">YTD Expenses</div>
                        <hr>
                        <div class="h4 mb-0 text-success">$16,219</div>
                        <div class="small text-muted">YTD Margin</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div--!>
                <!-- FIM Bar Chart Card Div de Valores -->

                <!-- Título Social Feeds-->
                <!--div class="mb-0 mt-4">
                  <i class="fa fa-newspaper-o"></i>Novos Feeds</div-->
                <!-- FIM Título -->

                <!-- Conteúdo Social Feeds-->
                <!--hr class="mt-2">
                <div class="card-columns">
                  <!-- Examplos Social Cards-->
                <!--div class="card mb-3">
                  <a href="#">
                    <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=610" alt="">
                  </a>
                  <div class="card-body">
                    <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                    <p class="card-text small">These waves are looking pretty good today!
                      <a href="#">#surfsup</a>
                    </p>
                  </div>
                  <hr class="my-0">
                  <div class="card-body py-2 small">
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-comment"></i>Comment</a>
                    <a class="d-inline-block" href="#">
                      <i class="fa fa-fw fa-share"></i>Share</a>
                  </div>
                  <hr class="my-0">
                  <div class="card-body small bg-faded">
                    <div class="media">
                      <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>Very nice! I wish I was there! That looks amazing!
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                        <div class="media mt-3">
                          <a class="d-flex pr-3" href="#">
                            <img src="http://placehold.it/45x45" alt="">
                          </a>
                          <div class="media-body">
                            <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>Next time for sure!
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item">
                                <a href="#">Like</a>
                              </li>
                              <li class="list-inline-item">·</li>
                              <li class="list-inline-item">
                                <a href="#">Reply</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Posted 32 mins ago</div>
                </div>
              </div-->
                <!-- FIM Sofial Feeds-->

                <!-- Examplos Social Card-->
                <!--div class="card mb-3">
                  <a href="#">
                    <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180" alt="">
                  </a>
                  <div class="card-body">
                    <h6 class="card-title mb-1"><a href="#">John Smith</a></h6>
                    <p class="card-text small">Another day at the office...
                      <a href="#">#workinghardorhardlyworking</a>
                    </p>
                  </div>
                  <hr class="my-0">
                  <div class="card-body py-2 small">
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-comment"></i>Comment</a>
                    <a class="d-inline-block" href="#">
                      <i class="fa fa-fw fa-share"></i>Share</a>
                  </div>
                  <hr class="my-0">
                  <div class="card-body small bg-faded">
                    <div class="media">
                      <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">Jessy Lucas</a></h6>Where did you get that camera?! I want one!
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Posted 46 mins ago</div>
                </div-->
                <!-- FIM Exemplos Social Cards-->

                <!-- Outro Examplo Social Card-->
                <!--div class="card mb-3">
                  <a href="#">
                    <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281" alt="">
                  </a>
                  <div class="card-body">
                    <h6 class="card-title mb-1"><a href="#">Jeffery Wellings</a></h6>
                    <p class="card-text small">Nice shot from the skate park!
                      <a href="#">#kickflip</a>
                      <a href="#">#holdmybeer</a>
                      <a href="#">#igotthis</a>
                    </p>
                  </div>
                  <hr class="my-0">
                  <div class="card-body py-2 small">
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-comment"></i>Comment</a>
                    <a class="d-inline-block" href="#">
                      <i class="fa fa-fw fa-share"></i>Share</a>
                  </div>
                  <div class="card-footer small text-muted">Posted 1 hr ago</div>
                </div-->
                <!-- FIM Outro Examplo Social Card-->

                <!-- Example Social Card-->
                <!--div class="card mb-3">
                  <a href="#">
                    <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
                  </a>
                  <div class="card-body">
                    <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                    <p class="card-text small">It's hot, and I might be lost...
                      <a href="#">#desert</a>
                      <a href="#">#water</a>
                      <a href="#">#anyonehavesomewater</a>
                      <a href="#">#noreally</a>
                      <a href="#">#thirsty</a>
                      <a href="#">#dehydration</a>
                    </p>
                  </div>
                  <hr class="my-0">
                  <div class="card-body py-2 small">
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                    <a class="mr-3 d-inline-block" href="#">
                      <i class="fa fa-fw fa-comment"></i>Comment</a>
                    <a class="d-inline-block" href="#">
                      <i class="fa fa-fw fa-share"></i>Share</a>
                  </div>
                  <hr class="my-0">
                  <div class="card-body small bg-faded">
                    <div class="media">
                      <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>The oasis is a mile that way, or is that just a mirage?
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                        <div class="media mt-3">
                          <a class="d-flex pr-3" href="#">
                            <img src="http://placehold.it/45x45" alt="">
                          </a>
                          <div class="media-body">
                            <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>
                            <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789" alt="">I'm saved, I found a cactus. How do I open this thing?
                            <ul class="list-inline mb-0">
                              <li class="list-inline-item">
                                <a href="#">Like</a>
                              </li>
                              <li class="list-inline-item">·</li>
                              <li class="list-inline-item">
                                <a href="#">Reply</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Posted yesterday</div>
                </div>
                <!-- Example Social Card-->


                <!-- /Card Columns-->
            </div>
        </div>

        <!-- Datatable de Chamados-->
        <div class="card mb-auto">
            <!-- Header -->
            <div class="card-header">
                <div class="row">
                    <div class="header">
                        <h2> Chamados</h2>
                    </div>
                </div>
            </div>
            <!-- FIM Header -->

            <!-- Campos de busca -->
            <div class="container-fluid">
                <div class="row">
                    <!-- ID Chamado (Nro) -->
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="font-normal"> Chamado</label>
                            <input type="text" maxlength="5" id="nro" class="form-control">
                        </div>
                    </div>
                    <!-- SOLICITANTE -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> Solicitante</label>
                            <select id="idSolicitante" cols="2" class="form-control">
                                <option value="all" selected>Todos</option>
                                <?php foreach ($atendentes as $atendente) : ?>
                                    <?php $aux = ""; ($atendente->getIdEmpresa() == 1) ? $aux = " (atendente) " : ""; ?>
                                        <option value="<?= $atendente->getId(); ?>">
                                            <?= $atendente->getId() . " - " . $aux . $atendente->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- E-mail >
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> E-mail Solicitante</label>
                            <select id="mail" cols="2" class="form-control">
                                <option value="all" selected>Não Selecionado</option>
                                <?php foreach ($usuariosEmails as $email) : ?>
                                    <option value="<?= $email->getEmail(); ?>"><?= $email->getEmail(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- DATA >
                    <div class="fa-calendar-times-o">
                        <div class="form-group">
                            <label class="font-normal">Data</label>
                            <input type="date" id="data">
                        </div>
                    </div>
                </div-->
                    <!-- EMPRESA Origem do chamado -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-normal"> Empresa Origem</label>
                            <select id="origem" cols="2" class="form-control">
                                <option value="all" selected>Todas</option>
                                <?php foreach ($empresas as $empresa) : ?>
                                    <option value="<?= $empresa->getId(); ?>"><?= $empresa->getId() . " - " . $empresa->getNomefantasia(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- EMPRESA Parceira -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="font-normal"> Empresa Parceira</label>
                            <select id="destino" cols="2" class="form-control">
                                <option value="all" selected>Todas</option>
                                <?php foreach ($empresas as $empresa) : ?>
                                    <option value="<?= $empresa->getId(); ?>"><?= $empresa->getId() . " - " . $empresa->getNomefantasia(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- STATUS -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> Status</label>
                            <select id="status" cols="2" class="form-control">
                                <option value="all" selected>Ambos</option>
                                <?php foreach ($chamadosStatus as $status) : ?>
                                    <option value="<?= $status->getId(); ?>"><?= $status->getId() . " - " . $status->getDescricao(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- PRIORIDADE -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> Prioridade</label>
                            <select id="prioridade" cols="2" class="form-control">
                                <option value="all" selected>Todos</option>
                                <?php foreach ($chamadosPrioridades as $prioridade) : ?>
                                    <option value="<?= $prioridade->getId(); ?>"><?= $prioridade->getId() . " - " . $prioridade->getDescricao(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- ATENDENTE -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> Atendente</label>
                            <select id="idAtendente" cols="3" class="form-control">
                                <option value="all" selected>Todos</option>
                                <?php foreach ($atendentes as $atendente) : ?>
                                    <?php if ($atendente->getIdEmpresa() == 1) : ; ?>
                                    <option value="<?= $atendente->getId(); ?>"><?= $atendente->getId() . " - " . $atendente->getNome(); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- ASSUNTO -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-normal"> Assunto</label>
                            <input type="text" id="titulo" class="form-control">
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
                    <button type="button" class="btn btn-secondary btn-fill pull-right"  style="margin-right: 5px" onclick="pesquisarChamado();">
                        <i class="fa    fa-search"></i>Pesquisar</button>
                    <button type="button" class="btn btn-danger btn-fill pull-right"  style="margin-right: 5px" onclick="importarChamados();">
                        <i class="fa fa-search"></i>Importar</button>
                </div>
            </div>
            <!-- FIM Botões -->

            <!--i class="fa fa-refresh" onclick="lerEmail();"></i> Atualização de Chamados <i class="fa fa-refresh" onclick="lerEmail();"></i-->

            <!-- Conteúdo Chamados -->
            <div id="listagem_chamados"></div>
            <!-- FIM Conteúdo Chamados -->

            <!--div class="card-footer small text-muted">Atualizado em: < $lastUpdate->format('d-m-Y H:i:s'); ?></div-->
        </div>
        <!-- FIM Datatable de Chamados-->
        <!--div class="loader" id="load""></div-->

    </div>
</div>
<!-- FIM Card Chamados -->

<?= include "../footer.php"; ?>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<!-- MOVIDO LISTA_RELATORIOS.PHP script src="vendor/chart.js/Chart.min.js"></script-->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="js/sb-admin-datatables.min.js"></script>
<script src="js/bootbox.min.js"></script>
<!-- MOVIDO LISTA_RELATORIOS.PHP script src="js/sb-admin-charts.min.js"></script-->
<script>
    function pesquisarChamado() {

        //document.getElementById('#load').style.display = 'block';
        //document.getElementById('#load').style.display = 'none';

        var id            = ($("#nro").val()).trim();
        var idSolicitante = ($("#idSolicitante").val()).trim();
        //var email      = ($("#mail").val()).trim();
        var origem        = ($("#origem").val()).trim();
        var destino       = ($("#destino").val()).trim();
        var status        = ($("#status").val()).trim();
        var prioridade    = ($("#prioridade").val()).trim();
        var idAtendente   = ($("#idAtendente").val()).trim();
        var titulo        = ($("#titulo").val()).trim();

        var url = "view/chamados/listagem_chamados.php";

        $.ajax({
            "url": url,
            "type": 'POST',
            "data": {
                id : id,
                idSolicitante: idSolicitante,
                //email: email,
                origem: origem,
                destino: destino,
                status: status,
                prioridade: prioridade,
                idAtendente: idAtendente,
                titulo: titulo
            }
        }).done(function (resp) {
            $("#listagem_chamados").html(resp);
        }).fail(function (fail) {
            alert("fail");
        });
    }

    function importarChamados() {

        bootbox.confirm({
            message: "Deseja forçar a leitura de novos chamados ?",
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
                if (result) {
                    $.ajax({
                        "url": "../app/Controllers/ChamadosController.php",
                        "type": 'POST',
                        "data": {act: 'importar_chamados'}
                    }).done(function (resp) {
                        alert(resp);
                        alert("Chamados inseridos com êxito");
                    }).fail(function (resp) {
                        alert("Erro ao importar chamados. Contate o suporte.");
                    });
                }
            }
        });
    }
</script>