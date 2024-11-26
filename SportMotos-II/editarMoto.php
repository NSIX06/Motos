<?php
include_once("class/motos.php");

$moto = new moto();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $moto->buscarMoto($id); // Busca os dados da moto
}

// Processar o formulário de edição
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $moto->create($_POST["modelo"], $_POST["ano_modelo"], $_POST["ano_fabricacao"], $_POST["cor_primaria"], $_POST["cor_secundaria"], $_POST["valor"]);


    if ($moto->atualizarMotos($_id)) {
        echo "<script>alert('Moto atualizada com sucesso!'); window.location.href='relatorioMoto.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar a moto!');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Moto</title>
</head>
<body>

<div id="main-container">
    <h1>Editar Moto</h1>
    <form method="POST">
        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $moto->getModelo(); ?>" required>

        <label>Ano do Modelo:</label>
        <input type="text" name="ano_modelo" value="<?php echo $moto->getAno_modelo(); ?>" required>

        <label>Ano de Fabricação:</label>
        <input type="text" name="ano_fabricacao" value="<?php echo $moto->getAno_fabricacao(); ?>" required>

        <label>Cor Primária:</label>
        <input type="text" name="cor_primaria" value="<?php echo $moto->getCor_primaria(); ?>" required>

        <label>Cor Secundária:</label>
        <input type="text" name="cor_secundaria" value="<?php echo $moto->getCor_secundaria(); ?>" required>

        <label>Valor:</label>
        <input type="number" name="valor" value="<?php echo $moto->getValor(); ?>" step="0.01" required>

        <div id="button-container">
            <button type="submit">Atualizar</button>
            <a href="relatorioMoto.php" class="back-button">Voltar</a>
        </div>
    </form>
</div>

</body>
</html>
