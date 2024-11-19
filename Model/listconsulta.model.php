<?php
class ListarConsulta {
      private $conn;

      public function __construct($conexao) {
          $this->conn = $conexao->conn;
      }
      public function obterClientes() {
        $sql = "SELECT Nome FROM cadastrocliente";
        $result = $this->conn->query($sql);
        $clientes = [];

        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row['Nome'];
        }

        return $clientes;
    }
    public function listarConsultas($cliente = 'todos') {
        $sql = "SELECT * FROM cadastroconsulta";
        
        if ($cliente !== 'todos') {
            $sql .= " WHERE NOME_CLIENTE = ?"; // Inclui o filtro no SQL
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $cliente);
        } else {
            $stmt = $this->conn->prepare($sql);
        }
    
        $stmt->execute();
        $result = $stmt->get_result();
        $listar = [];
    
        while ($row = $result->fetch_assoc()) {
            $listar[] = $row;
        }
    
        $stmt->close();
        return $listar;
    }
}
?>    