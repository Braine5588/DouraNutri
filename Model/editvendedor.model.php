<?php
class EditarVendedorModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function obterVendedorPorId($vendedor_id) {
        $sql = "SELECT * FROM cadastrovendedor WHERE Id_Vendedor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $vendedor_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function atualizarVendedor($vendedor_id, $nome, $idade, $cpf, $endereco, $salario, $cargo, $observacao) {
        $sql = "UPDATE cadastrovendedor SET Nome = ?, Idade = ?, CPF = ?, Endereco = ?, Salario = ?, Cargo = ?, Observacao = ? WHERE Id_Vendedor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sisssssi", $nome, $idade, $cpf, $endereco, $salario, $cargo, $observacao, $vendedor_id);
        return $stmt->execute();
    }
}
?>
