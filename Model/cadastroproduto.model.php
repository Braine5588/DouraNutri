
<?php
class CadastroProduto {
  private $Nome;
  private $Categoria;
  private $Preco;
  private $PrecoVender;
  private $Quantidade;
  private $data_validade;
  private $data_fabricacao;
  private $conn;

  public function __construct() {
    $this->connectaBD();
  }

  private function connectaBD() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $mydb = "tb_produtos";

    $this->conn = new mysqli($server, $user, $pass, $mydb);

    if ($this->conn->connect_error) {
      die("Conexão Falhou: " . $this->conn->connect_error);
    }
  }

  public function cadastrarProduto() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->Nome = $_POST["nome"];
      $this->Categoria = $_POST["categoria"];
      $this->Preco = $_POST["preco"];
       $this->PrecoVender = $_POST["precovender"];
      $this->Quantidade = $_POST["quantidade"];
      $this->data_validade = $_POST["data_validade"];
      $this->data_fabricacao = $_POST["data_fabricacao"];

      $sql = "INSERT INTO cadastroproduto (Nome, Categoria, Preco, PrecoVender, Quantidade, data_validade, data_fabricacao)
              VALUES ('$this->Nome', '$this->Categoria', '$this->Preco', '$this->PrecoVender', '$this->Quantidade', '$this->data_validade', '$this->data_fabricacao')";
              if ($this->conn->query($sql) === TRUE) {
                echo '<div class="message">Produto cadastrado com sucesso!</div>';
                } else {
                  echo '<div class="messagefalha">Erro ao cadastrar o produto: </div>' . $this->conn->error;
                }
      
    }
  }
}
?>
