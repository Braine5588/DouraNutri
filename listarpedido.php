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
  <title>Lista de Pedidos</title>
  <link rel="icon" type="image/x-icon" href="/img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
  </style>
</head>
<body>
  <header>
    <h1>Pedidos Cadastrados</h1>
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
    <button id="grafico-button"></button>

    
  <div class="tabela">
    <form method="post" action="listarpedido.php">
      <label for="funcionario">Selecione o funcionário:</label>
      <select id="funcionario" name="funcionario">
        <option value="todos">Todos</option>
         <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "tb_produtos";

        $db = new mysqli($hostname, $username, $password, $database);

        if ($db->connect_error) {
            die("Erro na conexão com o banco de dados: " . $db->connect_error);
        }

        $result = $db->query("SELECT Nome FROM cadastrovendedor");
        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['Nome'] . "'>" . $row['Nome'] . "</option>";
        }
      ?>
        <!-- Adicione mais opções conforme necessário -->
      </select>
      <button type="submit" id="gerar-lista">Gerar Lista</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['funcionario'])) {
      $funcionarioSelecionado = $_POST['funcionario'];
      listPedidos($funcionarioSelecionado);
    } else {
      listPedidos("todos");
    }

    function listPedidos($funcionario) {
      $server = "localhost";
      $user = "root";
      $pass = "";
      $mydb = "tb_produtos";
      $conn = new mysqli($server, $user, $pass, $mydb);

      if ($conn->connect_error) {
        die("Conexão Falhou: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM cadastropedido";
      
      if ($funcionario !== 'todos') {
        $sql .= " WHERE NOME_VENDEDOR = '$funcionario'";
      }

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo '<table border="1">
            <tr>
                <th>Funcionário</th>
                <th>Produto</th>
                <th>Cliente</th>
                <th>Preço</th>
                <th>Quantidade Pedida</th>
                <th>Data</th>
            </tr>';

        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row['NOME_VENDEDOR'] . '</td>';
          echo '<td>' . $row['NOME_PRODUTO'] . '</td>';
          echo '<td>' . $row['NOME_CLIENTE'] . '</td>';
          echo '<td>' . $row['PrecoVender'] . '</td>';
          echo '<td>' . $row['Qtd_Pedida'] . '</td>';
          echo '<td>' . $row['data_pedido'] . '</td>';
          echo '</tr>';
        }

        echo '</table>';
      } else {
        echo 'Nenhum pedido encontrado para o funcionário selecionado.';
      }

      $conn->close();
    }
    ?>
  </div>
  <script src="JS/script.js"></script>
</body>
</html>
