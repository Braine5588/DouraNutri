<!-- View/listapedidos.view.php -->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista de Pedidos</title>
<link rel="icon" type="image/x-icon" href="../img/ts1.png">
<link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Pedidos Cadastrados</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class="alinhamentousuario">
      <p><img src="../img/usu.png"><br><?php echo nl2br(htmlspecialchars($usuario)); ?></p>
    </div>
  </header>
  <?php require '../menu.php'; ?>
  <button id="grafico-button"></button>
  <div class="tabela">
    <form method="post" action="listarpedido.php">
      <label for="funcionario">Selecione o funcionário:</label>
      <select id="funcionario" name="funcionario">
        <option value="todos">Todos</option>
        <?php foreach ($vendedores as $vendedor): ?>
          <option value="<?= htmlspecialchars($vendedor) ?>"><?= htmlspecialchars($vendedor) ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit" id="gerar-lista">Gerar Lista</button>
    </form>

    <?php if (!empty($pedidos)): ?>
      <table border="1">
        <tr>
          <th>Funcionário</th>
          <th>Produto</th>
          <th>Cliente</th>
          <th>Preço</th>
          <th>Quantidade Pedida</th>
          <th>Data</th>
        </tr>
        <?php foreach ($pedidos as $pedido): ?>
          <tr>
            <td><?= htmlspecialchars($pedido['NOME_VENDEDOR']) ?></td>
            <td><?= htmlspecialchars($pedido['NOME_PRODUTO']) ?></td>
            <td><?= htmlspecialchars($pedido['NOME_CLIENTE']) ?></td>
            <td><?= htmlspecialchars($pedido['PrecoVender']) ?></td>
            <td><?= htmlspecialchars($pedido['Qtd_Pedida']) ?></td>
            <td><?= htmlspecialchars($pedido['data_pedido']) ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nenhum pedido encontrado para o funcionário selecionado.</p>
    <?php endif; ?>
  </div>
  <script src="../JS/script.js"></script>
</body>
</html>
