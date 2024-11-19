<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista de Clientes</title>
<link rel="icon" type="image/x-icon" href="../img/ts1.png">
<link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Clientes Cadastrados</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class="alinhamentousuario">
      <p> 
        <img src="../img/usu.png"><br><?php echo nl2br(htmlspecialchars($usuario)); ?> 
      </p>
    </div>
  </header>

  <?php require '../menu.php'; ?>

  <div class="tabela">
    <?php if (!empty($clientes)): ?>
      <table border="1">
        <tr>
          <th>Nome</th>
          <th>Idade</th>
          <th>CPF</th>
          <th>Endereço</th>
          <th>Altura</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
          <tr>
            <td><?php echo htmlspecialchars($cliente['Nome']); ?></td>
            <td><?php echo htmlspecialchars($cliente['Idade']); ?></td>
            <td><?php echo htmlspecialchars($cliente['CPF']); ?></td>
            <td><?php echo htmlspecialchars($cliente['Endereco']); ?></td>
            <td><?php echo htmlspecialchars($cliente['Altura']); ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nenhum cliente cadastrado.</p>
    <?php endif; ?>
  </div>

  <script src="../JS/script.js"></script>
</body>
</html>
