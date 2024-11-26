<?php
include_once("class/motos.php");
error_reporting(0);

// Instância da classe moto
$moto = new moto(); 

// Obtém o filtro do formulário, se existir
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

// Chama a função para listar motos com o filtro aplicado
$motosCadastradas = $moto->listarMotosFiltradas($filtro);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/relatorioM.css">
    
    <title>Relatório de Motos Cadastradas</title>
</head>
<body>

<div id="main-container">
    <h1>Relatório de Motos Cadastradas</h1>

    <!-- Formulário de filtro -->
    <form method="GET" action="relatorioMoto.php" style="margin-bottom: 20px; border-radius: 10px;">
        <label for="filtro">Filtrar por Modelo:</label>
        <input type="text" id="filtro" name="filtro" value="<?php echo htmlspecialchars($filtro); ?>"  style="border-radius: 5px;">
        <button type="submit"  class="btn btn-primary"; style= "background-color:#00ced1;">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Ano do Modelo</th>
                <th>Ano de Fabricação</th>
                <th>Cor Primária</th>
                <th>Cor Secundária</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($motosCadastradas)) {
                foreach ($motosCadastradas as $moto) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($moto['modelo']) . "</td>";
                    echo "<td>" . htmlspecialchars($moto['ano_modelo']) . "</td>";
                    echo "<td>" . htmlspecialchars($moto['ano_fabricacao']) . "</td>";
                    echo "<td>" . htmlspecialchars($moto['cor_primaria']) . "</td>";
                    echo "<td>" . htmlspecialchars($moto['cor_secundaria']) . "</td>";
                    echo "<td>" . number_format($moto['valor'], 2, ',', '.') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma moto encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php" id="back-button">Voltar</a>
</div>

</body>
</html>
