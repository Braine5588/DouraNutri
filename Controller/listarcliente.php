<?php
require '../start.php';
require '../conexao.php';

if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit();
}

require '../Model/listcliente.model.php';

$conexao = new Conexao();
$listarCliente = new ListarCliente($conexao);
$clientes = $listarCliente->obterClientes();

// Inclui a visão e passa os dados dos clientes para exibição
include '../View/listcliente.view.php';
?>
