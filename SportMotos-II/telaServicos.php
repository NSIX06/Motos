<?php
include_once("class/servicos.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaS.css">
    <title>Cadastro de Serviços</title>
</head>
<body>

<div id="main-container">
    <h1>Cadastro de Serviços</h1>
    <form method="POST">
        <label>Serviço:</label>
        <input type="text" name="tipo_servico" required placeholder="Insira um serviço" style="border-radius: 5px;">

        <label>Valor:</label>
        <input type="number" name="valor" step="0.01" required placeholder="Valor do serviço" style="border-radius: 5px;">

        <div id="button-container">
            <button type="submit" name="inserir">Cadastrar</button>
            <a href="index.php" class="back-button">Voltar</a>
        </div>
    </form>

    <?php
    if (isset($_POST["inserir"])) {
        $servico = new servicos();
        $servico->create($_POST["tipo_servico"], $_POST["valor"]);

        echo $servico->inserirServicos() ?
            "<p>Serviço cadastrado com sucesso.</p>" :
            "<p>Ocorreu um erro ao cadastrar o serviço!</p>";
    }
    ?>
</div>

</body>
</html>
