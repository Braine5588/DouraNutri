<?php
require '../start.php';
require '../conexao.php';

if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}

// Criar uma instância da conexão
$conexao = new Conexao();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gráfico de Vendas</title>
  <link rel="icon" type="image/x-icon" href="../img/ts1.png">
  <link href="../CSS/style.css" rel="stylesheet"/>
</head>
<body>
  <header>
    <h1>Gráficos de Vendas</h1>
    <button id="menu-button">Menu</button>
    <button id="home-button">Home</button>
    <div class = "alinhamentousuario">
      <p> 
        <img src="../img/usu.png"> <br>  <?php echo nl2br(htmlspecialchars($usuario)); ?> 
      </p>
    </div>
  </header>

  <?php require '../menu.php'; ?>

  <div class="grafico">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", { packages: ['corechart'] });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Vendedor", "Valor Vendido R$"],
          
          <?php
          $sql = "SELECT NOME_VENDEDOR, SUM(PrecoVender * Qtd_Pedida) as ValorVendido FROM cadastropedido GROUP BY NOME_VENDEDOR";
          $busca = $conexao->conn->query($sql);

          while ($cadastropedido = $busca->fetch_assoc()) {
            $NOME_VENDEDOR = $cadastropedido['NOME_VENDEDOR'];
            $ValorVendido = $cadastropedido['ValorVendido'];
            echo '["' . $NOME_VENDEDOR . '", ' . $ValorVendido . '],';
          }
          ?>
        ]);

        var options = {
          title: "Valor Vendido por Funcionário",
          width: 300,
          height: 300,
          backgroundColor: 'transparent',
          colors: ['DarkGreen'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(data, options);
      }
    </script>
    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
  </div>

  <!-- Gráfico 1 -->
  <div class="grafico1">
    <script type="text/javascript">
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ["Cliente", "Valor Gasto R$"],
          
          <?php
          $sql1 = "SELECT NOME_CLIENTE, SUM(PrecoVender * Qtd_Pedida) as ValorGasto FROM cadastropedido GROUP BY NOME_CLIENTE";
          $busca1 = $conexao->conn->query($sql1);

          while ($cadastropedido1 = $busca1->fetch_assoc()) {
            $NOME_CLIENTE = $cadastropedido1['NOME_CLIENTE'];
            $ValorGasto = $cadastropedido1['ValorGasto'];
            echo '["' . $NOME_CLIENTE . '", ' . $ValorGasto . '],';
          }
          ?>
        ]);

        var options = {
          title: "Valor Gasto por Cliente",
          width: 300,
          height: 300,
          backgroundColor: 'transparent',
          colors: ['DarkGreen'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
        chart.draw(data, options);
      }
    </script>
    <div id="columnchart_values1" style="width: 900px; height: 300px;"></div>
  </div>

  <!-- Gráfico 2 -->
  <div class="grafico2">
    <script type="text/javascript">
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ["Produto", "Mais Vendido R$"],
          
          <?php
          $sql2 = "SELECT NOME_PRODUTO, SUM(PrecoVender * Qtd_Pedida) as MaisVendido FROM cadastropedido GROUP BY NOME_PRODUTO";
          $busca2 = $conexao->conn->query($sql2);

          while ($cadastropedido2 = $busca2->fetch_assoc()) {
            $NOME_PRODUTO = $cadastropedido2['NOME_PRODUTO'];
            $MaisVendido = $cadastropedido2['MaisVendido'];
            echo '["' . $NOME_PRODUTO . '", ' . $MaisVendido . '],';
          }
          ?>
        ]);

        var options = {
          title: "Produto Mais Vendido",
          width: 300,
          height: 300,
          backgroundColor: 'transparent',
          colors: ['DarkGreen'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
        chart.draw(data, options);
      }
    </script>
    <div id="columnchart_values2" style="width: 900px; height: 300px;"></div>
  </div>

  <script src="../JS/script.js"></script>
</body>
</html>
