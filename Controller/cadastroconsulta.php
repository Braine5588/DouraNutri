<?php
require '../start.php';
require '../conexao.php';
require '../Model/cadastroconsulta.model.php';

if ($cargo !== 'Nutricionista') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit();
}

// Instancia o modelo
$cadastro = new CadastroConsulta();

// Verifica se houve envio de formulário
$mensagem = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensagem = $cadastro->cadastrarConsulta($_POST);
}

// Inclui a View
include '../View/consulta.view.php';
?>
