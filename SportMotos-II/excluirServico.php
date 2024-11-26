<?php
include_once("class/servicos.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $servico = new servicos();

    if ($servico->excluirServico($id)) {
        echo "<script>alert('Serviço excluído com sucesso!'); window.location.href='relatorioServicos.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir o serviço!'); window.location.href='relatorioServicos.php';</script>";
    }
} else {
    echo "<script>alert('ID do serviço não fornecido!'); window.location.href='relatorioServicos.php';</script>";
}
?>
