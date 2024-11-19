<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Consulta</title>
    <link rel="icon" type="image/x-icon" href="../img/ts1.png">
    <link href="../CSS/style.css" rel="stylesheet" />
</head>
<body>
<header>
    <h1>Cadastro de Consulta</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class="alinhamentousuario">
        <p>
            <img src="../img/usu.png"> <br> <?php echo nl2br(htmlspecialchars($usuario)); ?>
        </p>
    </div>
</header>
<?php require '../menu.php'; ?>
<button id="imc-button"></button>

<div class="form">
    <?php if (!empty($mensagem)) echo $mensagem; ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <br><label for="nomevend">Nome do Nutricionista:</label>
        <select name="nomevend" required>
            <option value="">Selecione um nutricionista</option>
            <?php
            $nutricionistas = $cadastro->listarNutricionistas();
            while ($row = $nutricionistas->fetch_assoc()) {
                echo "<option value='" . $row['Nome'] . "'>" . $row['Nome'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="nomecli">Nome do Cliente:</label>
        <select name="nomecli" required>
            <option value="">Selecione um cliente</option>
            <?php
            $clientes = $cadastro->listarClientes();
            while ($row = $clientes->fetch_assoc()) {
                echo "<option value='" . $row['Nome'] . "' data-altura='" . $row['Altura'] . "'>" . $row['Nome'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="altura">Altura:</label>
        <span id="alturaField"  class="span1"></span><br><br> 
        <label for="peso">Peso:</label>
        <input type="text" name="peso" required><br><br>

        <label for="dataconsu">Data da Consulta:</label>
        <input type="date" name="dataconsu" required><br><br>

        <label for="objetivo">Objetivo do Cliente:</label>
        <input type="text" name="objetivo" required><br><br>

        <label for="parecer">Parecer da Consulta:</label>
        <input type="text" name="parecer" required><br><br>

        <button type="submit" id="cadastrar-button">Cadastrar</button>
    </form>
</div>
<script src="../JS/script.js"></script>
</body>
</html>
