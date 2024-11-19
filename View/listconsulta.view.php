<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultas</title>
  <link rel="icon" type="image/x-icon" href="../img/ts1.png">
  <link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Consultas Cadastradas</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class = "alinhamentousuario">
    <p> 
    <img src="../img/usu.png"> <br>  <?php echo nl2br(htmlspecialchars($usuario)); ?> 
    </p>
    <div>
  </header>
  <?php
  require '../menu.php';
  ?>
  <div class="tabela">
  <form method="post" action="gerenciamentoconsulta.php">
  <label for="cliente">Selecione o Paciente:</label>
  <select id="cliente" name="cliente"> 
    <option value="todos">Todos</option>
    <?php foreach ($clientes as $cliente): ?>
      <option value="<?= htmlspecialchars($cliente) ?>"><?= htmlspecialchars($cliente) ?></option>
    <?php endforeach; ?>
  </select>
  <button type="submit" id="gerar-lista">Gerar Lista</button>
</form>


    
<?php if (!empty($listar)): ?>
        <table border="1">
            <tr>
                <th>Paciente</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Data</th>
                <th>Objetivo</th>
                <th>Parecer</th>
            </tr>
<?php foreach ($listar as $lista): ?>
          <tr>
          <td><?= htmlspecialchars($lista['NOME_CLIENTE']) ?></td>
          <td><?= htmlspecialchars($lista['Altura']) ?></td>
          <td><?= htmlspecialchars($lista['Peso']) ?></td>
          <td><?= htmlspecialchars($lista['Data_consulta']) ?></td>
          <td><?= htmlspecialchars($lista['Objetivo']) ?></td>
          <td><?= htmlspecialchars($lista['Desc_consul']) ?></td>
          </tr>
          <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nenhuma consulta encontrada para o cliente selecionado.</p>
    <?php endif; ?>
  </div>
  <script src="../JS/script.js"></script>
</body>
</html>

