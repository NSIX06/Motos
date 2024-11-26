<?php

class servicos
{
    private $tipo_servico;
    private $valor;
    private $conn;

    public function __construct() {
        include_once('db/conn.php'); 
        $this->conn = $conn; 
    }

    // Método para criar um serviço com tipo e valor
    public function create($_tipo_servico, $_valor) {
        $this->tipo_servico = $_tipo_servico;
        $this->valor = $_valor;
    }

    // Getters para tipo_servico e valor
    public function getTipoServico() {
        return $this->tipo_servico;
    }

    public function getValor() {
        return $this->valor;
    }

    // Setters para tipo_servico e valor
    public function setTipoServico($_tipo_servico) {
        $this->tipo_servico = $_tipo_servico;
    }

    public function setValor($_valor) {
        $this->valor = $_valor;
    }

    // Método para inserir um serviço no banco de dados
    public function inserirServicos() {
        $sql = "CALL piServicos(:tipo_servico, :valor)";
        $data = [
            'tipo_servico' => $this->tipo_servico,
            'valor' => $this->valor
        ];

        $statement = $this->conn->prepare($sql);
        $statement->execute($data);

        return true;
    }

    // Método para listar serviços com um filtro opcional
    public function listarServicos($filtro = '') {
        try {
            $sql = "SELECT id_servicos, tipo_servico, valor FROM servicos";
            
            if (!empty($filtro)) {
                $sql .= " WHERE tipo_servico LIKE :filtro";
            }

            $stmt = $this->conn->prepare($sql);

            if (!empty($filtro)) {
                $stmt->bindValue(':filtro', '%' . $filtro . '%', PDO::PARAM_STR);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar serviços: " . $e->getMessage();
            return [];
        }
    }

    // Método para excluir um serviço
    public function excluirServico($_id) {
        $sql = "CALL pdServico(:id)";
        $data = ['id' => $_id];
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }

    // Método para atualizar um serviço
    public function atualizarServicos($_id) {
        try {
            $sql = "CALL puServico(:id_servicos, :tipo_servico, :valor)";
            $data = [
                'id_servicos' => $_id,
                'tipo_servico' => $this->tipo_servico,
                'valor' => $this->valor
            ];

            $statement = $this->conn->prepare($sql);
            $statement->execute($data);

            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar o serviço: " . $e->getMessage();
            return false;
        }
    }

    // Método para buscar um serviço por ID
    public function buscarServicos($_id) {
        $sql = "CALL psServicos(:id)";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $_id);
        $data = $statement->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $this->tipo_servico = $data["tipo_servico"];
            $this->valor = $data["valor"];
            return true;
        }

        return false;
    }
}
?>
