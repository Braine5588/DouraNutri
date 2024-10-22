<?php
require 'start.php';
if ($cargo !== 'Nutricionista') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="icon" type="/img/x-icon" href="ts1.png">
    <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>

<div class="formimc">
    <form method="post" action="">

      <br>  <label for="altura">Altura (ex: 1.65):</label>
        <input type="text" name="altura" id="altura" required><br><br>
       
        <label for="peso">Peso (ex: 70.5):</label>
        <input type="text" name="peso" id="peso" required><br><br>

        <button type="submit" id="cadastrar-buttonimc">Calcular</button>
    </form>
</div>
    <div class="imagem-container">
        <?php
       function calculadoraIMC($peso, $altura) {
            if ($altura > 0) {
                return $peso / ($altura * $altura);
            } else {
                return 0;
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $peso = floatval($_POST["peso"]);
            $altura = floatval($_POST["altura"]);
            $imc = calculadoraIMC($peso, $altura);
            echo "<p>Seu IMC é: " . number_format($imc, 2) . "</p>";
            
            if ($imc < 16.000) {
                echo "Magreza grau III <br>";
             echo '<img src="/img/magreza 3.jpg" alt="Magreza grau III">';
            } elseif ($imc >= 16.000 && $imc <= 16.999) {
                echo "Magreza grau II <br>" ;
                echo '<img src="/img/magreza 2.jpg">'; 
            } elseif ($imc >= 17.000 && $imc <= 18.499) {
                echo "Magreza grau I <br>";
                echo '<img src="/img/magreza 1.jpg">'; 
            } elseif ($imc >= 18.500 && $imc <= 24.999) {
                echo "Eutrofia <br>" ;
                echo '<img src="/img/eutrofia.jpg">';
            } elseif ($imc >= 25.000 && $imc <= 29.999) {
                echo "Sobrepeso <br>" ;
                 echo '<img src="/img/sobrepeso.jpg">';
            } elseif ($imc >= 30.000 && $imc <= 34.999) {
                echo "Obesidade grau I <br>" ;
                echo '<img src="/img/obesidade 1.jpg">';
            } elseif ($imc >= 35.000 && $imc <= 39.999) {
                echo "Obesidade grau II <br>" ;
                 echo '<img src="/img/obesidade 2.jpg">';
            } elseif ($imc >= 40.000) {
                echo "Obesidade grau III <br>" ;
                 echo '<img src="/img/obesidade 3.jpg">';
            }
        }
        ?>
    </div>
</body>
</html>
