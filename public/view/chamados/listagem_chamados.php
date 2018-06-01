<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 23/01/2018
 * Time: 23:12
 */

var_dump($_GET);
$empresasModel = new \Models\Empresas();
$empresas = $empresasModel->getCompany();
//Lista as empresas do banco de dados a serem exibidas no combobox ORIGEM
$empresas = $empresasModel->getCompany();

?>


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: small; font-family: Calibri">
            <thead>
            <tr>
                <th><i class="fa fa-bug"></i> ID</th>
                <th><i class="fa fa-child"></i> Solicitante</th>
                <th><i class="fa fa-handshake-o"></i> Empresa</th>
                <th><i class="fa fa-barcode"></i> Título</th>
                <th><i class="fa fa-cogs"></i> Status</th>
                <th><i class="fa fa-warning"></i> Prioridade</th>
                <th><i class="fa fa-calendar"></i> Dt. Abertura</th>
                <th><i class="fa fa-user-circle"></i> Atendente</th>
                <td><i class="fa fa-cog"></i></td>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th><i class="fa fa-bug"></i> ID</th>
                <th><i class="fa fa-child"></i> Solicitante</th>
                <th><i class="fa fa-handshake-o"></i> Empresa</th>
                <th><i class="fa fa-barcode"></i> Título</th>
                <th><i class="fa fa-cogs"></i> Status</th>
                <th><i class="fa fa-warning"></i> Prioridade</th>
                <th><i class="fa fa-calendar"></i> Dt. Abertura</th>
                <th><i class="fa fa-user-circle"></i> Atendente</th>
                <td><i class="fa fa-cog"></i></td>
            </tr>
            </tfoot>
            <tbody>
            <?php if (!empty($chamados)) : ?>
                <?php foreach ($chamados as $chamado) : ?>
                    <tr>
                        <!-- Tratamento das cores -->
                        <?php
                        //varz($chamado);
                        if ($chamado->getIdStatus() == "Resolvido")
                            $cor_linha_chamado = "style='background-color: #32CD32'";
                        elseif ($chamado->getIdStatus() == "Stand By")
                            $cor_linha_chamado = "style='background-color: #D3D3D3'";
                        else {
                            $cor_linha_chamado = "";
                            if ($chamado->getIdPriority() == "Baixa")
                                $cor_coluna_prioridade = "style='color: #8FBC8F'";
                            else if ($chamado->getIdPriority() == "Média")
                                $cor_coluna_prioridade = "style='color: #FFD700'";
                            else if ($chamado->getIdPriority() == "Alta")
                                $cor_coluna_prioridade = "style='color: #FF6347'";
                            else if ($chamado->getIdPriority() == "Urgente")
                                $cor_coluna_prioridade = "style='color: #FF0000'";
                            else
                                $cor_coluna_prioridade = "";
                        } ?>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getId(); ?></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdSupport(); ?></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdCompany(); ?></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getTitle(); ?></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdStatus(); ?></td>
                        <td <?= $cor_linha_chamado . $cor_coluna_prioridade ?>><b><?= $chamado->getIdPriority(); ?></b></td>
                        <td <?= $cor_linha_chamado ?>></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdUser(); ?></td>
                        <td><i class="fa fa-edit" onclick="alert('Implementar edição');">
                                <i class="fa fa-commenting-o" onclick="alert('Implementar histórico do chamado');">
                                    <i class="fa fa-close" onclick="alert('Implementar reabertura de chamado');">
                                        <i class="fa fa-check" onclick="alert('Implementar finalização de chamado');"></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

</script>