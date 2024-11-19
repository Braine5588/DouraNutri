<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Funcionários</title>
  <link rel="icon" type="image/x-icon" href="../img/ts1.png">
  <link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Funcionários Cadastrados</h1>
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
    <?php
  if (isset($_GET['message'])) {
      echo '<div class="message">' . htmlspecialchars($_GET['message']) . '</div>';
  }
  ?>
  <div class="tabela">
  <?php if (!empty($vendedor)): ?>
  <table border="1">
              <tr>
                  <th>Nome</th>
                  <th>Idade</th>
                  <th>CPF</th>
                  <th>Endereço</th>
                  <th>Salário</th>
                  <th>Cargo</th>
                  <th>Usuário</th>
                  <th>Observações</th>
                  <th>Ações</th> <!-- Nova coluna para as ações -->
              </tr>

              <?php foreach ($vendedor as $vendedor): ?>
            <tr>
            <td><?php echo htmlspecialchars($vendedor['Nome']); ?></td>
            <td><?php echo htmlspecialchars($vendedor['Idade']); ?></td>
            <td><?php echo htmlspecialchars($vendedor['CPF']); ?></td>
            <td><?php echo htmlspecialchars($vendedor['Endereco']); ?></td>
            <td><?php echo htmlspecialchars($vendedor['Salario']); ?></td>
            <td><?php echo htmlspecialchars($vendedor['Cargo']); ?></td>
            <td><?php echo htmlspecialchars($vendedor['Usuario']); ?></td>
            <td><?php echo htmlspecialchars($vendedor['Observacao']); ?></td>
            <td>
            <a href="editarvendedor.php?Id_Vendedor=<?php echo $vendedor['Id_Vendedor']; ?>" class="edit-link">Editar</a>

                    
                  </td>
            </tr>
            <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>Nenhum vendedor cadastrado.</p>
    <?php endif; ?>
  </div>
  <script src="../JS/script.js"></script>
</body>
</html>
