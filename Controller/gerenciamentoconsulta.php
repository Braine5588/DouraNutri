<?php
require '../start.php';
require '../conexao.php';
require '../Model/listconsulta.model.php';

if ($cargo !== 'Nutricionista') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "logout.php";</script>';
    exit(); // Garante que o script seja interrompido
}

$conexao = new Conexao();
$listarConsulta = new ListarConsulta($conexao);

$clientes = $listarConsulta->obterClientes();
$clienteSelecionado = $_POST['cliente'] ?? 'todos';
$listar = $listarConsulta->listarConsultas($clienteSelecionado);
include '../View/listconsulta.view.php';
?>
