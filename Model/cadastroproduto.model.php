
<?php
class CadastroProduto {
  private $conn;

  public function __construct() {
    $this->conn = (new Conexao())->conn;
  }

  public function cadastrarProduto($dados) {
      $Nome = $dados["nome"];
      $Categoria = $dados["categoria"];
      $Preco = $dados["preco"];
      $PrecoVender = $dados["precovender"];
      $Quantidade = $dados["quantidade"];
      $data_validade = $dados["data_validade"];
      $data_fabricacao = $dados["data_fabricacao"];

      $sql = "INSERT INTO cadastroproduto (Nome, Categoria, Preco, PrecoVender, Quantidade, data_validade, data_fabricacao)
              VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("sssssss", $Nome, $Categoria, $Preco, $PrecoVender, $Quantidade, $data_validade, $data_fabricacao);

              if ($stmt->execute()) {
                return '<div class="message">Produto cadastrado com sucesso!</div>';
                } else {
                  return '<div class="messagefalha">Erro ao cadastrar o produto:' . $this->conn->error . ' </div>';
                }
      
    }
  }
?>
