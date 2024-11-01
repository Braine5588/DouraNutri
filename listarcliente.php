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
  <title>Lista de Clientes</title>
  <link rel="icon" type="image/x-icon" href="img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Clientes Cadastrados </h1>
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
     <div class="tabela">
<?php

class ListarCliente {
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

    public function listarCliente() {
        $sql = "SELECT * FROM cadastrocliente";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table border="1">
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Altura</th>
                </tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['Nome'] . '</td>';
                echo '<td>' . $row['Idade'] . '</td>';
                echo '<td>' . $row['CPF'] . '</td>';
                echo '<td>' . $row['Endereco'] . '</td>';
                echo '<td>' . $row['Altura'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Nenhum produto cadastrado.';
        }
    }
}

// Uso da classe para listar produtos
$listarCliente = new ListarCliente();
$listarCliente->listarCliente();

?>

</div>
<script src="JS/script.js"></script>
</body>
</html>