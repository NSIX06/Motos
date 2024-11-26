<?php
include_once("class/servicos.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servico = new servicos(); // Instância da classe servicos

// Coletar o filtro do formulário (se houver) e listar os serviços de acordo com ele
$filtro = $_GET['filtro'] ?? ''; // Coleta o valor do filtro do campo de texto, se existir
$servicosCadastrados = $servico->listarServicos($filtro); // Chama a função para listar serviços com filtro
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/relatorioS.css">
    <title>Relatório de Serviços Cadastrados</title>
</head>
<body>

<div id="main-container">
    <h1>Relatório de Serviços Cadastrados</h1>

    <!-- Formulário para os filtros -->
    <form method="GET" action="relatorioServicos.php" style="margin-bottom: 20px; border-radius: 10px;">
        <label for="filtro">Filtrar por Serviços:</label>
        <input type="text" id="filtro" name="filtro" value="<?php echo htmlspecialchars($filtro); ?>" style="border-radius: 5px;">
        <button type="submit" class="btn btn-primary" style="background-color:#00ced1;">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Serviços</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($servicosCadastrados)) {
            foreach ($servicosCadastrados as $servicoItem) {
                echo "<tr>";
                echo "<td>" . (isset($servicoItem['tipo_servico']) ? $servicoItem['tipo_servico'] : 'N/A') . "</td>";
                echo "<td>" . (isset($servicoItem['valor']) ? number_format($servicoItem['valor'], 2, ',', '.') : 'N/A') . "</td>";
                echo "<td>
                        <a href='editarServico.php?id=" . $servicoItem['id_servicos'] . "' class='btn btn-edit'>Editar</a>
                        <a href='excluirServico.php?id=" . $servicoItem['id_servicos'] . "' class='btn btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum serviço cadastrado.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <a href="index.php" id="back-button">Voltar</a>
</div>

</body>
</html>
