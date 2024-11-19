<?php
require '../start.php';
require '../conexao.php';
require '../Model/listpedido.model.php';

if ($cargo !== 'Nutricionista' && $cargo !== 'Administrador') {
    echo '<script>alert("Você não tem acesso a esta função, o sistema será fechado"); window.location.href = "../logout.php";</script>';
    exit();
}

// Cria a conexão e o modelo
$conexao = new Conexao();
$listarPedido = new ListarPedido($conexao);

// Obtém os dados dos vendedores e pedidos
$vendedores = $listarPedido->obterVendedores();
$funcionarioSelecionado = $_POST['funcionario'] ?? 'todos';
$pedidos = $listarPedido->listarPedidos($funcionarioSelecionado);

// Inclui a view com os dados
include '../View/listpedido.view.php';
?>