<?php
class CadastroPedido{
    private $nomevendedor;
    private $nomeproduto;
    private $nomecliente;
    private $precovender;
    private $qtdPedida;
    private $dataPedido;
    private $conn;


    public function __construct() {
        $this->connectaBD();
      }
    
      private function connectaBD() {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $mydb = "tb_produtos";
    
        $this->conn = new mysqli($server, $user, $pass, $mydb);
    
        if ($this->conn->connect_error) {
          die("Conexão Falhou: " . $this->conn->connect_error);
        }
      }
      public function cadastrarPedido(){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$NOME_VENDEDOR = $_POST["nomevendedor"];
$NOME_PRODUTO = $_POST["nomeproduto"];
$NOME_CLIENTE = $_POST["nomecliente"];
$Qtd_Pedida = $_POST["qtdPedida"];
$data_pedido = $_POST["dataPedido"];

// Defina $precovender com base na seleção do produto
$selectedProduto = $_POST["nomeproduto"];
$result = $this->conn->query("SELECT PrecoVender FROM cadastroproduto WHERE Nome = '$selectedProduto'");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $PrecoVender = $row["PrecoVender"];
} else {
    $PrecoVender = 0; // Defina um valor padrão ou trate o erro de alguma outra forma
}

$stmt = $this->conn->prepare("INSERT INTO cadastropedido (NOME_VENDEDOR, NOME_PRODUTO, NOME_CLIENTE, PrecoVender, Qtd_Pedida, data_pedido) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiss", $NOME_VENDEDOR, $NOME_PRODUTO, $NOME_CLIENTE, $PrecoVender, $Qtd_Pedida, $data_pedido);

if ($stmt->execute()) {
echo '<div class="message">Pedido cadastrado com sucesso.</div>';
$stmt->close();

          // Subtrair quantidade do produto
$sql = "SELECT Quantidade FROM cadastroproduto WHERE Nome = '$NOME_PRODUTO'";
$result = $this->conn->query($sql);

if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $quantidadeAtual = $row["Quantidade"];
            $novaQuantidade = $quantidadeAtual - $Qtd_Pedida;

            $sql = "UPDATE cadastroproduto SET Quantidade = $novaQuantidade WHERE Nome = '$NOME_PRODUTO'";

            if ($this->conn->query($sql) !== TRUE) {
            echo '<div class="messagefalha">Erro ao subtrair a quantidade do produto: ' . $this->conn->error . '</div>';
            }
        }
    } else {
    echo '<div class="messagefalha">Erro ao cadastrar o pedido: ' . $stmt->error . '</div>';
    }

    $this->conn->close();
}
}
}
?>