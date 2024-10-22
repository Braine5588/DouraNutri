<?php
require 'start.php';
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vendedor</title>
    <link rel="icon" type="image/x-icon" href="/img/ts1.png">
    <link href="CSS/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <h1>Editar Vendedor</h1>
        <button id="menu-button">Menu</button>
        <button id="home-button">Home</button>
        <div class = "alinhamentousuario">
    <p> 
    <img src="/img/usu.png"> <br>  <?php echo nl2br(htmlspecialchars($usuario)); ?> 
    </p>
    <div>
    </header>
    <?php
  require 'menu.php';
  ?>

<?php
class EditarVendedor {
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

    public function exibirFormulario($vendedor_id) {
        $sql = "SELECT * FROM cadastrovendedor WHERE Id_Vendedor = $vendedor_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $vendedor = $result->fetch_assoc();

            echo '
            <div class="form">
                <form method="POST" action="editarvendedor.php">
                   <br> <label for="Nome">Nome:</label>
                    <input type="text" name="Nome" value="' . $vendedor['Nome'] . '"><br><br>

                    <label for="Idade">Idade:</label>
                    <input type="text" name="Idade" value="' . $vendedor['Idade'] . '"><br><br>

                    <label for="CPF">CPF:</label>
                    <input type="text" name="CPF" value="' . $vendedor['CPF'] . '"><br><br>

                    <label for="Endereco">Endereço:</label>
                    <input type="text" name="Endereco" value="' . $vendedor['Endereco'] . '"><br><br>

                    <label for="Salario">Salário:</label>
                    <input type="text" name="Salario" value="' . $vendedor['Salario'] . '"><br><br>

                    <label for="Cargo">Cargo:</label>
                    <input type="text" name="Cargo" value="' . $vendedor['Cargo'] . '"><br><br>

                    <label for="Observacao">Observação:</label>
                    <textarea name="Observacao">' . $vendedor['Observacao'] . '</textarea><br><br>

                    <input type="hidden" name="vendedor_id" value="' . $vendedor['Id_Vendedor'] . '"><br><br>
                    <button type="submit" id="cadastrar-button" >Salvar</button>
                </form>
                ';
        } else {
            echo "Vendedor não encontrado.";
        }
    }
    

    public function atualizarVendedor($vendedor_id, $nome, $idade, $cpf, $endereco, $salario, $cargo, $observacao) {
        $sql = "UPDATE cadastrovendedor SET 
                Nome='$nome', 
                Idade='$idade', 
                CPF='$cpf', 
                Endereco='$endereco', 
                Salario='$salario', 
                Cargo='$cargo', 
                Observacao='$observacao' 
                WHERE Id_Vendedor=$vendedor_id";

if ($this->conn->query($sql) === TRUE) {
    header("Location: listarvendedor.php");
    exit();
} else {
    echo "Erro ao atualizar vendedor: " . $this->conn->error;
}
}

    public function __destruct() {
        $this->conn->close();
    }
}

$editarVendedor = new EditarVendedor();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['Id_Vendedor'])) {
    $vendedor_id = $_GET['Id_Vendedor'];
    $editarVendedor->exibirFormulario($vendedor_id);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vendedor_id = $_POST['vendedor_id'];
    $nome = $_POST['Nome'];
    $idade = $_POST['Idade'];
    $cpf = $_POST['CPF'];
    $endereco = $_POST['Endereco'];
    $salario = $_POST['Salario'];
    $cargo = $_POST['Cargo'];
    $observacao = $_POST['Observacao'];

    $editarVendedor->atualizarVendedor($vendedor_id, $nome, $idade, $cpf, $endereco, $salario, $cargo, $observacao);
}
?>
<script src = "JS/script.js"></script>
</body>
</html>
