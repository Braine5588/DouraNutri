<?php


class CadastroConsulta {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = (new Conexao())->conn;
    }

    public function cadastrarConsulta($dados) {
        $nomeCliente = $dados["nomecli"];
        $nomeVendedor = $dados["nomevend"];
        $peso = $dados["peso"];
        $dataConsulta = $dados["dataconsu"];
        $objetivo = $dados["objetivo"];
        $descConsulta = $dados["parecer"];

        // Obtém a altura do cliente
        $stmtAltura = $this->conn->prepare("SELECT Altura FROM cadastrocliente WHERE Nome = ?");
        $stmtAltura->bind_param("s", $nomeCliente);
        $stmtAltura->execute();
        $resultAltura = $stmtAltura->get_result();
        $altura = $resultAltura->fetch_assoc()['Altura'] ?? 0;
        $stmtAltura->close();

        // Insere os dados na tabela cadastroconsulta
        $stmt = $this->conn->prepare(
            "INSERT INTO cadastroconsulta (NOME_CLIENTE, NOME_VENDEDOR, Altura, Peso, Data_consulta, Objetivo, Desc_consul)
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssssss", $nomeCliente, $nomeVendedor, $altura, $peso, $dataConsulta, $objetivo, $descConsulta);

        if ($stmt->execute()) {
            return '<div class="message">Consulta cadastrada com sucesso!</div>';
        } else {
            return '<div class="messagefalha">Erro ao cadastrar a consulta: ' . $this->conn->error . '</div>';
        }
    }

    public function listarNutricionistas() {
        $stmt = $this->conn->prepare("SELECT Nome FROM cadastrovendedor WHERE Cargo = 'Nutricionista'");
        $stmt->execute();
        return $stmt->get_result();
    }

    public function listarClientes() {
        $stmt = $this->conn->prepare("SELECT Nome, Altura FROM cadastrocliente");
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
