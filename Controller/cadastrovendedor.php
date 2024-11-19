<?php
require '../start.php';
require '../conexao.php';
require '../Model/cadastrovendedor.model.php';

if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}

$cadastro = new CadastroVendedor();

$mensagem = '';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mensagem = $cadastro->cadastrarVendedor($_POST);
}
include '../View/vendedor.view.php';

?>

