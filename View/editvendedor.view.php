<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vendedor</title>
    <link rel="icon" type="image/x-icon" href="../img/ts1.png">
    <link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <h1>Editar Vendedor</h1>
        <button id="menu-button">Menu</button>
        <button id="home-button">Home</button>
        <div class="alinhamentousuario">
            <p>
                <img src="../img/usu.png"><br> <?php echo nl2br(htmlspecialchars($usuario)); ?>
            </p>
        </div>
    </header>
    <?php require '../menu.php'; ?>

    <?php if ($vendedor): ?>
        <div class="form">
            <form method="POST" action="../Controller/editarvendedor.php">
                <label for="Nome">Nome:</label>
                <input type="text" name="Nome" value="<?php echo htmlspecialchars($vendedor['Nome']); ?>"><br><br>

                <label for="Idade">Idade:</label>
                <input type="text" name="Idade" value="<?php echo htmlspecialchars($vendedor['Idade']); ?>"><br><br>

                <label for="CPF">CPF:</label>
                <input type="text" name="CPF" value="<?php echo htmlspecialchars($vendedor['CPF']); ?>"><br><br>

                <label for="Endereco">Endereço:</label>
                <input type="text" name="Endereco" value="<?php echo htmlspecialchars($vendedor['Endereco']); ?>"><br><br>

                <label for="Salario">Salário:</label>
                <input type="text" name="Salario" value="<?php echo htmlspecialchars($vendedor['Salario']); ?>"><br><br>

                <label for="Cargo">Cargo:</label>
                <input type="text" name="Cargo" value="<?php echo htmlspecialchars($vendedor['Cargo']); ?>"><br><br>

                <label for="Observacao">Observação:</label>
                <textarea name="Observacao"><?php echo htmlspecialchars($vendedor['Observacao']); ?></textarea><br><br>

                <input type="hidden" name="vendedor_id" value="<?php echo htmlspecialchars($vendedor['Id_Vendedor']); ?>"><br><br>
                <button type="submit" id="cadastrar-button">Salvar</button>
            </form>
        </div>
    <?php else: ?>
        <p>Vendedor não encontrado.</p>
    <?php endif; ?>

    <script src="../JS/script.js"></script>
</body>
</html>
