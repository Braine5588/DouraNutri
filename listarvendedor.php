<?php
require 'start.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Funcionários</title>
  <link rel="icon" type="image/x-icon" href="img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Funcionários Cadastrados</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class = "alinhamentousuario">
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

    class ListarVendedor {
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

      public function listarVendedor() {
        $sql = "SELECT * FROM cadastrovendedor";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
          echo '<table border="1">
              <tr>
                  <th>Nome</th>
                  <th>Idade</th>
                  <th>CPF</th>
                  <th>Endereço</th>
                  <th>Salário</th>
                  <th>Cargo</th>
                  <th>Usuário</th>
                  <th>Observações</th>
                  <th>Ações</th> <!-- Nova coluna para as ações -->
              </tr>';

          while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['Nome'] . '</td>';
            echo '<td>' . $row['Idade'] . '</td>';
            echo '<td>' . $row['CPF'] . '</td>';
            echo '<td>' . $row['Endereco'] . '</td>';
            echo '<td>' . $row['Salario'] . '</td>';
            echo '<td>' . $row['Cargo'] . '</td>';
            echo '<td>' . $row['Usuario'] . '</td>';
            echo '<td>' . $row['Observacao'] . '</td>';
            echo '<td>
                    <a href="editarvendedor.php?Id_Vendedor=' . $row['Id_Vendedor'] . '" class="edit-link">Editar</a><br>
                    
                  </td>';
            echo '</tr>';
          }

          echo '</table>';
        } else {
          echo "Nenhum resultado encontrado.";
        }
      }

      public function __destruct() {
        $this->conn->close();
      }
    }

    $listarVendedor = new ListarVendedor();
    $listarVendedor->listarVendedor();

    ?>
  </div>
  <script src="JS/script.js"></script>
</body>
</html>
