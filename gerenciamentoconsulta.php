<?php
require 'start.php';
if ($cargo !== 'Nutricionista') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultas</title>
  <link rel="icon" type="image/x-icon" href="img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Consultas Cadastradas</h1>
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
    <form method="post" action="gerenciamentoconsulta.php">
      <label for="paciente">Selecione o Paciente:</label>
      <select id="paciente" name="paciente">
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

        $result = $db->query("SELECT Nome FROM cadastrocliente");
        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['Nome'] . "'>" . $row['Nome'] . "</option>";
        }
      ?>
        <!-- Adicione mais opções conforme necessário -->
      </select>
      <button type="submit" id="gerar-lista">Gerar Lista</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paciente'])) {
      $pacienteSelecionado = $_POST['paciente'];
      listConsulta($pacienteSelecionado);
    } else {
      listConsulta("todos");
    }

    function listConsulta($paciente) {
      $server = "localhost";
      $user = "root";
      $pass = "";
      $mydb = "tb_produtos";
      $conn = new mysqli($server, $user, $pass, $mydb);

      if ($conn->connect_error) {
        die("Conexão Falhou: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM cadastroconsulta";
      
      if ($paciente !== 'todos') {
        $sql .= " WHERE NOME_CLIENTE = '$paciente'";
      }

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo '<table border="1">
            <tr>
                <th>Paciente</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Data</th>
                <th>Objetivo</th>
                <th>Parecer</th>
            </tr>';

        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row['NOME_CLIENTE'] . '</td>';
          echo '<td>' . $row['Altura'] . '</td>';
          echo '<td>' . $row['Peso'] . '</td>';
          echo '<td>' . $row['Data_consulta'] . '</td>';
          echo '<td>' . $row['Objetivo'] . '</td>';
          echo '<td>' . $row['Desc_consul'] . '</td>';
          echo '</tr>';
        }

        echo '</table>';
      } else {
        echo 'Nenhuma consulta encontrada no nome informado.';
      }

      $conn->close();
    }
    ?>
  </div>
  <script src= "JS/script.js"></script>
</body>
</html>
