<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 23/01/2018
 * Time: 23:12
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

// Busca informação dos chamados
$chamadosController = new \Controllers\ChamadosController();
$chamados = $chamadosController->getChamados($_POST);
$chamados_prioridades = $chamadosController->getPrioridadeChamados();
$chamados_status = $chamadosController->getStatusChamados();

$cor_linha_chamado = "";
$cor_coluna_prioridade = "";
$id_row = 0;
?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: small; font-family: Calibri">
            <thead>
            <tr>
                <th><i class="fa fa-bug"></i> ID</th>
                <th><i class="fa fa-barcode"></i> Título</th>
                <th><i class="fa fa-child"></i> Solicitante</th>
                <th><i class="fa fa-handshake-o"></i> Empresa</th>
                <th><i class="fa fa-handshake-o"></i> Empresa Parceira</th>
                <th><i class="fa fa-cogs"></i> Status</th>
                <th><i class="fa fa-warning"></i> Prioridade</th>
                <!--th><i class="fa fa-calendar"></i> Dt. Abertura</th-->
                <th><i class="fa fa-user-circle"></i> Atendente</th>
                <td><i class="fa fa-cog"></i></td>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th><i class="fa fa-bug"></i> ID</th>
                <th><i class="fa fa-barcode"></i> Título</th>
                <th><i class="fa fa-child"></i> Solicitante</th>
                <th><i class="fa fa-handshake-o"></i> Empresa</th>
                <th><i class="fa fa-handshake-o"></i> Empresa Parceira</th>
                <th><i class="fa fa-cogs"></i> Status</th>
                <th><i class="fa fa-warning"></i> Prioridade</th>
                <!--th><i class="fa fa-calendar"></i> Dt. Abertura</th-->
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
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getTitle(); ?></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdUser(); ?></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdCompany(); ?></td>
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdPartner(); ?></td>
                        <!-- Coluna original Status em texto -->
                        <td id="row_status_<?= $id_row; ?>" <?= $cor_linha_chamado ?>><?= $chamado->getIdStatus(); ?></td>
                        <!-- Coluna editável Status em seletor -->
                        <td id="select_status_<?= $id_row; ?>" style="display: none" <?= $cor_linha_chamado ?>><select>
                            <option selected><b><?= $chamado->getIdStatus(); ?></b></option>
                            <?php foreach ($chamados_status as $status) : ?>
                            <!-- Tratamento para que a descrição pré-selecionada não apareça novamente no combobox -->
                            <?php if ($status->getDescricao() != $chamado->getIdPriority()) : ?>
                            <option><?= $status->getDescricao(); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select></td>

                        <!-- Coluna original Prioridade em texto -->
                        <td id="row_priority_<?= $id_row; ?>" <?= $cor_linha_chamado . $cor_coluna_prioridade ?>><b><?= $chamado->getIdPriority(); ?></b></td>
                        <!-- Coluna editável Prioridade em seletor -->
                        <td id="select_priority_<?= $id_row; ?>" style="display: none" <?= $cor_linha_chamado ?>><select>
                            <option selected><b><?= $chamado->getIdPriority(); ?></b></option>
                            <?php foreach ($chamados_prioridades as $prioridade) : ?>
                            <!-- Tratamento para que a descrição pré-selecionada não apareça novamente no combobox -->
                            <?php if ($prioridade->getDescricao() != $chamado->getIdPriority()) : ?>
                            <option><?= $prioridade->getDescricao(); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select></td>
                        <!--td < //$cor_linha_chamado ?>></td-->
                        <td <?= $cor_linha_chamado ?>><?= $chamado->getIdSupport(); ?></td>
                        <td><i id="icon_edit_<?= $id_row; ?>"    class="fa fa-edit" onclick="editar_campos(<?= $id_row; ?>);">
                            <i id="icon_view_<?= $id_row; ?>"    class="fa fa-commenting-o" onclick="alert('Implementar histórico do chamado');">
                            <i id="icon_reopen_<?= $id_row; ?>"  class="fa fa-close" onclick="alert('Implementar reabertura de chamado');">
                            <i id="icon_close_<?= $id_row; ?>"   class="fa fa-check" onclick="alert('Implementar finalização de chamado');">
                            <i id="icon_confirm_<?= $id_row; ?>" style="display: none" class="fa fa-check-square-o" onclick="alert('Implementar confirmar edição');">
                            <i id="icon_cancel_<?= $id_row; ?>"  style="display: none" class="fa fa-times-circle" onclick="alert('Implementar cancelar edição');">
                        </td>
                    </tr>
                <?php $id_row++ ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

    function editar_campos(row) {
        /* Variáveis de acesso aos ícones */
        var icon_edit     = 'icon_edit_' + row;
        var icon_view     = 'icon_view_' + row;
        var icon_reopen   = 'icon_reopen_' + row;
        var icon_close    = 'icon_close_' + row;
        var icon_confirm  = 'icon_confirm_' + row;
        var icon_cancel   = 'icon_cancel_' + row;
        /* Variáveis de acesso - coluna Prioridade */
        var qpriority_original = '#row_priority_' + row;
        var priority_original = 'row_priority_' + row;
        var priority_seletor = 'select_priority_' + row;
        /* Variáveis de acesso - coluna Status */
        var qstatus_original = '#row_status_' + row;
        var status_original = 'row_status_' + row;
        var status_seletor = 'select_status_' + row;

        /* 1. Inativa os ícones de edit, view, reopen e close */
        /*document.getElementById(icon_edit).style.display = 'none';
        document.getElementById(icon_view).style.display = 'none';
        document.getElementById(icon_reopen).style.display = 'none';
        document.getElementById(icon_close).style.display = 'none';*/
        /* 2. Ativa os ícones de confirm e cancel */
        /*document.getElementById(icon_confirm).style.display = 'inline';
        document.getElementById(icon_cancel).style.display = 'inline';*/
        /* 3. Habilita o campo ou selector */
        if ( $(qpriority_original).is(':visible') ) {
            document.getElementById(priority_original).style.display = 'none';
            document.getElementById(priority_seletor).style.display = 'block';
        } else {
            document.getElementById(priority_original).style.display = 'block';
            document.getElementById(priority_seletor).style.display = 'none';
        }
        /*if ( $(qstatus_original).is(':visible') ) {
            document.getElementById(status_original).style.display = 'none';
            document.getElementById(status_seletor).style.display = 'block';
        } else {
            document.getElementById(status_original).style.display = 'block';
            document.getElementById(status_seletor).style.display = 'none';
        }*/
    }
</script>