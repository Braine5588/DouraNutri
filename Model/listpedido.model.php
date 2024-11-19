<?php
class ListarPedido {
      private $conn;

      public function __construct($conexao) {
          $this->conn = $conexao->conn;
      }
      public function obterVendedores() {
        $sql = "SELECT Nome FROM cadastrovendedor";
        $result = $this->conn->query($sql);
        $vendedores = [];

        while ($row = $result->fetch_assoc()) {
            $vendedores[] = $row['Nome'];
        }

        return $vendedores;
    }
    public function listarPedidos($funcionario = 'todos') {
        $sql = "SELECT * FROM cadastropedido";
        
        if ($funcionario !== 'todos') {
            $stmt = $this->conn->prepare($sql . " WHERE NOME_VENDEDOR = ?");
            $stmt->bind_param("s", $funcionario);
        } else {
            $stmt = $this->conn->prepare($sql);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $pedidos = [];

        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }

        $stmt->close();
        return $pedidos;
    }
}
      ?>