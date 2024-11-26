<?php

class moto
{
    private $conn;
    private $modelo;
    private $ano_modelo;
    private $ano_fabricacao;
    private $cor_primaria;
    private $cor_secundaria;
    private $valor;

    public function __construct() {
        include_once('db/conn.php'); // Inclua a conexão aqui
        $this->conn = $conn; 
    }

    public function create($_modelo, $_ano_modelo, $_ano_fabricacao, $_cor_primaria, $_cor_secundaria, $_valor) {
        $this->modelo = $_modelo;
        $this->ano_modelo = $_ano_modelo;
        $this->ano_fabricacao = $_ano_fabricacao;
        $this->cor_primaria = $_cor_primaria;
        $this->cor_secundaria = $_cor_secundaria;
        $this->valor = $_valor;
    }

    // Getters
    public function getModelo() {
        return $this->modelo;
    }

    public function getAno_modelo() {
        return $this->ano_modelo;
    }

    public function getAno_fabricacao() {
        return $this->ano_fabricacao;
    }

    public function getCor_primaria() {
        return $this->cor_primaria;
    }

    public function getCor_secundaria() {
        return $this->cor_secundaria;
    }

    public function getValor() {
        return $this->valor;
    }

    // Setters
    public function setModelo($_modelo) {
        $this->modelo = $_modelo;
    }

    public function setAno_modelo($_ano_modelo) {
        $this->ano_modelo = $_ano_modelo;
    }

    public function setAno_fabricacao($_ano_fabricacao) {
        $this->ano_fabricacao = $_ano_fabricacao;
    }

    public function setCor_primaria($_cor_primaria) {
        $this->cor_primaria = $_cor_primaria;
    }

    public function setCor_secundaria($_cor_secundaria) {
        $this->cor_secundaria = $_cor_secundaria;
    }

    public function setValor($_valor) {
        $this->valor = $_valor;
    }

    public function inserirMotos() {
        $sql = "CALL piMoto(:modelo, :ano_modelo, :ano_fabricacao, :cor_primaria, :cor_secundaria, :valor)";

        $data = [
            'modelo' => $this->modelo,
            'ano_modelo' => $this->ano_modelo,
            'ano_fabricacao' => $this->ano_fabricacao,
            'cor_primaria' => $this->cor_primaria,
            'cor_secundaria' => $this->cor_secundaria,
            'valor' => $this->valor
        ];

        $statement = $this->conn->prepare($sql);
        $statement->execute($data);

        return true;
    }

    public function listarMotosFiltradas($filtro = '') {
        try {
            // Construa a consulta SQL para selecionar as motos com filtro, se fornecido
            $sql = "SELECT id_moto, modelo, ano_modelo, ano_fabricacao, cor_primaria, cor_secundaria, valor FROM moto";
    
            // Adiciona a cláusula WHERE caso o filtro esteja presente
            if (!empty($filtro)) {
                $sql .= " WHERE modelo LIKE :filtro";
            }
    
            $stmt = $this->conn->prepare($sql);
    
            // Bind do valor do filtro, se presente
            if (!empty($filtro)) {
                $stmt->bindValue(':filtro', '%' . $filtro . '%', PDO::PARAM_STR);
            }
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar moto filtradas: " . $e->getMessage();
            return [];
        }
    }
    


    public function buscarMoto($_id) {
        $sql = "CALL psMoto(:id)";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $_id);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($data) {
            foreach ($data as $item) {
                $this->modelo = $item["modelo"];
                $this->ano_modelo = $item["ano_modelo"];
                $this->ano_fabricacao = $item["ano_fabricacao"];
                $this->cor_primaria = $item["cor_primaria"];
                $this->cor_secundaria = $item["cor_secundaria"];
                $this->valor = $item["valor"];
            }
            return true;
        }

        return false;
    }
}
?>
