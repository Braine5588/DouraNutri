
<?php
class CadastroVendedor {
   private $conn;

  public function __construct() {
    $this->conn = (new Conexao())->conn;
  }

  public function cadastrarVendedor($dados) {
      $Nome = $dados["nome"];
      $Idade = $dados["idade"];
      $CPF = $dados["cpf"];
      $Endereco = $dados["endereco"];
      $Salario = $dados["salario"];
      $Cargo = $dados["cargo"];
      $Usuario = $dados["usuario"];
      $Senha = password_hash($dados["senha"], PASSWORD_DEFAULT);
      $Observacao = $dados["observacao"];

      $sql = "INSERT INTO cadastrovendedor (Nome, Idade, CPF, Endereco, Salario, Cargo, Usuario, Senha, Observacao)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("sisssssss", $Nome, $Idade, $CPF, $Endereco, $Salario, $Cargo, $Usuario, $Senha, $Observacao);

      if ($stmt->execute()) {
      return '<div class="message">Vendedor cadastrado com sucesso!</div>';
      } else {
        return '<div class="messagefalha">Erro ao cadastrar o vendedor: </div>' . $this->conn->error;
      }
    }
  }

?>


