<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Produto</title>
  <link rel="icon" type="image/x-icon" href="img/ts1.png">
  <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Cadastro de Produtos </h1>
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
    <br><label for="nome">Nome do Produto:</label>
    <input type="text" name="nome" required><br><br>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" required><br><br>

    <label for="preco">Preço (KG):</label>
    <input type="number" name="preco" step="0.01" required><br><br>

    <label for="precovender">Preço a ser vendido (KG):</label>
    <input type="number" name="precovender" step="0.01" required><br><br>

    <label for="quantidade">Quantidade (KG):</label>
    <input type="number" name="quantidade" required><br><br>

    <label for="data_validade">Data de Validade:</label>
    <input type="date" name="data_validade" required><br><br>

    <label for="data_fabricacao">Data de Fabricação:</label>
    <input type="date" name="data_fabricacao" required><br><br>

   <button type="submit" id="cadastrar-button">Cadastrar</button>
   
  </form>
  <script src="JS/script.js"></script>
</body>
</html>
