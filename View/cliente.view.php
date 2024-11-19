<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Clientes</title>
<link rel="icon" type="image/x-icon" href="../img/ts1.png">
<link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
<header>
    <h1>Cadastro de Clientes</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class="alinhamentousuario">
        <p>
            <img src="../img/usu.png" alt="Usuário"><br>
            <?php echo nl2br(htmlspecialchars($usuario)); ?>
        </p>
    </div>
</header>
<?php require '../menu.php'; ?>

<div class="form">
    <!-- Exibe mensagens de sucesso ou erro -->
    <?php if (!empty($mensagem)) echo $mensagem; ?>

    <!-- Formulário de cadastro -->
    <form method="post" action="">
        <br><label for="nome">Nome do Cliente:</label>
        <input type="text" name="nome" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br><br>

        <label for="altura">Altura:</label>
        <input type="text" name="altura" required><br><br>

        <button type="submit" id="cadastrar-button">Cadastrar</button>
    </form>
</div>

<script src="../JS/script.js"></script>
</body>
</html>
