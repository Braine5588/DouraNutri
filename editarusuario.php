<?php
require 'start.php';

// Processa o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novoUsuario = $_POST['novoUsuario'];
    $novaSenha = $_POST['novaSenha'];

    $conn = new mysqli('localhost', 'root', '', 'tb_produtos');
    if ($conn->connect_error) {
        die('Conexão Falhou: ' . $conn->connect_error);
    }

    // Atualiza o usuário e a senha no banco de dados
    $sql = "UPDATE cadastrovendedor SET Usuario = ?, Senha = ? WHERE Usuario = ?";
    $stmt = $conn->prepare($sql);
    $hashedSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
    $stmt->bind_param('sss', $novoUsuario, $hashedSenha, $usu);

    if ($stmt->execute()) {
        echo '<div class="message">Usuário e senha atualizados com sucesso!</div>';
        $usu = $novoUsuario; // Atualiza a variável $usu com o novo nome de usuário
        $_SESSION['autenticar'] = $novoUsuario . "\n" . $cargo; // Atualiza a sessão com o novo nome de usuário
    } else {
        echo '<div class="message">Erro ao atualizar usuário e senha.</div>';
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuario</title>
  <link rel="icon" type="image/x-icon" href="img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Editar Usuario</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class="alinhamentousuario">
    <p> 
    <img src="img/usu.png"> <br>  <?php echo nl2br(htmlspecialchars($usuario)); ?> 
    </p>
    <div>
  </header>
  <?php
  require 'menu.php';
  ?>
  <?php
  if (isset($_GET['message'])) {
      echo '<div class="message">' . htmlspecialchars($_GET['message']) . '</div>';
  }
  ?>
  <div class="tabela">
    <?php

    class EditarUsuario {
      private $conn;
      private $usu;

      public function __construct($usu) {
        $this->usu = $usu;
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

      public function editarUsuario() {
        $sql = "SELECT Usuario, Senha FROM cadastrovendedor WHERE Usuario = '$this->usu'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $usuario = htmlspecialchars($row['Usuario']);
          $senha = htmlspecialchars($row['Senha']);

          echo '
          <form method="POST" action="">
             <br> <table border="1">
                  <tr>
                      <th>Usuário</th>
                      <th>Senha</th>
                  </tr>
                  <tr>
                      <td><input type="text" name="novoUsuario" value="' . $usuario . '" required></td>
                      <td><input type="password" name="novaSenha" value="' . $senha . '" required></td>
                  </tr>
              </table><br>
              <button type="submit" id="cadastrar-button" >Salvar</button>
          </form>'
          ;
        } else {
          echo "Nenhum resultado encontrado.";
        }
      }

      public function __destruct() {
        $this->conn->close();
      }
    }

    $editarUsuario = new EditarUsuario($usu);
    $editarUsuario->editarUsuario();

    ?>
  </div>
  
  <script src="JS/script.js"></script>
</body>
</html>
