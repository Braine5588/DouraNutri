<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="icon" type="image/x-icon" href="/img/ts1.png">
    <link rel="stylesheet" href="CSS/stylelogin.css">
</head>
<body>
    <div class="login-container">
        <form action="" method="post">
            <div class="form-group">
                <label for="Usuario">Usuário:</label>
                <input type="text" id="Usuario" name="Usuario" required>
            </div>
            <div class="form-group">
                <label for="Senha">Senha:</label>
                <input type="password" id="Senha" name="Senha" required>
            </div>
        <div class="form-group">
    <label for="Cargo">Cargo:</label>
    <select id="Cargo" name="Cargo">
        <option value=""></option>
        <option value="Administrador">Administrador</option>
        <option value="Nutricionista">Nutricionista</option>
        <option value="Vendedor">Vendedor</option>
    
    </select>
</div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
