<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="icon" type="image/x-icon" href="../img/ts1.png">
    <link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <h1>Editar Usuário</h1>
        <button id="menu-button">Menu</button>
        <button id="home-button">Home</button>
        <div class="alinhamentousuario">
            <p>
                <img src="../img/usu.png"><br> <?php echo nl2br(htmlspecialchars($usuario)); ?>
            </p>
        </div>
    </header>
    <?php require '../menu.php'; ?>

    <?php if ($usuarioData): ?>
        <div class="tabela">
            <form method="POST" action="../Controller/editarusuario.php">
                <table border="1">
                    <tr>
                        <th>Usuário</th>
                        <th>Senha</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="novoUsuario" value="<?php echo htmlspecialchars($usuarioData['Usuario']); ?>" required></td>
                        <td><input type="password" name="novaSenha" value="" placeholder="Nova senha" required></td>
                    </tr>
                </table><br>
                <button type="submit" id="cadastrar-button">Salvar</button>
            </form>
        </div>
    <?php else: ?>
        <p>Nenhum resultado encontrado.</p>
    <?php endif; ?>

    <?php if (isset($_GET['message'])): ?>
        <div class="message"><?php echo htmlspecialchars($_GET['message']); ?></div>
    <?php endif; ?>

    <script src="../JS/script.js"></script>
</body>
</html>
