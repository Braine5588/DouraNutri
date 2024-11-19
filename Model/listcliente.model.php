<?php

class ListarCliente {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao->conn;
    }

    public function obterClientes() {
        $sql = "SELECT * FROM cadastrocliente";
        $result = $this->conn->query($sql);

        $clientes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }
        return $clientes;
    }
}
?>
