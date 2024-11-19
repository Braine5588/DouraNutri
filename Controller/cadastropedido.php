<?php
require '../start.php';
require '../conexao.php';
require '../Model/cadastropedido.model.php';

if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador' && $cargo !== 'Vendedor') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit();
}

$cadastro = new CadastroPedido();
$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensagem = $cadastro->cadastrarPedido($_POST);
}

require '../View/pedido.view.php';
?>
