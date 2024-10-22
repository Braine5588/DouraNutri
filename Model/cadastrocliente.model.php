<?php
class CadastroCliente {
  private $Nome;
  private $Idade;
  private $CPF;
  private $Endereco;
  private $Altura;
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

  public function cadastrarCliente() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->Nome = $_POST["nome"];
      $this->Idade = $_POST["idade"];
      $this->CPF = $_POST["cpf"];
      $this->Endereco = $_POST["endereco"];
      $this->Altura = $_POST["altura"];

      $sql = "INSERT INTO cadastrocliente (Nome, Idade, CPF, Endereco, Altura)
              VALUES ('$this->Nome', '$this->Idade', '$this->CPF', '$this->Endereco', '$this->Altura')";

      if ($this->conn->query($sql) === TRUE) {
      echo '<div class="message">Cliente cadastrado com sucesso!</div>';
      } else {
        echo '<div class="messagefalha">Erro ao cadastrar o cliente: </div>' . $this->conn->error;
      }
    }
  }
}
?>
