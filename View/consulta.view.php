<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Consulta</title>
  <link rel="icon" type="image/x-icon" href="img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
  </style>
</head>

<body>
  <header>
    <h1>Cadastro de Consulta </h1>
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
  <button id="imc-button"></button>

<div class="form">
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <br><label for="nomevend">Nome do Nutricionista:</label>
    <select name="nomevend" required>
    <option value="">Selecione um nutricionista</option>

      <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "tb_produtos";

        $db = new mysqli($hostname, $username, $password, $database);

        if ($db->connect_error) {
          die("Erro na conexão com o banco de dados: " . $db->connect_error);
        }

        $result = $db->query("SELECT Nome FROM cadastrovendedor WHERE Cargo = 'Nutricionista' ");
        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['Nome'] . "'>" . $row['Nome'] . "</option>";
        }
      ?>
    </select><br><br>

    <label for="nomecli">Nome do Cliente:</label>
    <select name="nomecli" required>
      <option value="">Selecione um cliente</option>
      <?php
        $result = $db->query("SELECT Nome, Altura FROM cadastrocliente");
        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row['Nome'] . "' data-altura='" . $row['Altura'] . "'>" . $row['Nome'] .  "</option>";
        }
      ?>
    </select><br><br>

<label for="altura">Altura:</label>
<span id="alturaField"  class="span1"></span><br><br> 

    <label for="peso">Peso:</label>
    <input type="text" name="peso" required><br><br>

    <label for="dataconsu">Data da Consulta:</label>
    <input type="date" name="dataconsu" required><br><br>

    <label for="objetivo">Objetivo do Cliente:</label>
    <input type="text" name="objetivo" required><br><br>

    <label for="parecer">Parecer da Consulta:</label>
    <input type="text" name="parecer" required><br><br>

    <button type="submit" id="cadastrar-button">Cadastrar</button>

  </form>
  <script src="JS/script.js"></script>
  </body>
</html>