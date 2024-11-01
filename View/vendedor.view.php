<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>
    <link rel="icon" type="image/x-icon" href="img/ts1.png">
    <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <h1>Cadastro de Funcionários</h1>
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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br><label for="nome">Nome do Vendedor:</label>
        <input type="text" name="nome" required><br><br>

        <label for="idade">Idade:</label>
        <input type="text" name="idade" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br><br>

        <label for="salario">Salário:</label>
        <input type="text" name="salario" required><br><br>

        <label for="cargo">Cargo:</label>
        <input type="radio" id="adm" name="cargo" value="Administrador">
        <span>Administrador</span>
        <input type="radio" id="vend" name="cargo" value="Vendedor">
        <span>Vendedor</span>
        <input type="radio" id="Nut" name="cargo" value="Nutricionista">
        <span>Nutricionista</span><br><br>

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="text" name="senha" required><br><br>

        <label for="observacao">Observação</label>
        <input type="text" name="observacao" required><br><br>

       <button type="submit" id="cadastrar-button">Cadastrar</button>
    </form>
    <script src="JS/script.js"></script>
</body>
</html>
