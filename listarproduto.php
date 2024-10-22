<?php
require 'start.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador' && $cargo !== 'Vendedor' ) {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estoque</title>
  <link rel="icon" type="image/x-icon" href="/img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
  <link href="CSS/fontawesome.css" rel="stylesheet"/>

</head>
<body>
  <header>
    <h1>Produtos Cadastrados </h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class = "alinhamentousuario">
    <p> 
    <img src="/img/usu.png"> <br>  <?php echo nl2br(htmlspecialchars($usuario)); ?> 
    </p>
    <div>
  </header>
  <?php
  require 'menu.php';
  ?>
  <div class="tabela">
    <?php
    class ListarProdutos {
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
        public function listarProdutos() {
            $sql = "SELECT * FROM cadastroproduto";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table border="1">
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Data de Validade</th>
                        <th>Data de Fabricação</th>
                    </tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Nome'] . '</td>';
                    echo '<td>' . $row['Categoria'] . '</td>';
                    echo '<td>' . $row['Preco'] . '</td>';
                    echo '<td>' . $row['Quantidade'] . '</td>';
                    echo '<td>' . $row['data_validade'] . '</td>';
                    echo '<td>' . $row['data_fabricacao'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo 'Nenhum produto cadastrado.';
            }
        }
    }

    // Uso da classe para listar produtos
    $listarProdutos = new ListarProdutos();
    $listarProdutos->listarProdutos();
    ?>
  </div>
<button id="pdf-button"></button>

<script src="JS/script.js"></script>
</body>
</html>
