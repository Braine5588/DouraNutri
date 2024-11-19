
  <?php

class ListarVendedor {
  private $conn;

  public function __construct($conexao) {
    $this->conn = $conexao->conn;
  }
    public function obterVendedor(){
    $sql = "SELECT * FROM cadastrovendedor";
    $result = $this->conn->query($sql);
    
    $vendedor = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $vendedor[] = $row;

        }
    }
    return $vendedor;
}
}
?>