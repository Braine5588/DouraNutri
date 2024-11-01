<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Pedidos</title>
  <link rel="icon" type="image/x-icon" href="img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Cadastro de Pedidos</h1>
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
<div class="form">
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <br><label for="nomevendedor">Nome do Vendedor:</label>
    <select name="nomevendedor" required>
    <option value="">Selecione um vendedor</option>
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
    </select><br><br>

   <label for="nomeproduto">Nome do Produto:</label>
<select name="nomeproduto" required onchange="atualizarPrecoEQuantidade()">
  <option value="">Selecione um produto</option>
  <?php
    $result = $db->query("SELECT Nome, PrecoVender, Quantidade FROM cadastroproduto");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='" . $row['Nome'] . "' data-precovender='" . $row['PrecoVender'] . "' data-quantidade='" . $row['Quantidade'] . "'>" . $row['Nome'] . "</option>";
    }
  ?>
</select><br><br>


<label for="nomecliente">Nome do Cliente:</label>
<select name="nomecliente" required>
<option value="">Selecione um cliente</option>
  <?php
    $result = $db->query("SELECT Nome FROM cadastrocliente");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='" . $row['Nome'] . "'>" . $row['Nome'] . "</option>";
    }
  ?>
</select><br><br>

<label for="precovender">Preço (Kg):</label>
<span id="precovenderField" class="span1"></span><br><br>

<label for="quantidade">Quantidade em estoque (Kg):</label>
<span id="quantidadeField" class="span1"></span><br><br>


<label for="qtdPedida">Quantidade Pedida (Kg):</label>
<input type="text" name="qtdPedida" step="0.01" required><br><br>

<label for="dataPedido">Data do Pedido:</label>
<input type="date" name="dataPedido" required ><br><br>

<br><button type="submit" id="cadastrar-button">Cadastrar</button>
</form>
<script src="JS/script.js"></script>
</body>
</html>


