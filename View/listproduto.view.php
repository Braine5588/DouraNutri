
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Estoque</title>
<link rel="icon" type="image/x-icon" href="../img/ts1.png">
<link href="../CSS/style.css" rel="stylesheet"/>
<link href="CSS/fontawesome.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Produtos Cadastrados</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class="alinhamentousuario">
      <p>
        <img src="../img/usu.png"> <br> <?php echo nl2br(htmlspecialchars($usuario)); ?>
      </p>
    </div>
  </header>
  <?php require '../menu.php'; ?>
  
  <div class="tabela">
  <?php if (!empty($produto)): ?>
  <table border="1">
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Data de Validade</th>
                        <th>Data de Fabricação</th>
                    </tr>

                    <?php foreach ($produto as $produto): ?>
                        <tr>
                        <td><?php echo htmlspecialchars($produto['Nome']); ?></td>
                    <td><?php echo htmlspecialchars($produto['Categoria']); ?></td>
                    <td><?php echo htmlspecialchars($produto['Preco']); ?></td>
                    <td><?php echo htmlspecialchars($produto['Quantidade']); ?></td>
                    <td><?php echo htmlspecialchars($produto['data_validade']); ?></td>
                    <td><?php echo htmlspecialchars($produto['data_fabricacao']); ?></td>
                    </tr>
                    <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nenhum produto cadastrado.</p>
    <?php endif; ?>
  </div>
  <button id="pdf-button"></button>
  <script src="../JS/script.js"></script>
</body>
</html>


