<?php
require '../start.php';
require '../conexao.php';
require '../Model/cadastrocliente.model.php';

// Verifica a permissão do usuário
if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador' && $cargo !== 'Vendedor' ) {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}

// Instancia o modelo
$cadastro = new CadastroCliente();

// Processa o cadastro, se for enviado um POST
$mensagem = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensagem = $cadastro->cadastrarCliente($_POST);
}

// Carrega a View
include '../View/cliente.view.php';
?>
