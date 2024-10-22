
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$hostname = "localhost";
$username = "root";
$password = "";
$database = "tb_produtos";

$db = new mysqli($hostname, $username, $password, $database);
if ($db->connect_error) {
die("Erro na conexão com o banco de dados: " . $db->connect_error);
}

$nomevendedor = $_POST["nomevendedor"];
$nomeproduto = $_POST["nomeproduto"];
$nomecliente = $_POST["nomecliente"];
$qtdPedida = $_POST["qtdPedida"];
$dataPedido = $_POST["dataPedido"];

// Defina $precovender com base na seleção do produto
$selectedProduto = $_POST["nomeproduto"];
$result = $db->query("SELECT PrecoVender FROM cadastroproduto WHERE Nome = '$selectedProduto'");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $precovender = $row["PrecoVender"];
} else {
    $precovender = 0; // Defina um valor padrão ou trate o erro de alguma outra forma
}

$stmt = $db->prepare("INSERT INTO cadastropedido (NOME_VENDEDOR, NOME_PRODUTO, NOME_CLIENTE, PrecoVender, Qtd_Pedida, data_pedido) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiss", $nomevendedor, $nomeproduto, $nomecliente, $precovender, $qtdPedida, $dataPedido);

if ($stmt->execute()) {
echo '<div class="message">Pedido cadastrado com sucesso.</div>';
$stmt->close();

          // Subtrair quantidade do produto
$sql = "SELECT Quantidade FROM cadastroproduto WHERE Nome = '$nomeproduto'";
$result = $db->query($sql);

if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $quantidadeAtual = $row["Quantidade"];
            $novaQuantidade = $quantidadeAtual - $qtdPedida;

            $sql = "UPDATE cadastroproduto SET Quantidade = $novaQuantidade WHERE Nome = '$nomeproduto'";

            if ($db->query($sql) !== TRUE) {
            echo '<div class="messagefalha">Erro ao subtrair a quantidade do produto: ' . $db->error . '</div>';
            }
        }
    } else {
    echo '<div class="messagefalha">Erro ao cadastrar o pedido: ' . $stmt->error . '</div>';
    }

    $db->close();
}
?>