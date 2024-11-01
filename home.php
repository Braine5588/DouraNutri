
<?php
require 'start.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador' && $cargo !== 'Vendedor') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="img/ts1.png">
    <link href="CSS/style.css" rel="stylesheet"/> 
</head>
<body>
<header>
    <h1>Sistema de Gerenciamento da DouraNutri</h1>
    <div class = "alinhamentousuario">
    <p> 
    <img src="img/usu.png"> <br>  <?php echo nl2br(htmlspecialchars($usuario)); ?> 
    </p>
    <div>
</header>
<?php 
require 'menuhome.php';
?> 
<div class="alinhamentotexto"> 
    <ul>
    <h2> Objetivo do Sistema:</h2>
    <li> O presente Sistema tem como objetivo primordial a administração integral da empresa DouraNutri, que foi fundada em 2023. </li><br>
    <h2> Missão da Empresa:</h2>
    <li>  A empresa foi estabelecida com a nobre missão de transformar a perspectiva das pessoas em relação à sua alimentação. </li><br>
    <h2> O que acreditamos:</h2>
    <li>  A DouraNutri acredita firmemente que uma alimentação saudável não requer o sacrifício de desfrutar das preferências gastronômicas pessoais; ao contrário, é uma questão de autodomínio e de consumir alimentos no momento apropriado.</li><br>
    <h2> O que fazemos:</h2>
    <li> A empresa se dedica incansavelmente a promover hábitos alimentares saudáveis, garantindo que seus clientes desfrutem de uma vida mais equilibrada e saudável.</li><br>
</ul>
    </h2>
</div>
<script src="JS/script.js"></script>
</body>
</html>
