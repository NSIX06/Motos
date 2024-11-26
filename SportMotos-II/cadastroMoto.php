<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_modelo = $_POST['modelo'];
    $_ano_modelo = $_POST['ano_modelo'];
    $_ano_fabricacao = $_POST['ano_fabricacao'];
    $_cor_primaria = $_POST['cor_primaria'];
    $_cor_secundaria = $_POST['cor_secundaria'];
    $_valor = $_POST['valor'];


    $this->modelo = $_modelo;
    $this->ano_modelo = $_ano_modelo;
    $this->ano_fabricacao = $_ano_fabricacao;
    $this->cor_primaria = $_cor_primaria;
    $this->cor_secundaria = $_cor_secundaria;
    $this->valor = $_valor;

    $conn = new mysqli('localhost', 'root', '', 'motos_db');

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO moto (modelo, ano_modelo, ano_fabricacao, cor_primaria, cor_secundaria, valor) 
            VALUES ('$_modelo', '$_ano_modelo', '$_ano_fabricacao', '$_cor_primaria', '$_cor_secundaria', '$_valor')";

    if ($conn->query($sql) === TRUE) {
        echo "Moto cadastrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
