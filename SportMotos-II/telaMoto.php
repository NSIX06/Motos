<?php
    include_once("class/motos.php");
    ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telaM.css">
    <title>Cadastro de Motos</title>

</head>
<body>

    <!-- Container principal -->
    <div id="main-container">
        <h1>Cadastro de Motos</h1>
        <section id="poost">
            <form method="POST">

                <label>Modelo:</label>
                <input type="text" name="modelo" minlength="3" required placeholder="Modelo da moto">

                <label>Ano do Modelo:</label>
                <input type="text" name="ano_modelo" minlength="4" required placeholder="Ano do modelo">

                <label>Ano de Fabricação:</label>
                <input type="text" name="ano_fabricacao" minlength="4" required placeholder="Ano de fabricação">

                <label>Cor Primária:</label>
                <input type="text" name="cor_primaria" minlength="3" required placeholder="Cor primária">

                <label>Cor Secundária:</label>
                <input type="text" name="cor_secundaria" minlength="3" required placeholder="Cor secundária">

                <label>Valor:</label>
                <input type="number" name="valor" step="0.01" required placeholder="Valor da moto">


                <div id="button-container">
                    <button type="submit" name="inserir">Cadastrar</button>
                    <a href="index.php">Voltar</a>
                </div>

                <?php
                    if ( isset($_REQUEST["inserir"]) ) {
                        $p = new moto(); 
                        $p->create($_REQUEST["modelo"], $_REQUEST["ano_modelo"], $_REQUEST["ano_fabricacao"], $_REQUEST["cor_primaria"], $_REQUEST["cor_secundaria"], $_REQUEST["valor"]);
                        
                        echo $p->inserirMotos() == true ?
                            "<p>Moto cadastrada com sucesso.</p>" :
                            "<p>Ocorreu um erro ao cadastrar a moto!</p>";
                    }
                ?>
            </form>
        </section>
    </div>

</body>
</html>
