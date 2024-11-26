<?php
include_once("class/motos.php");// Inclui a classe moto

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o ID da moto foi enviado
    if (isset($_POST['moto_id']) && !empty($_POST['moto_id'])) {
        $moto_id = $_POST['moto_id']; // Captura o ID da moto

        // Cria uma instância da classe moto
        $moto = new moto();

        // Tenta excluir a moto
        if ($moto->excluirMoto($moto_id)) {
            echo "Moto excluída com sucesso!";
        } else {
            echo "Erro ao excluir a moto!";
        }
    } else {
        echo "ID da moto não foi informado!";
    }
}
?>

