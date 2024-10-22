
<?php
class CadastroVendedor {
  private $Nome;
  private $Idade;
  private $CPF;
  private $Endereco;
  private $Salario;
  private $Cargo;
  private $Usuario;
  private $Senha;
  private $Observacao;
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

  public function cadastrarVendedor() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->Nome = $_POST["nome"];
      $this->Idade = $_POST["idade"];
      $this->CPF = $_POST["cpf"];
      $this->Endereco = $_POST["endereco"];
       $this->Salario = $_POST["salario"];
      $this->Cargo = $_POST["cargo"];
      $this->Usuario = $_POST["usuario"];
      $this->Senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
      $this->Observacao = $_POST["observacao"];

      $sql = "INSERT INTO cadastrovendedor (Nome, Idade, CPF, Endereco, Salario, Cargo, Usuario, Senha, Observacao)
              VALUES ('$this->Nome', '$this->Idade', '$this->CPF', '$this->Endereco','$this->Salario', '$this->Cargo', '$this->Usuario', '$this->Senha', '$this->Observacao')";

      if ($this->conn->query($sql) === TRUE) {
      echo '<div class="message">Vendedor cadastrado com sucesso!</div>';
      } else {
        echo '<div class="messagefalha">Erro ao cadastrar o vendedor: </div>' . $this->conn->error;
      }
    }
  }
}
?>


