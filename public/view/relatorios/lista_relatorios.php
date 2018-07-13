<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 01/06/2018
 * Time: 22:47
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

use Controllers\ChamadosController;

$chamados = new \Controllers\ChamadosController();
$chamados->alimentaGraficos();

?>

<head>
    <script src="charts/RGraph/libraries/RGraph.common.core.js" ></script>
    <script src="charts/RGraph/libraries/RGraph.common.annotate.js" ></script>
    <script src="charts/RGraph/libraries/RGraph.common.context.js" ></script>
    <script src="charts/RGraph/libraries/RGraph.common.tooltips.js" ></script>
    <script src="charts/RGraph/libraries/RGraph.common.resizing.js" ></script>
    <script src="charts/RGraph/libraries/RGraph.bar.js" ></script>
</head>

<!-- Área do Gráfico-->
<div class="content-wrapper">
    <div class="container-fluid">

        <div style="width: 450px;">
            <canvas id="meuCanvasGraficoIdades" width="700" height="350">[No canvas support]</canvas>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-area-chart"></i>Título do Gráfico</div>

            <!-- Gráfico -->
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>

            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>
<!-- FIM Área do Gráfico-->

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="js/sb-admin-datatables.min.js"></script>
<script src="js/sb-admin-charts.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    window.onload = function ()
    {
        var meuGraficoIdades = new RGraph.Bar('meuCanvasGraficoIdades', dadosIdades);
        meuGraficoIdades.Set('chart.background.barcolor1', 'white');
        meuGraficoIdades.Set('chart.background.barcolor2', 'white');
        meuGraficoIdades.Set('chart.title', 'Exemplo Idades - www.vilourenco.com.br');
        meuGraficoIdades.Set('chart.title.vpos', 0.6);
        meuGraficoIdades.Set('chart.labels', ['@vilourenco', '@monteirobrena', '@g0nc1n', '@webgenes', '@andredmolin']);
        meuGraficoIdades.Set('chart.tooltips', ['@vilourenco tem ' + idadevilourenco + ' anos', '@monteirobrena tem ' + idadembrena + ' anos', '@g0nc1n tem ' + idadefausto + ' anos', '@webgenes tem ' + idadegenes + ' anos', '@andredmolin tem ' + idadeandre + ' anos']);
        meuGraficoIdades.Set('chart.text.angle', 45);
        meuGraficoIdades.Set('chart.gutter', 35);
        meuGraficoIdades.Set('chart.shadow', true);
        meuGraficoIdades.Set('chart.shadow.blur', 5);
        meuGraficoIdades.Set('chart.shadow.color', '#aaa');
        meuGraficoIdades.Set('chart.shadow.offsety', -3);
        meuGraficoIdades.Set('chart.colors', ['#00CED1']);
        meuGraficoIdades.Set('chart.key.position', 'gutter');
        meuGraficoIdades.Set('chart.text.size', 10);
        meuGraficoIdades.Set('chart.text.font', 'Georgia');
        meuGraficoIdades.Set('chart.text.angle', 0);
        meuGraficoIdades.Set('chart.grouping', 'stacked');
        meuGraficoIdades.Set('chart.strokecolor', 'rgba(0,0,0,0)');
        meuGraficoIdades.Draw();
    }
</script>